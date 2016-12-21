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

    protected $defaultIncludes = ['projects'];

      public function transform(Clients $clients)
      {


          return[
              'id'=>$clients->id,
              'name'=>$clients->name,
              'responsible'=>$clients->responsible,
              'email'=>$clients->email,
              'phone'=>$clients->phone,
              'address'=>$clients->address,
              'obs'=>$clients->obs,

          ];

      }

    public function includeProjects(Clients $clients)
    {
        $transform = new ProjectTransformer();
        $transform->setDefaultIncludes([]);

        return $this->collection($clients->projects, $transform );
    }



}