<?php
namespace CodeProject\Repository;

use CodeProject\Entities\User;
use CodeProject\Presenters\UserPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: Fabio Braga
 * Date: 01/05/16
 * Time: 16:02
 */
class UserRepositoryEloquent   extends BaseRepository  implements UserRepository
{

    protected $fieldSearchable = [
        'name'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */

   public  function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class ));
    }

    public function presenter()
    {
        return UserPresenter::class;
    }
    
}
