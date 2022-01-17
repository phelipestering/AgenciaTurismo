<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

//importando o form request

use App\Http\Requests\BrandStoreUpdateFormRequest;

use function GuzzleHttp\Promise\all;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $brands;

    // setando quantos items vou exibir por pagina

    protected $totalpage = 2; // quantos resultados a serem exibidos por pagina na paginacao

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $title = 'Marcas de Avioes';

        $brands = $this->brand ->paginate($this->totalpage); // metodo paginate usando a variavel totalpage para exibicao dos itens por pagina

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

        return view('panel.brands.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreUpdateFormRequest $request)
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
        $brand = $this->brand->find($id);

        if(!$brand) // se ele nao encontrar o id ele redirecionar para pagina anterior
            return redirect()->back();

            $title = "Detalhes da Marca: {$brand->name}";

            return view ('panel.brands.show', compact('title', 'brand'));


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

            return view ('panel.brands.create-edit', compact('title', 'brand'));

        dd($brand);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreUpdateFormRequest $request, $id)
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
        $brand = $this->brand->find($id);

        if(!$brand) // se ele nao encontrar o id ele redirecionar para pagina anterior
            return redirect()->back();

        if($brand->delete())
                            return redirect()
                                            ->route('brands.index')
                                            ->with('sucess', 'Deletado com sucesso');
                            else

                            return redirect()
                                            ->back()
                                            ->with('error', 'Falha ao Deletar');

    }

    public function search(Request $request)
    {

        $dataform = $request ->except('_token'); // pegando todos os dados exceto o token

        $brands = $this->brand->search($request->key_search, $this->totalpage);

        $title = "Brands, filtros para: {$request->key_search}";

        return view('panel.brands.index', compact('title', 'brands','dataform'));

    }
}
