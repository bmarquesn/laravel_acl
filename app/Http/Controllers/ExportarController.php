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

            if(isset($registros['retorno'][0]) && !empty($registros['retorno'][0])) {
                /** remover senha quando ususario */
                if($model_exportar === "users") {
                    foreach($registros['retorno'][0] as $key => $value) {
                        if($key == "password") {
                            unset($registros['retorno'][0]->$key);
                        }
                    }
                }

                $retorno['retorno'] = $registros['retorno'][0];
            } else {
                $retorno['retorno'] = "nao ha registros";
            }
        } else {
            $retorno['retorno'] = "erro";
        }

        return json_encode($retorno);
    }
}
