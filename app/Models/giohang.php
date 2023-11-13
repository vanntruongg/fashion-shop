<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    protected $table = 'giohang';
    use HasFactory;

    protected $fillable = [
       'GH_Ma',
       'ND_id',
    ];
    public $timestamps = false;
}
