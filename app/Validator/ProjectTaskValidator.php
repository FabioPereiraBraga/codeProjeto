<?php
namespace CodeProject\Validator;
use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 17:29
 */

class ProjectTaskValidator extends  LaravelValidator
{
    protected $rules = [
        'name' => 'required',
        'project_id' => 'required',
        'start_date' => 'required',
        'due_date' => 'required',
        'status' => 'required'
    ];




}