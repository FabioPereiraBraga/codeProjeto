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

class ProjectMembersTransformer extends  TransformerAbstract
{

      public function transform(User $member)
      {
          return[
              'member_id'=>$member->id,
              'name'=>$member->name 
          ];

      }

}