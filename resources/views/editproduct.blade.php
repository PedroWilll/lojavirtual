
@extends('layouts.app')
@section('content')
@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
        <img src="/storage/{{ $prod->image }}" class="img-thumbnail" alt="{{ $prod->name }}">
        </div>
        <div class="col-md-8">
             
            <div class="card">
                <div class="card-header">Editar Produto<!--{{ __('ProductController') }}--></div>
                <div>
                    <form method="POST" action="/product/{{ $prod->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $prod->name }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Preço</label>

                            <div class="col-md-6">
                                <input type="text" name="price" class="form-control" value="{{ $prod->price }}" onkeypress="$(this).mask('R$ 999.990,00')">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $prod->description }}" required autocomplete="name" autofocus>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="image">Imagem</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image" id="image" placeholder="Imagem">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6" style="text-align:center;">
                                <button type="submit" class="btn btn-primary">Alterar</button>
                            </div>  
                        </div>
                        
                        
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
    @endif

    
    
   
</div>

@endsection