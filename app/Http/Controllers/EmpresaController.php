<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

/** Para utilizar a "SESSION" do usuário logado */
use Illuminate\Support\Facades\Auth;
/** Query Builder */
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:empresa-list|empresa-create|empresa-edit|empresa-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:empresa-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:empresa-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:empresa-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = DB::table('empresas')
            ->leftJoin('users', 'users.id', '=', 'empresas.usuario_id')
            ->paginate(5, array('users.name AS nomeUsuario', 'empresas.*'));
        return view('empresas.index', compact('empresas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'razao_social' => 'required',
            'nome_fantasia' => 'required',
            'cnpj' => 'required',
        ]);
        /** a Empresa será vinculada ao Usuário Logado */
        $request['usuario_id'] = Auth::user()->id;

        Empresa::create($request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa criada com sucesso.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        request()->validate([
            'razao_social' => 'required',
            'nome_fantasia' => 'required',
            'cnpj' => 'required',
        ]);
        $empresa->update($request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa excluida com sucesso');
    }
}
