<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:56
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectMembersTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectMembersPresenter extends  FractalPresenter
{
  public  function getTransformer()
  {
      return new ProjectMembersTransformer();
  }

}