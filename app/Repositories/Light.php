<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $table = 'light';

    protected $fillable = [
      'id',
      'date',
      'value',
      'created_at',
      'updated_at'
    ];
}
