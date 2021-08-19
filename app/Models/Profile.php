<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'user_id',
    ];

    public function ProfileImage()
    {
        return $this->image ? asset('/storage/'.$this->image) : 'https://freesvg.org/img/userMale.png';
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //todo:  M:M => Profile can Have Many Users that follow it
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    
}
