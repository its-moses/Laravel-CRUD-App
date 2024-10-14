<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Testuser;
use Illuminate\Support\Facades\Validator;
class relationCOntroller extends Controller
{
    //
    function index(Request $request)
    {
        $id = $request->id;
        // return json_encode();
        return response()->json(Testuser::find($id)->addressData);
    }



    function getDBdata($id = null)
    {
        return $id ? Testuser::find($id) : Testuser::all();
    }


    function addDBdata(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'field' => 'required'
        );

        $validate = Validator::make($request->all(), $rules);
        if($validate->fails()) 
        {
            return response()->json($validate->errors() , 401);
        }
        else
        {
        $testuser = new Testuser;
        $testuser->name = $request->name;
        $testuser->field = $request->field;
        $testuser->save();
        if($testuser)
        {
            return ["result" => "data added successfully"];
        }
        else
        {
            return ["result" => "data has not added "];
        }
    }
    }
    function updateDBdata(Request $request , $id = null)
    {
        $testuser = Testuser::find($id);
        $testuser->name = $request->name;
        $result = $testuser->save();
        if($result)
        {
            return ["result" => "data updated successfully"];
        }
        else
        {
            return ["result" => "data has not updated"];
        }
    }
    function deleteDBdata($id)
    {
        $testuser = Testuser::find($id);
        $result = $testuser->delete();
        if($result)
        {
            return ["result" => "data deleted successfully"];
        }
        else
        {
            return ["result" => "data has not deleted"];
        }
    }
    function searchDbdata($name)
    {
        return Testuser::where("name", "like", "%".$name."%")->get();
    }
}
