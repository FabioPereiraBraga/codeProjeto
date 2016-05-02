<?php
namespace CodeProject\Validator;
use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 17:29
 */

class ClientValidator extends  LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:225',
        'responsible'  => 'required|max:225',
        'email'=> 'required|email',
        'phone'=> 'required',
        'address'=> 'required'
    ];




}