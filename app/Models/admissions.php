<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admissions extends Model
{
    use HasFactory;
    protected $primaryKey = 'admissionID';
    protected $fillable = ['studentID', 'courseID', 'email', 'phone', 'img'];
}
