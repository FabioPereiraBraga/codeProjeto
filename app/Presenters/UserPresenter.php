<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:56
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\UserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class UserPresenter extends  FractalPresenter
{
  public  function getTransformer()
  {
      return new UserTransformer();
  }

}