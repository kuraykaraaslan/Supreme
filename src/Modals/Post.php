<?php

namespace Kuraykaraaslan\Supreme\Modals;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kuraykaraaslan\Supreme\Supreme;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'category_id',
        'template',
        'status',
        'title',
        'description',
        'keywords',
        'image',
        'available_locales',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }



}




