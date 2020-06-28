<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Exception;

class ConfigController extends Controller
{

    public function index(Request $request){

        $nome = "anderson";
        $idade = 13;
        $cidade = $request->input('cidade');

        $lista = [
        ];

        $data = [
            'nome'=> $nome,
            'idade' => $idade,
            'cidade' =>$cidade,
            'lista' =>$lista
        ];


        return view('admin.config', $data);

    }

    public function info(){
        echo "Configuraçoes info 3";

    }

    public function permissoes(){
        echo "permissoes perm 3";
    }
}
