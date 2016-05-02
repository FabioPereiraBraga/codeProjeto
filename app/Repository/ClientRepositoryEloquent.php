<?php
namespace CodeProject\Repository;
use CodeProject\Entities\Clients;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: Fabio Braga
 * Date: 01/05/16
 * Time: 16:02
 */
class ClientRepositoryEloquent   extends BaseRepository  implements ClienteRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */

   public  function model()
    {
        return Clients::class;
    }
}
{

}