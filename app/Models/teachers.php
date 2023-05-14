<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $primaryKey = 'teacherID';
    protected $fillable = ['img', 'name', 'post', 'field', 'experience', 'description'];
}
