<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostings extends Model
{
    use HasFactory;
    public $table = "JobPostings";
    public $primaryKey = "JobId";
}
