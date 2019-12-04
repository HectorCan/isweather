<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Humidity extends Model
{
    protected $table = 'humidity';

    protected $fillable = [
      'id',
      'date',
      'value',
      'created_at',
      'updated_at'
    ];
}
