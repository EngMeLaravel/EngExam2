<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mySubCategories extends Model
{
    protected $table = "my_sub_categories";
    protected $guarded = ['*'];

    function mycategory(){
        return $this->belongsTo('myCategories');
    }
}
