<?php

namespace Kuraykaraaslan\Supreme\Controllers;

use Kuraykaraaslan\Supreme\Modals\Post;
use Kuraykaraaslan\Supreme\Supreme;
use Spatie\Valuestore\Valuestore;

class SettingsController extends Controller
{

    public function __construct()
    {
        

    }

    public function reset()
    {
        Supreme::reset();
    }


    public function homepage()
    {

        return view('supreme::settings.pages.homepage');

    }

    public function post_index()
    {
        return view('supreme::settings.pages.post.index');

    }

    public function post_create()
    {

        $this->validate(request(), [
            'name' => 'required|string|max:120',
            'slug' => 'required|string|max:120|unique:posts|regex:/^[a-zA-Z0-9-_]+$/',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'required|in:draft,published,archived',
            'meta_title' => 'required|string|max:120',
            'meta_description' => 'required|string|max:160',
            'meta_keywords' => 'required|string|max:160',
            'image' => 'required|image',
            'created_at' => 'date',
            'updated_at' => 'date',
            'deleted_at' => 'date',

            'translations' => 'required|json',

        ]);

        $post = new Post(request()->all());

        return route('supreme.settings.post.show', $post->id);

    }

    public function post_show(Post $post)
    {
        return view('supreme::settings.pages.post.show', compact('post'));
    }

    public function resource($resource)
    {
        return 'resource';

        return view('supreme::settings.pages.' . $resource .'.index');

    }



}