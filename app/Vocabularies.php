<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabularies extends Model
{
    protected $table = "vocabularies";
    protected $guarded = ['*'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'cate_id');
    }

    public function subCategories()
    {
        return $this->belongsTo(SubCategories::class, 'subcate_id');
    }
}
