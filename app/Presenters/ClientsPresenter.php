<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:56
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\ClientsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ClientsPresenter extends  FractalPresenter
{
  public  function getTransformer()
  {
      return new ClientsTransformer();
  }

}