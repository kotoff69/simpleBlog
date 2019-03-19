<?php

namespace App\Models;

use App\Models\Post\Comment;
use App\Models\Post\Revision;
use App\Models\Post\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'revision_id', 'user_id',
    ];

    /**
     * Relation with categories table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relation with posts_revisions table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }

    /**
     * Relation with posts_revisions table (current active revision)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currentRevision()
    {
        return $this->hasOne(Revision::class, 'id', 'revision_id');
    }

    /**
     * Relation with posts_tags table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * Relation with posts_comments table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relation with users table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get posts list
     *
     * @return mixed
     */
    public static function getList()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    /**
     * Get post with current text revision
     *
     * @param int $id Post id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function getWithRevisions($id)
    {
        return self::with(['revisions', 'currentRevision'])->find($id);
    }
}
