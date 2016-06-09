<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

class ProjectNoteTransformer extends  TransformerAbstract
{
    

      public function transform(ProjectNote $projectNote)
      {
          return[
              'project_id'=>$projectNote->project_id,
              'title'=>$projectNote->title,
              'note'=>$projectNote->note,
          ];

      }

  

}