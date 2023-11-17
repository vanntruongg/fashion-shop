<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class hoadonnhap extends Model
{
    protected $table = 'hoadonnhap';
    protected $primaryKey = 'HDN_Ma';
    protected $fillable = [
        'HDN_Ma',
        'HDN_Ngay',
        'HDN_GhiChu',
    ];
    use HasFactory;
    public $timestamps = false;

    public function cthdn(): MorphTo
    {
      return $this->morphTo();
    }

    public function chitiethoadonnhap()
  {
    return $this->hasMany(ChiTietHoaDonNhap::class, 'HDN_Ma');
  } 
}
