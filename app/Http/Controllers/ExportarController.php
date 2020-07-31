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
    public function index($id)
    {
        if(!empty($id)) {
            $model_exportar = $id;

            $registros['retorno'] = DB::table($model_exportar)->get();
            $retorno['retorno'] = $registros['retorno'][0];
        } else {
            $retorno['retorno'] = "erro";
        }

        return json_encode($retorno);
    }
}
