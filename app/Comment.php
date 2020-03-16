<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=[];

        public function recipe(){
            return $this->belongsTo(Recipe::class);
        }
}
