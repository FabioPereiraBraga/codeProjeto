<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;


use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends  TransformerAbstract
{


      public function transform(User $user)
      {
          return[
              
              'id'=>$user->id,
              'name'=>$user->name,
              'email'=>$user->email,

          ];

      }



}