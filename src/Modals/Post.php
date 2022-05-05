<?php

namespace Kuraykaraaslan\Supreme\Modals;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kuraykaraaslan\Supreme\Supreme;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'keywords',
        'category_id',
        'status',
        'image',
        'user_id',

        'translations',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function url()
    {
        return route('supreme.post.show', $this->id);
    }

    public function getVariable($variable)
    {
        return 'deneme';

        if(in_array($variable, Supreme::settings('app.translatable')))
        {

            if (!is_json($this->{$variable})) {

                $decode = [];

                $temp = $this->{$variable};

                $lang = Supreme::detectLanguage($temp);

                $decode[$lang] = $temp;

                $this->{$variable} = json_encode($decode);

                $this->save();

                Supreme::log('String ' .  $variable . ' of post ' . $this->id . ' changed to json');
            }

            if(is_json($this->{$variable}))
            {
                $decode = json_decode($this->{$variable}, true);

                if(array_key_exists($variable, $decode))
                {
                    return $decode[$variable];

                } else { 

                    $translated = Supreme::translateString($variable, app()->getLocale());

                    if($translated)
                    {
                        $decode[$variable] = $translated;

                        $this->{$variable} = json_encode($decode);

                        $this->save();

                        return $translated;

                    } else {

                        Supreme::log('Translate ' .  $variable . ' of post ' . $this->id . ' not found');

                        return __('supreme::messages.no_translation');

                    }

                }

            } 

        } else {
            if (is_json($this->{$variable})) {
                $decode = json_decode($this->{$variable}, true);
        }



        }
    }

}