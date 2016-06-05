<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{


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
        return $this->hasMany(ProjectMembers::class, 'project_id');
    }



    public function client ()
    {
        return $this->belongsTo(Clients::class,'client_id');
    }

    public function note()
    {
        return $this->hasMany(ProjectNote::class);
    }

}
