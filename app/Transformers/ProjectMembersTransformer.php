<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectMembers;
use League\Fractal\TransformerAbstract;

class ProjectMembersTransformer extends  TransformerAbstract
{

     protected $defaultIncludes = ['users'];

      public function transform(ProjectMembers $projectMember)
      {
          return[
               'id'=> $projectMember->id,
               'project_id'=>$projectMember->project_id,
               'client_id'=>$projectMember->user_id
          ];

      }

    public function includeUsers(ProjectMembers $projectMember)
    {

        return $this->item($projectMember->users, new UserTransformer());
    }




}