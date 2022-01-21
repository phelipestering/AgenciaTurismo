<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $plane;
    private $totalPage = 20;

    public function __construct(Plane $plane)
    {
        $this->plane = $plane;
    }


    public function index()
    {
        $title = 'Listagem de Avioes';

        $planes = $this->plane->with('brandRelation')->paginate($this->totalPage);

        return view ('panel.planes.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Aviao';

        $brands = Brand::pluck('name', 'id'); // metodo que retorna o nome do campo da model brand

        // https://laravel.com/docs/8.x/collections#method-pluck

        $classes = $this->plane->classes();

        return view ('panel.planes.create', compact('title', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dataForm = $request->all();

        $this->plane->create($dataForm);

        $insert = $this->plane->create($dataForm);

        if($insert)

        return redirect()
                        ->route('planes.index')
                        ->with('sucess', 'cadastro realizado com sucesso');
        else

        return redirect()
                        ->back()
                        ->with('error', 'fallha ao cadastrar')
                        ->withInput();

        dd($request->all());
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
        $plane = $this->plane->find($id);

        if(!$plane)
            return redirect()->back();

        $brands = Brand::pluck('name', 'id'); // metodo que retorna o nome do campo da model brand

        // https://laravel.com/docs/8.x/collections#method-pluck

        $classes = $this->plane->classes();

        $title = "Editando o Aviao: {$plane->id}";

        return view('panel.planes.editPlaneView', compact('plane', 'title', 'brands', 'classes' ));
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
        $plane = $this->plane->find($id);

        if(!$plane)
            return redirect()->back();

        if($plane->update($request->all()))
            return redirect()
                            ->route('planes.index')
                            ->with('sucess', 'Editado com Sucesso');
            else

            return redirect()
                            ->back()
                            ->with('error', 'Erro ao Editar')
                            ->withInput();

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
