<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class chitiethoadon extends Model
{
    protected $table = 'chitiethoadon';
    use HasFactory;


  public function products(): MorphTo
  {
    return $this->morphTo();
  }
}
