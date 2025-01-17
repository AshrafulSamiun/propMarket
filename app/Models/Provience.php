<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provience extends Model
{
    use HasFactory;

    protected $fillable = ['provience_name', 'country_id', 'status_active'];
}
