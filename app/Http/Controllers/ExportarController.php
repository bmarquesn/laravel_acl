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
            if($id === 'regras') {
                $id = 'roles';
            } elseif($id === 'usuarios') {
                $id = 'users';
            }

            $model_exportar = $id;

            $registros['retorno'] = DB::table($model_exportar)->get();

            if(count($registros['retorno']) > 0) {
                /** remover senha quando ususario */
                if($model_exportar === "users") {
                    foreach($registros['retorno'] as $key => $value) {
                        unset($registros['retorno'][$key]->password);
                    }
                }

                $retorno['retorno'] = $registros['retorno'];
            } else {
                $retorno['retorno'] = "nao ha registros";
            }
        } else {
            $retorno['retorno'] = "erro";
        }

        return json_encode($retorno);
    }
}
