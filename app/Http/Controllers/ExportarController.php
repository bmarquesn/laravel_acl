<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Query Builder */
use Illuminate\Support\Facades\DB;

class ExportarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index($model_exportar)
    public function index()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $model_exportar = $_GET['id'];

            $registros['retorno'] = DB::table($model_exportar)->get();
            $retorno['retorno'] = $registros['retorno'][0];
        } else {
            $retorno['retorno'] = "erro";
        }

        echo json_encode($retorno);
    }
}
