<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ForumUser
 *
 * @property int $user_id
 * @property int $forum_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForumUser whereForumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ForumUser whereUserId($value)
 * @mixin \Eloquent
 */
class ForumUser extends Model
{
    //
    public $timestamps = false;
}
