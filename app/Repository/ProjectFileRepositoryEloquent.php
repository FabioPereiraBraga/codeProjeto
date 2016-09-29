<?php
namespace CodeProject\Repository;


use CodeProject\Entities\ProjectFile;
use CodeProject\Presenters\ProjectFilePresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: Fabio Braga
 * Date: 01/05/16
 * Time: 16:02
 */
class ProjectFileRepositoryEloquent   extends BaseRepository  implements ProjectFileRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */

   public  function model()
    {
        return ProjectFile::class;
    }

    public function presenter()
    {
        return ProjectFilePresenter::class;
    }

}
