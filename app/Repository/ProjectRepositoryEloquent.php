<?php
namespace CodeProject\Repository;


use CodeProject\Entities\Project;
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
}
{

}