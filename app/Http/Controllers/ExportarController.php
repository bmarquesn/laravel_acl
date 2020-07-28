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
        $model_exportar = 'enderecos';

        $registros = DB::table($model_exportar)->get();
        var_dump($registros);die;
    }
}
