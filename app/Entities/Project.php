<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'owner_id',
        'description',
        'progress',
        'status',
        'due_date',
        'name',
        'client_id',
    ];



    public function user ()
    {

        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members ()
    {
        return $this->belongsToMany(User::class, 'project_members','project_id', 'user_id');
    }



    public function client()
    {
        return $this->belongsTo(Clients::class,'client_id');
    }

    public function note()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }

    public function task()
    {
        return $this->hasMany(ProjectTask::class);
    }

}
