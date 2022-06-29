<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notebook;
use Illuminate\Support\Facades\DB;

class NotebookController extends Controller
{
    public function getAll(){
        $notebookAll = DB::table('notebooks')->get();
        return $notebookAll;
    }

    public function setNew(Request $request){
        $full_name = $request->full_name;
        $company = $request->company ? $request->company : null;
        $phone = $request->phone;
        $email = $request->email;
        $birthday = $request->birthday ? $request->birthday : null;
        $path_photo = $request->path_photo ? $request->path_photo : null;

        $notebook = new Notebook;
        $notebook->full_name = $full_name;
        $notebook->phone = $phone;
        $notebook->email = $email;
        $notebook->birthday = $birthday;
        $notebook->company = $company;
        $notebook->path_photo = $path_photo;
        $res = $notebook->save();
        return $res;
    }

    public function getById($id){
        $notebookById = DB::table('notebooks')
                                -> where("id", '=', $id)
                                -> get();
        return $notebookById;
    }

    public function updateById(Request $request, $id){
        $arrData = [];
        foreach($request->except('_token') as $key => $value){
            $arrData[$key] = $value;
        }
        $res = Notebook::where('id', '=', $id)->update($arrData);
        return $res;
    }

    public function deleteById($id){
        $notebook = Notebook::find($id);
        $res = $notebook->delete();
        return $res;
    }
}
