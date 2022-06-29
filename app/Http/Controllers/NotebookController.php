<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notebook;
use Illuminate\Support\Facades\DB;

class NotebookController extends Controller
{
    // Получение всех записей
    public function getAll(){
        $notebookAll = DB::table('notebooks')->get();
        return $notebookAll;
    }

    // Добавление новой записи
    public function setNew(Request $request){
        // Получение всех полей с помощью объекта request
        $full_name = $request->full_name;
        $company = $request->company ? $request->company : null;
        $phone = $request->phone;
        $email = $request->email;
        $birthday = $request->birthday ? $request->birthday : null;
        $path_photo = $request->path_photo ? $request->path_photo : null;
        
        // Запись в бд с помощью laravel eloquent
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

    // Получение записи по id
    public function getById($id){
        $notebookById = DB::table('notebooks')
                                -> where("id", '=', $id)
                                -> get();
        return $notebookById;
    }

    // Обновление записи по id
    public function updateById(Request $request, $id){
        $arrData = [];
        // Создание ассоциативного массива пример ['full_name' => 'User User'], для последующей отправке в бд
        foreach($request->except('_token') as $key => $value){
            $arrData[$key] = $value;
        }
        $res = Notebook::where('id', '=', $id)->update($arrData);
        return $res;
    }

    // Обновление записи по id
    public function deleteById($id){
        $notebook = Notebook::find($id);
        $res = $notebook->delete();
        return $res;
    }
}
