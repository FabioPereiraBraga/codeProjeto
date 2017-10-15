<?php
namespace CodeProject\Validator;
use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 17:29
 */

class ProjectMembersValidator extends  LaravelValidator
{
    protected $rules = [
        'project_id' => 'required',
        'user_id'  => 'required',

    ];




}