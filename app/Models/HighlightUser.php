<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighlightUser extends Model
{
    protected $table = 'highlighted_users';
    protected $visible = ['user_id', 'highlighted_user_id'];
    protected $fillable  = ['user_id', 'highlighted_user_id'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    use HasFactory;
}
