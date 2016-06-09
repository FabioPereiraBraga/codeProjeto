<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/06/16
 * Time: 23:56
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectNotePresenter extends  FractalPresenter
{
  public  function getTransformer()
  {
      return new ProjectNoteTransformer();
  }

}