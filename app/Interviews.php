<?php

namespace tennisportal;

use Illuminate\Database\Eloquent\Model;

class Interviews extends Model
{
    protected $table = 'interviews';

    protected $guarded = [];

    public function users(){
        return $this->belongsTo('tennisportal\User', 'user_id');
    }
}
