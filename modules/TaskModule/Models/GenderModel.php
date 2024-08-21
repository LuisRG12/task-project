<?php

namespace Modules\TaskModule\Models;



class GenderModel 
{
    public static function searchGenders($filters = []){

        $query = Gender::query();

        if(isset($filters['search'])){
            $query->where('name', 'like', "%{$filters['search']}%");

        }

        return $query->get();
    }

    public static function getGender($namegender = null){
        if ($namegender === null) {
            return Gender::all();
        }
        $gender = Gender::where('name', $namegender['name'])
                            ->orWhere('id',$namegender['id'])
                            ->first();
        return $gender;

    }


    public static function saveGender($new_gender){

        $gender = GenderModel::getGender($new_gender);
        if($gender){
            return null;
        }else{
            $gender = Gender::create($new_gender);
            return response()->json(['success' => 'Género creado correctamente.', 'gender' => $new_gender['name']], 201);
        }
       
    }
    public static function editGender($gender_edit){

        $gender = GenderModel::getGender($gender_edit);

        if($gender){
            $gender->update($gender_edit);
            return $gender;
        }
        
    }

    public static function deleteGenger($idGender){
        $gender = GenderModel::getGender($idGender);
        if($gender){
            $gender->delete();
            return true;
        }
        return $gender;
    }

}
