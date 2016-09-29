<?php
namespace CodeProject\Validator;
use Prettus\Validator\LaravelValidator;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 17:29
 */

class ProjectFileValidator extends  LaravelValidator
{
    protected $rules = [
        'file' => 'required|mimes:pdf,jpeg,bmp,png,mp4,jpg',
        'extension'  => 'required',
        'name'=> 'required',
        'project_id'=> 'required',
        'description'=> 'required'

    ];




}