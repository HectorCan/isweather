<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Pressure extends Model
{
    protected $table = 'pressure';

    protected $fillable = [
      'id',
      'date',
      'value',
      'created_at',
      'updated_at'
    ];
}
