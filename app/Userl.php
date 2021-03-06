<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userl extends Model
{
    protected $table      = "users";
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function driver()
    {
        return $this->hasOne(Driver::class,"users_id","id");
    }
}
 