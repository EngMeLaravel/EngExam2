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

    public function subcategories()
    {
        return $this->belongsTo(SubCategories::class, 'subcate_id');
    }

    public function vocatype()
    {
        return $this->hasOne(VocaType::class, 'id', 'voca_type');
    }
}
