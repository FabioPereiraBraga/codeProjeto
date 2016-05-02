<?php
namespace CodeProject\Validator;
use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 17:29
 */

class ProjectValidator extends  LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id'  => 'required|integer',
        'name'=> 'required',
        'description'=> 'required',
        'progress'=> 'required',
        'status'=> 'required',
        'due_date'=> 'required',
    ];




}