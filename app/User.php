<?php
    namespace tennisportal;

    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable {
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name',
            'email',
            'password',
        ];

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        public function news()
        {
            return $this->hasMany('tennisportal\News');
        }

        public function interviews()
        {
            return $this->hasMany('tennisportal\Interviews');
        }

        public function comments()
        {
            return $this->hasMany('tennisportal\Comments');
        }
    }
