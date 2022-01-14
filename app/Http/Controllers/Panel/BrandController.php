<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

use function GuzzleHttp\Promise\all;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $brands;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }



    public function index()
    {
        $title = 'Marcas de Avioes';

        $brands = $this->brand ->all(); // variavel brands recebendo todas as brands

        return view('panel.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Criacao de marcas';

        return view('panel.brands.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    $dataform = $request->all();

    if($insert = $this->brand->create($dataform))

        return redirect()
                        ->route('brands.index')
                        ->with('sucess', 'cadastro realizado com sucesso');
    else
        return redirect()
                        ->back()
                        ->with('error', 'fallha ao cadastrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brand = $this->brand->find($id);

        if(!$brand) // se ele nao encontrar o id ele redirecionar para pagina anterior
            return redirect()->back();

            $title = "Editar Marca: {$brand->name}";

            return view ('panel.brands.edit', compact('title', 'brand'));


        dd($brand);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = $this->brand->find($id);

        if(!$brand) // se ele nao encontrar o id ele redirecionar para pagina anterior
            return redirect()->back();

        $update = $brand->update($request->all());

        if($update)

        return redirect()
                        ->route('brands.index')
                        ->with('sucess', 'Atualizado com sucesso');
        else
        return redirect()
                        ->back()
                        ->with('error', 'fallha ao atualizar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
