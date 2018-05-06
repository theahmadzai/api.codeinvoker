<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $hidden = [
        'image_id',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}
