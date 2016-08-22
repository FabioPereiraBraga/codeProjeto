<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Clients extends Model implements Transformable
{

      use TransformableTrait;
      
      protected $fillable = [
          'name',
          'responsible',
          'email',
          'phone',
          'address',
          'obs'
];

      public function project ()
      {
            return $this->hasMany(Project::class);
      }
    
}
