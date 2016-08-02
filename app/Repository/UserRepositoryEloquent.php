<?php
namespace CodeProject\Repository;

use CodeProject\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: Fabio Braga
 * Date: 01/05/16
 * Time: 16:02
 */
class UserRepositoryEloquent   extends BaseRepository  implements UserRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */

   public  function model()
    {
        return User::class;
    }

    
}
