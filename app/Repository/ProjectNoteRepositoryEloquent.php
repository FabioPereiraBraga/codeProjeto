<?php
namespace CodeProject\Repository;


use CodeProject\Entities\ProjectNote;
use CodeProject\Presenters\ProjectNotePresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: Fabio Braga
 * Date: 01/05/16
 * Time: 16:02
 */
class ProjectNoteRepositoryEloquent   extends BaseRepository  implements ProjectNoteRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */

   public  function model()
    {
        return ProjectNote::class;
    }

    public function presenter()
    {
        return ProjectNotePresenter::class;
    }

}
