<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $table = 'temperature';

    protected $fillable = [
      'id',
      'date',
      'value',
      'created_at',
      'updated_at'
    ];

    protected $casts = [
      'date' => 'date:Y-m-d',
      'created_at' => 'date:Y-m-d H:i:s'
    ];
}
