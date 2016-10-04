<?php
namespace CodeProject\Validator;
use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 17:29
 */

class ProjectNoteValidator extends  LaravelValidator
{
    protected $rules = [
        'title'  => 'required',
        'note'=> 'required'

    ];




}