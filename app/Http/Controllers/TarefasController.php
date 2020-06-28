<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list(){
        $list = DB::select('SELECT * FROM tarefa');

        return view('tarefas.list', [
            'list'=> $list
        ]);
    }
    public function add(){
        return view('tarefas.add');
    }
    public function addAction(Request $request){
        $request->validate([
           'titulo'=> [ 'required','string' ]
        ]);
        $titulo = $request->input('titulo');

        DB::insert('INSERT INTO tarefa (titulo) values (:titulo)',[
            'titulo'=>$titulo
        ]);
        return redirect()->route('tarefas.list');

    }
    public function edit($id){
        $data = DB::select('SELECT * from tarefa WHERE id = :id',[
            'id'=>$id
        ]);
        if(count($data)>0){
            return view('tarefas.edit', [
                'data'=> $data[0]
            ]);
        }else{
            return redirect()->route('tarefas.list');
        }

    }
    public function editAction(Request $request, $id){
        $request->validate([
            'titulo'=> [ 'required','string' ]
        ]);

        $titulo = $request->input('titulo');

        DB::update('UPDATE tarefa SET titulo = :titulo WHERE id = :id',[
            'id'=>$id,
            'titulo'=>$titulo
        ]);

        return redirect()->route('tarefas.list');

    }
    public function del($id){
        DB::delete('DELETE FROM tarefa WHERE id = :id',[
            'id'=>$id
        ]);
        return redirect()->route('tarefas.list');
    }
    public function done($id){
        DB::update('UPDATE tarefa SET resolvido = 1 - resolvido WHERE id=:id',[
            'id'=>$id
        ]);
        return redirect()->route('tarefas.list');
    }

}
