<?php

class Users extends \Illuminate\Database\Eloquent\Model {
    protected $table = 't_users';
    protected $hidden = array('password', 'salt','created','active');

    public function user_profile()
    {
        return $this->hasOne('User_Profile');
    }
}

class User_Profile extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 't_users_profiles';
}
