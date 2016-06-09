<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Clients;
use League\Fractal\TransformerAbstract;

class ClientsTransformer extends  TransformerAbstract
{
   

      public function transform(Clients $clients)
      {

          return[
              'name'=>$clients->name,
              'responsible'=>$clients->responsible,
              'email'=>$clients->email,
              'name'=>$clients->name,
              'phone'=>$clients->phone,
              'address'=>$clients->address,
              'obs'=>$clients->obs,

          ];

      }



}