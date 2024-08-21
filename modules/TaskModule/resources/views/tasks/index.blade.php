@extends('taskmodule::layouts.template')

@section('title','tasks')
    
@section('content')
    <div class="container p-4">
        
        <div class="row">
            <div class="col-md-5 d-flex flex-column align-items-start">
                <form class="form-inline my-2 my-lg-0 w-100">
                    <input type="search" id="search" class="form-control mb-2" placeholder="Search Your Task">
                </form>
                <div class="form-group w-100">
                    <label for="selector">Gender</label>
                    <select class="form-control" id="selector">
                        <option value="None">None</option>
                    </select>
                </div>
            </div>
        </div>

    </div>  
    <div class="container p-4">
        <div class="row ">
            <div class="col-md-5">
                
                <div class="card">
                    <div class="card-body">
                        <!-- Título del formulario -->
                        <h4 class="card-title text-center">Task register form</h4>
            
                        <form id="task-form" action="{{ route('task/store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="taskId">
                            
                            <!-- Campo para el nombre de la tarea -->
                            <div class="form-group mb-3">
                                <input type="text" id="name" placeholder="Task Name" class="form-control">
                            </div>
                            
                            <!-- Campo para la descripción de la tarea -->
                            <div class="form-group mb-4">
                                <textarea id="description" cols="30" rows="10" class="form-control" placeholder="Task Description"></textarea>
                            </div>
                            
                            <!-- Botón para guardar la tarea -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save Task</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody id="tasks"></tbody>
                </table>
                
                <template id="task-template">
                    <tr taskId="">
                        <td class="task-id"></td>
                        <td class="task-name"></td>
                        <td class="task-description"></td>
                        <td>
                            <button class="task-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                        <td>
                            <button class="task-item btn ">
                                Editar
                            </button>
                        </td>
                    </tr>
                </template>
                

            </div>
        </div>
    </div>
    
    
@endsection

