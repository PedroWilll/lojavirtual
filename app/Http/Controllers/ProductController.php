<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use ImageController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = (float)$request->price;
        $product->retailer = $request->retailer;
        $path =$request->file('image')->store('images', 'public');
        $product->image = $path;
        $product->description = $request->description;

        if($product->save())
        {
            echo ('salvou');
        }else
        {
            return back();
        }
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
        //
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
    public function uploadimage($request)
    {

        echo ($request);
    // Define o valor default para a variável que contém o nome da imagem 
    $nameFile = null;
 
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
         
        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));
 
        // Recupera a extensão do arquivo
        $extension = $request->image->extension();
 
        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
 
        // Faz o upload:
        $upload = $request->image->storeAs('images', $nameFile);
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
        
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload ){
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
        }
        else    
            return $upload;
            
 
    }
}
    
    
}
