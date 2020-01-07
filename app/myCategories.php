<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class myCategories extends Model
{
    protected $table = "my_categories";
    protected $guarded = ['*'];

    public function mysubcategory(){
        return $this->hasMany('mySubCategories');
    }
}
