<?php

namespace App;

use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterdataItem extends Eloquent
{
    use SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'masterdataitem';
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\Masterdata');
    }

    public function masterdata()
    {
        return $this->belongsToMany('App\Masterdata');
    }
}
