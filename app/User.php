<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Other Eloquent Properties...

    /**
     * Get all of the tasks for the user.
     */
    public function tas()
    {
        return $this->hasMany(Task::class);
    }
}