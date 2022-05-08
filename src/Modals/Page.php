<?php

namespace Kuraykaraaslan\Supreme\Modals;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  use HasFactory;

    protected $fillable =[
        'name',

        'slug',

        'content',
        'parent_id',

        'template',

        'title',
        'description',
        'keywords',

        'available_locales',
        'status',


    ];

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}

