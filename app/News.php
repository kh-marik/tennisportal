<?php
    namespace tennisportal;

    use Illuminate\Database\Eloquent\Model;

    class News extends Model {
        protected $table = 'news';

        protected $guarded = [];

        public function newscategories()
        {
            return $this->belongsTo('tennisportal\NewsCategory', 'newscategory_id');
        }

        public function users()
        {
            return $this->belongsTo('tennisportal\User', 'user_id');
        }

        public function comments()
        {
            return $this->hasMany('tennisportal\Comments');
        }
    }
