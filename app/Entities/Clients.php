<?php

namespace CodeProject\Entities;

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
