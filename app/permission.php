<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    public function roles(){
        return $this->belongsToMany('App\Role' , 'roles_permissions');
    }
}
