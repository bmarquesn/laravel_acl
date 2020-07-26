<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

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
        $enderecos = Endereco::latest()->paginate(5);
        return view('enderecos.index', compact('enderecos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enderecos.create');
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
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);
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
        return view('enderecos.edit', compact('endereco'));
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
