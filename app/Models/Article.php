<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'body',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LatestScope);
    }

    function delete()
    {
        if ($this->image()->exists()) {
            $this->image->delete();
        }

        parent::delete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function setTags($tagsList)
    {
        $tagsIds = [];

        if (!is_null($tagsList)) {
            $tagsNames = explode(',', $tagsList);

            foreach ($tagsNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => Str::of(Str::lower($tagName))->trim()]);
                $tagsIds[] = $tag->id;
            }
        }

        $this->tags()->sync($tagsIds);
    }
}
