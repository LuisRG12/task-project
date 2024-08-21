<?php

namespace Modules\TaskModule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';
    protected $primaryKey = 'id';
    
    protected $connection = 'task_connection';

    protected $fillable = [
        'name'
    ];

    //Relacion uno a muchos

    // public function tasks() {
    //     return $this->hasMany('App\Models\task');
        
    // }


}
