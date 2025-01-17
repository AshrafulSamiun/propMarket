<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['moduleName', 'modSlNo', 'status','project_id'];
	
	public function menus()
	{
		return $this->hasMany('App\Models\Menu', 'moduleId', 'id');
	}

}
