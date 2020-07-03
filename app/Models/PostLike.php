<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class PostLike
 * @package App
 * @property int $user_id
 * @property int $post_id
 */
class PostLike extends Model
{
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;
}
