<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends  TransformerAbstract
{
    protected $defaultIncludes = ['members','note'];

      public function transform(Project $project)
      {
          return[
              'project_id'=>$project->id,
              'client_id'=>$project->client_id,
              'owner_id'=>$project->owner_id,
              'name'=>$project->name,
              'description'=>$project->description,
              'progress'=>(int) $project->progress,
              'status'=>$project->status,
              'due_date'=>$project->due_date
          ];

      }

    public function includeMembers(Project $project)
    {

        return $this->collection($project->members, new ProjectMembersTransformer());
    }

    public function includeNote(Project $project)
    {

        return $this->collection($project->note, new ProjectNoteTransformer());
    }











}