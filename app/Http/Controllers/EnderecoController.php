<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Empresa;
use Illuminate\Http\Request;

/** Query Builder */
use Illuminate\Support\Facades\DB;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:endereco-list|endereco-create|endereco-edit|endereco-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:endereco-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:endereco-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:endereco-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$enderecos = Endereco::latest()->paginate(5);
        $enderecos = DB::table('enderecos')
            ->leftJoin('empresas', 'empresas.id', '=', 'enderecos.empresa_id')
            ->paginate(5, array('empresas.nome_fantasia AS nomeEmpresa', 'enderecos.*'));
        return view('enderecos.index', compact('enderecos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** para o select box de seleção da Empresa */
        $empresas = Empresa::orderBy('nome_fantasia')->pluck('nome_fantasia', 'id')->toArray();
        /** para o select box de seleção da Estados */
        $ufs_brasil = $this->estados_brasileiros();

        return view('enderecos.create', compact('empresas', 'ufs_brasil'));
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
            'empresa_id' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);
        /** CEP somente numeros */
        $request['cep'] = preg_replace('/[^0-9]/', '', $request['cep']);
        Endereco::create($request->all());
        return redirect()->route('enderecos.index')->with('success', 'Endereço criado com sucesso.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        //$endereco['nomeEmpresa'] = DB::table('empresas')->where('id', $endereco['empresa_id'])->get();
        $empresa = DB::table('empresas')->where('id', $endereco['empresa_id'])->get();

        if($empresa && !empty($empresa[0]->nome_fantasia)) {
            $endereco['nomeEmpresa'] = $empresa[0]->nome_fantasia;
        } else {
            $endereco['nomeEmpresa'] = "";
        }

        return view('enderecos.show', compact('endereco'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Endereco $endereco)
    {
        $endereco['empresas'] = Empresa::orderBy('nome_fantasia')->pluck('nome_fantasia', 'id')->toArray();
        /** para o select box de seleção da Estados */
        $ufs_brasil = $this->estados_brasileiros();
        return view('enderecos.edit', compact('endereco', 'ufs_brasil'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        request()->validate([
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);
        $request['cep'] = preg_replace('/[^0-9]/', '', $request['cep']);
        $endereco->update($request->all());
        return redirect()->route('enderecos.index')->with('success', 'Endereco atualizado com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        $endereco->delete();
        return redirect()->route('enderecos.index')->with('success', 'Endereço excluído com sucesso');
    }
}
