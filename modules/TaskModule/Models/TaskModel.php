<?php

namespace Modules\TaskModule\Models;



class TaskModel 
{
    public static function searchTasks($filters){

        $query = Task::query();

        if(isset($filters['search'])){
            $query->where('name', 'like', "%{$filters['search']}%");
        }
        
        if(isset($filters['gender'])){
            $query->where('gender', $filters['gender']);
        }
        $results = $query->get();
        // Verifica si los resultados están vacíos
        if ($results->isEmpty()) {
            return [
                'message' => 'No tasks found.',
                'status' => 'empty'
            ];
        }

        return $results;
    }

    public static function all_tasks(){

        $tasks = Task::all();

        return $tasks;

    }
    public static function allTasks(){

        $tasks = Task::all();
        if ($tasks->isEmpty()) {
            return [
                'message' => 'No tasks found.',
                'status' => 'empty'
            ];
        }else{
            return $tasks;
        }
        

    }

    public static function editTask($task_edit){

        $task = TaskModel::get_Task($task_edit);

        if($task){
            $task->update($task_edit);
            return $task;
        }
        
    }



    public static function get_Task($Task){
        // $task = Task::find($idTask);
        // return $task;
        
        $task = Task::where('name', $Task['name'])
                            ->orWhere('id',$Task['id'])
                            ->first();
        return $task;
    }



    public static function save_task($new_tarea){

        $task = TaskModel::get_Task($new_tarea);
        if($task){
            return null;
        }else{
            $task = Task::create($new_tarea);
            return response()->json(['success' => 'Género creado correctamente.', 'gender' => $new_tarea['name']], 201);
        }

    }


    



    public static function delete($idTarea){
        $tarea = TaskModel::get_task($idTarea);
        if($tarea){
            $tarea->delete();
            return true;
        }
        return false;
    }
    



}
