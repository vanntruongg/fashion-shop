<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    protected $table = 'loaisanpham';
    use HasFactory;

    protected $fillable = [
        'LSP_Ten',
        'DM_STT'
    ];
    public $timestamps = false;
}
