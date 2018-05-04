<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siter extends Model
{
    use SoftDeletes;
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];
    protected $guarded = [
        'created_at','updated_at','deleted_at'
    ];
    protected $hidden = [
        'deleted_at'
    ];

    public function sites()
    {
        return $this->hasMany('App\Models\Site');
    }
}
