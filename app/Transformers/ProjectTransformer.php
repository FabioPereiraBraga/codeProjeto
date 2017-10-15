<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use CodeProject\Entities\ProjectFile;
use CodeProject\Entities\ProjectMembers;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends  TransformerAbstract
{
    protected $defaultIncludes = ['note','tasks','files','client'];

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
              'due_date'=>$project->due_date,
              'is_member'=>$project->owner_id != \Authorizer::getResourceOwnerId(),
              'task_count'=>$project->task->count(),
              'tasks_opened'=>$this->countTaskOpened( $project )
          ];

      }


    public function includeNote(Project $project)
    {

        return $this->collection($project->note, new ProjectNoteTransformer());
    }


    public function  includeTasks( Project $project)
    {
        return $this->collection($project->task, new ProjectTaskTransformer() );
    }

    public function  includeFiles( Project $project)
    {
        return $this->collection($project->files, new ProjectFileTransformer() );
    }



    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ClientsTransformer());
    }


    public function countTaskOpened( $project )
    {
        $count = 0;
        foreach ($project->task as $o){
            if($o->status == 1){
                $count++;
            }
        }

        return $count;

    }









}