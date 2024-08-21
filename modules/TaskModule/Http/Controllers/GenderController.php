<?php

namespace Modules\TaskModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TaskModule\Models\GenderModel;

class GenderController extends Controller
{
    public function genderIndex(){
        return view('taskmodule::gender/gender-index');
    }

    public function genderStore(Request $request){
        $new_gender = $request->all();
        $gender = GenderModel::saveGender($new_gender);
        
        return response()->json($gender);
    }

    public function gendersUpdate(Request $request) {
        
        $filters = $request;
        $gendersList = GenderModel::searchGenders($filters);
     
        
        return response()->json($gendersList);
        
    }

    public function genderEdit(Request $request){
        $genderEdit = $request->all();

        $gender = GenderModel::editGender($genderEdit);

        return response()->json($gender);
    }

    public function genderGet(Request $request) {

        $gender = GenderModel::getGender($request);

        return response()->json($gender);
    }


    public function genderDelete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:genders,id',
        ]);

        $deleted = GenderModel::deleteGenger($request);
        if ($deleted) {            
            return response()->json(['message' => 'Tarea Deleted Successfully']);
        }

        return response()->json(['message' => 'Tarea Not Found'], 404);
       
        

    }

    public function UpdateSelector() {

        $genders = GenderModel::getGender();
        return $genders;
    }


}