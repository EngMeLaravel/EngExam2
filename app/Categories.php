<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories";
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
        return array_get($this->status, $this->cate_active, '[N\A]');
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategories::class);
    }

}
