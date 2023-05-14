<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $primaryKey = 'courseID';
    protected $fillable = ['img', 'title', 'description', 'courselength', 'description2', 'capacity'];
}
