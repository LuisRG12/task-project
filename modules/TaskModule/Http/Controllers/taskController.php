<?php

namespace Modules\TaskModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TaskModule\Models\TaskModel;
use PhpOption\None;

class taskController extends Controller
{
    public function index(){
        return view('taskmodule::tasks/index');
    }

    public function taskObtener()  {

        $query = TaskModel::allTasks();

        
        
        return $query;
    }

    public function update(Request $request){

        if ($request->gender == 'None' && $request->search == ''){
            
            $tasksList = TaskModel::all_tasks();
            
        }
        // elseif($request->gender == 'None' && $request->search != ''){
        //     $filters = $request->search;
        //     $tasksList = TaskModel::searchTasks($filters);
        // }
        else{
            $filters = $request;
            $tasksList = TaskModel::searchTasks($filters);
        }
        
        return response()->json($tasksList);
        
    }
    public function task_store(Request $request)  {

        $registered_task = $request->all();

        $new_task = TaskModel::save_task($registered_task);
        
        return $new_task;
    }


    public function task_edit(Request $request){

        
        $taskEdit = $request->all();

        $task = TaskModel::editTask($taskEdit);

        return $task;
    }


    public function taskGet(Request $request) {

        $task = TaskModel::get_Task($request);

        return response()->json($task);
    }

    public function task_delete(Request $request){
         
        $request->validate([
            'id' => 'required|integer|exists:tasks,id',
        ]);

        $deleted = TaskModel::delete($request);

        if ($deleted) {            
            return response()->json(['message' => 'Tarea Deleted Successfully']);
        }

        return response()->json(['message' => 'Tarea Not Found'], 404);
    }

    

}
