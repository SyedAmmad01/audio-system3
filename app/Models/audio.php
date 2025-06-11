<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class audio extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['user_id', 'user_name', 'date_to', 'date_from', 'recording', 'extension', 'audio_type'];
}
