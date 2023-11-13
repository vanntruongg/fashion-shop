<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    protected $table = 'danhmuc';
    use HasFactory;

    protected $fillable = [
        'DM_Ten'
    ];
    public $timestamps = false;
}
