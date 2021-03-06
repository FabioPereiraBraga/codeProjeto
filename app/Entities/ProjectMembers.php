<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectMembers extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    public function users ()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
    public function project ()
    {
        return $this->belongsTo(Project::class,'project_id');
    }




}
