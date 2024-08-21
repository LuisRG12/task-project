<?php

namespace Modules\TaskModule\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    

    protected $connection = 'task_connection';
    protected $fillable = [
        'name',
        'description',
        'gender',
        'id_gender'
    ];

    //Relacion uno a muchos inversa

    // public function gender() {
    //     return $this->belongsTo('App\Models\Gender', 'id_gender');
        
    // }


}

