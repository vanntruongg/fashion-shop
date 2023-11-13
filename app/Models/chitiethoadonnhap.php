<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class chitiethoadonnhap extends Model
{
    protected $table = 'chitiethoadonnhap';
    use HasFactory;
    protected $fillable = [
        'CTHDN_Ma',
        'CTHDN_SoLuong',
        'CTHDN_Gia',
        'SP_Ma',
        'HDN_Ma'
    ];
    public $timestamps = false;
   
    public function importWarehouse(): MorphMany
    {
    return $this->morphMany(hoadonnhap::class, 'cthdn');
    }

    public function importcthdn(): MorphTo
    {
      return $this->morphTo();
    }
}
