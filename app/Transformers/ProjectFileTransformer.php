<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:48
 */

namespace CodeProject\Transformers;


use CodeProject\Entities\ProjectFile;
use League\Fractal\TransformerAbstract;

class ProjectFileTransformer extends  TransformerAbstract
{


      public function transform(ProjectFile $projectFile)
      {

          return[
              'id'=>$projectFile->id,
              'project_id'=>$projectFile->project_id,
              'name'=>$projectFile->name,
              'description'=>$projectFile->description,
              'extension'=>$projectFile->extension,

          ];

      }



}