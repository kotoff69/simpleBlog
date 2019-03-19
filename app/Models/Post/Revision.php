<?php

namespace App\Models\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_revisions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'post_id',
    ];

    /**
     * Relation with categories table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
