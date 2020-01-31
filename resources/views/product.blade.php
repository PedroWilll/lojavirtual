
@extends('layouts.app')
@section('content')
@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produto<!--{{ __('ProductController') }}--></div>
                <div>
                    <form method="POST" action="/product" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Preço</label>

                            <div class="col-md-6">
                                <input type="text" name="price" class="form-control" value="{{ old('price') }}" onkeypress="$(this).mask('R$ 999.990,00')">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="name" autofocus>

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
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>  
                        </div>
                        
                        
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
    @endif

    
    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
          @foreach($products as $product) 
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top figure-img img-fluid rounded" src="storage/{{ $product->image }}">
                    <div class="card-body">
                      <p class="card-text">{{ $product->name }}</p>
                      <p class="card-text">R$ {{ $product->price }}</p>
                      <p class="card-text">{{ $product->description}}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                          <a type="button" class="btn btn-sm btn-outline-secondary" href="#">Download</a>
                          <form>
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
             @endforeach 
          </div>
        </div>
      </div>
   
</div>

@endsection