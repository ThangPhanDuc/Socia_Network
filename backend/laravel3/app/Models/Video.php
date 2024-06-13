<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'post_id',
        'path',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function likes()
    {
        return $this->hasMany(VideoLike::class, 'video_id');
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    public function comments()
    {
        return $this->hasMany(VideoComment::class, 'video_id');
    }

    public function commentsCount()
    {
        return $this->comments()->count();
    }

    public function getCreatedAtAttribute($value)
    {
        $dateTime = Carbon::parse($value);
        $vietnamDateTime = $dateTime->addHours(0)->setTimezone('Asia/Ho_Chi_Minh');
        return $vietnamDateTime->format('H:i:s d/m/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        $dateTime = Carbon::parse($value);
        $vietnamDateTime = $dateTime->addHours(0)->setTimezone('Asia/Ho_Chi_Minh');
        return $vietnamDateTime->format('H:i:s d/m/Y');
    }
}
