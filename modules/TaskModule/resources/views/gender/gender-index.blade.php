@extends('taskmodule::layouts.template')

@section('title','Gender')
    
@section('content')
    <div class="container p-4">
        
        <div class="row">
            <div class="col-md-5 d-flex flex-column align-items-start">
                <form class="form-inline my-2 my-lg-0 w-100">
                    <input type="search" id="search" class="form-control mb-2" placeholder="Search Your Gender">
                </form>
                <div class="form-group w-100">
                    
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
                        <h4 class="card-title text-center">Gender register form</h4>
            
                        <form id="gender-form" action="{{ route('gender/store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="genderId">
                            
                            <!-- Campo para el nombre del gender -->
                            <div class="form-group mb-3">
                                <input type="text" id="name" placeholder="Gender Name" class="form-control">
                            </div>
                            
                           
                            
                            <!-- Botón para guardar la tarea -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save Gender</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                        </tr>
                    </thead>
                    <tbody id="genders"></tbody>
                </table>
                
                <template id="Gender-template">
                    <tr genderId="">
                        <td class="gender-id"></td>
                        <td class="gender-name"></td>
                        <td>
                            <button class="gender-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                        <td>
                            <button class="gender-item btn ">
                                Editar
                            </button>
                        </td>
                    </tr>
                </template>
                

            </div>
        </div>
    </div>
    
   
@endsection