<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'chat_user';
    protected $fillable = ['user_id', 'chat_id'];
    protected $primaryKey = 'id';

    public function chat () {
        return $this->belongsTo(Chat::class);
    }

}
