<?php

namespace Projeto;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{

      protected $fillable = [
          'name',
          'responsible',
          'email',
          'phone',
          'address',
          'obs'
];
    
}
