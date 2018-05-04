<?php

namespace App\Models;

//使其继承认证类。
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Authenticatable
{
    //使用软删除，邮件提醒和权限管理trait
    //备注：对于softdelete和entrust里面分别都定义了restore方法。避免冲突的方法如下。
    use SoftDeletes {restore as private restoreA;}
    use EntrustUserTrait {restore as private restoreB;}
    use Notifiable;

    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];
    protected $guarded = [
        'created_at','updated_at','deleted_at'
    ];
    protected $hidden = [
        'deleted_at','password'
    ];
}
