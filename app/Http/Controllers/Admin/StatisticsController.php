<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Models\chitiethoadon;
use MongoDB\Driver\Session;
class StatisticsController extends Controller
{
    public function statisticsOverTime($startDate, $endDate) {
        $days = [];
    
        $currentDay = $startDate->copy();
        while ($currentDay->lte($endDate)) {
          $days[] = $currentDay->format('Y-m-d');
          $currentDay->addDay();
        }
    
    // Truy vấn và tính toán dữ liệu cho từng ngày trong mảng
        foreach ($days as $day) {
          $result = chitiethoadon::join('hoadon', 'chitiethoadon.HD_Ma', '=', 'hoadon.HD_Ma')
            ->leftJoin('sanpham', 'chitiethoadon.SP_Ma', '=', 'sanpham.SP_Ma')
            ->whereDate('hoadon.HD_Ngay', $day)
            ->selectRaw(
                'DATE(hoadon.HD_Ngay) as order_date,
                SUM(chitiethoadon.CTHD_SoLuong) as total_quantity,
                SUM(chitiethoadon.CTHD_DonGia *chitiethoadon.CTHD_SoLuong) as total_price'
            )
            ->groupBy('order_date')
            ->get();
    
          $totalQuantity = $result->sum('total_quantity');
          $totalPrice = $result->sum('total_price');
    
          if ($totalQuantity > 0) {
            $dataFish[] = [
              'order_date' => $day,
              'total_quantity' => $totalQuantity,
              'total_price' => $totalPrice,
            ];
          } else {
            $dataFish[] = [
              'order_date' => $day,
              'total_quantity' => 0,
              'total_price' => 0,
            ];
          }
        }
    
    // Truy vấn và tính toán dữ liệu cho từng ngày trong mảng
       
    
        return [$dataFish];
      }
      public function dataLastWeek() {
        // $startOfWeek = now()->startOfWeek(Carbon::MONDAY)->subWeek();
        // $endOfWeek = now()->endOfWeek(Carbon::SUNDAY)->subWeek()->subDay();
        $startOfWeek = now()->subWeek()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = now()->subWeek()->endOfWeek(Carbon::SUNDAY);
        // dd($startOfWeek, $endOfWeek);
        $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
    
        return response()->json($data);
      }
    
        public function dataLastSevenDays() {
          $startOfWeek = now()->subDays(7)->startOfDay();
          $endOfWeek = now()->subDay()->endOfDay();
    
          $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
          return response()->json($data);
        }
    
        public function dataPeriod(Request $request) : JsonResponse {
          $startDate = $request->input('start_date');
          $endDate = $request->input('end_date');
    
          $startOfWeek = Carbon::parse($startDate);
          $endOfWeek = Carbon::parse($endDate);
    
          $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
    
          return response()->json($data);
        }
    
}
