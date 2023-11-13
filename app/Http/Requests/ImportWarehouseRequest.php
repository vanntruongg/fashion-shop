<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportWarehouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'HDN_Ngay' => 'required|date',
            'HDN_GhiChu' => 'nullable|string',
            'SP_Ten.*' => 'required',
            'SP_Chatlieu.*' => 'required',
            'SP_Gia.*' => 'required|numeric',
            'SP_LSP.*' => 'required|exists:loaisanpham,LSP_Ma',
            'SP_Soluong.*' => 'required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'HDN_Ngay.required' => 'Ngày nhập không được để trống.',
            'HDN_Ngay.date' => 'Ngày nhập phải là một ngày hợp lệ.',
            'HDN_GhiChu.nullable' => 'Không được để trống ghi chú' ,
            'SP_Ten.*.required' =>'Tên sản phẩm là bắt buộc',
            'SP_Chatlieu.*.required' =>'Chất liệu sản phẩm là bắt buộc',
            'SP_Gia.*.required' =>'Giá sản phẩm là bắt buộc',
            'SP_Gia.*.numeric' => 'Giá sản phẩm phải là một số',
            'SP_Soluong.*.required' =>'Vui lòng nhập số lượng',
            'SP_Soluong.*.integer' =>'Số lượng phải là một số'
        ];
    }
}
