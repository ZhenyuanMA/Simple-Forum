<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Forum
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Forum extends Model
{
    //
    public function threads() {
        return $this->hasMany('App\Thread');
    }

}
