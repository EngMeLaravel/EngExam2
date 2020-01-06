<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = "sub_categories";
    protected $guarded = ['*'];
    const STATUS_PUBLIC  = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'name'  => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name'  => 'Private',
            'class' => 'label-default'
        ],
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->subcate_active, '[N\A]');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'cate_id');
    }

    public function vocabularies()
    {
        return $this->hasMany('vocabularies');
    }
}
