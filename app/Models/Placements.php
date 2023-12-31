<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placements extends Model
{
    use HasFactory;
    public $table = "Placements";
    public $primaryKey = "PlacementId";
    public $keyType = "string";
}
