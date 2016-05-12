<?php

namespace tennisportal;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'newscategories';

    public function news() {
        return $this->hasMany('tennisportal\News', 'newscategory_id');
    }
}
