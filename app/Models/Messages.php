<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['user_id', 'chat_id', 'message'];
    protected $visible = ['id', 'user_id', 'chat_id', 'message', 'updated_at'];
}
