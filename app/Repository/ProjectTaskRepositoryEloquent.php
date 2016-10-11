<?php

namespace CodeProject\Repository;



use CodeProject\Presenters\ProjectTaskPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\ProjectTask;


/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{

    protected $fieldSearchable = [
        'name'=>'like',
        'project_id',
        'id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

    public function boot(){
        $this->pushCriteria( app(RequestCriteria::class ));
    }


    /**
     * Boot up the repository, pushing criteria
     */

    public function presenter()
    {
        return ProjectTaskPresenter::class;
    }

}
