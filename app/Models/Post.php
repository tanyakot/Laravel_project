<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 *@property int $id;
 *@property string $title;
 * @property string $description;
 * @property int $user_id;
 * @property Carbon $created_at;
 * @property Carbon $update_at;
 */

class Post extends Model
{
//public function user1()
//{
  //  return $this -> hasOne(User::class);
//}
public function user()
{
    return $this->belongsTo(User::class);
}

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostLike::class);
    }
}
