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
              'id'=>$member->id,
              'name'=>$member->name,
              'project_id'=>$member->project_id
          ];

      }

}