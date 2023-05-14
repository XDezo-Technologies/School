<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    use HasFactory;
    protected $primaryKey = 'resultID';
    protected $fillable = ['studentID', 'name', 'subject', 'full_marks', 'pass_mark', 'acquired_marks', 'remarks'];
}
