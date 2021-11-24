<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'name',
        'body',
    ];

    protected $attributes = [
        'reviewed_at' => null,
    ];

    protected static function booted()
    {
        static::addGlobalScope('reviewed', function(Builder $builder) {
            $builder->whereNotNull('reviewed_at');
        });
    }

    public function scopeOnlyPendingReview($query)
    {
        $query->withoutGlobalScope('reviewed')->whereNull('reviewed_at');
    }

    public function scopeWithPendingReview($query)
    {
        $query->withoutGlobalScope('reviewed');
    }

    public function approve() {
        $this->reviewed_at = now();
        $this->save();
    }

    public function wasApproved()
    {
        return !$this->isPendingReview();
    }

    public function isPendingReview()
    {
        return is_null($this->reviewed_at);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
