<?php
namespace CodeProject\Repository;


use CodeProject\Entities\Project;
use CodeProject\Presenters\ProjectPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: Fabio Braga
 * Date: 01/05/16
 * Time: 16:02
 */
class ProjectRepositoryEloquent   extends BaseRepository  implements ProjectRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */

   public  function model()
    {
        return Project::class;
    }

    public function boot(){
        $this->pushCriteria( app(RequestCriteria::class ));
    }

    public  function isOwner( $projectId , $userId ){

     if(count($this->skipPresenter()->findWhere(['id'=>$projectId , 'owner_id'=>$userId]))){
         return true;
     }

        return false;
    }

    public function findWithOwnerAndMenber( $userId )
    {
        return $this->scopeQuery(function($query) use($userId) {
              return $query->select('projects.*')
                     ->leftJoin('project_members','project_members.project_id','=','projects.id')
                     ->where('project_members.id','=',$userId)
                     ->union( $this->model->query()->getQuery()->where('owner_id','=',$userId) );
        })->all();
    }
    public function  hasMember( $projectId , $memberId){

        $project = $this->skipPresenter()->find( $projectId );

        foreach ($project->members as $member){
            if($member->id == $memberId){
                return true;
            }

        }
        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }
}


