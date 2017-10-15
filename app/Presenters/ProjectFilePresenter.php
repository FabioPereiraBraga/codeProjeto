<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:56
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectFileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectFilePresenter extends  FractalPresenter
{
  public  function getTransformer()
  {
      return new ProjectFileTransformer();
  }

}