<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadimage(Request $request)
    {
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
            return string('public/images/{$name}.{$extension}');
            
 
    }
}
}
