<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRoom extends Model
{
    use HasFactory;

    protected $fillable = ['maintainance_room', 'project_id', 'locaton','comment', 'inserted_by', 'updated_by', 'status_active', 'is_deleted'];
}