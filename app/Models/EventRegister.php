<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegister extends Model
{
    use HasFactory;
    public $table = "EventRegister";
    public $primaryKey = "RegistrationId";
}
