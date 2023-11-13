<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class sanpham extends Model
{
    protected $table = 'sanpham' ;
    use HasFactory;

    protected $fillable = [
        'SP_Ten',
        'SP_ChatLieu',
        'SP_HinhAnh',
        'SP_Gia',
        'LSP_Ma'
    ];
    public $timestamps = false;

    public function orderDetails(): MorphMany
    {
    return $this->morphMany(chitiethoadon::class, 'product');
    }

    public function importcthd(): MorphMany
    {
    return $this->morphMany(chitiethoadonnhap::class, 'importcthdn');
    }

    
}
