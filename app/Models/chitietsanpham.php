<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsanpham extends Model
{
    protected $table = 'chitietsanpham';
    use HasFactory;

    protected $fillable = [
        'CTSP_SoLuong',
        'MS_Ma',
        'KT_Ma',
        'SP_Ma'
    ];
    public $timestamps = false;
}
