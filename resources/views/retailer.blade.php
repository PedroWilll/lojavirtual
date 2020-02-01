@extends('layouts.app')
@section('content')
@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="/storage/images/sistemaimagem.png" class="img-thumbnail" alt="" id="preview"> 
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fornecedor</div>
                <div>
                    <form method="POST" action="/retailer" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">WebSite</label>

                            <div class="col-md-6">
                                <input type="text" name="website" class="form-control" value="{{ old('website') }}" >

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="logo">Logo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="logo" id="image" placeholder="logo">
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
          @foreach($retailers as $retailer) 
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top figure-img img-fluid rounded" src="storage/{{ $retailer->logo }}">
                    <div class="card-body">
                      <p class="card-text">{{ $retailer->name }}</p>
                      <p class="card-text">{{ $retailer->description}}</p>
                      <a href="http://{{ $retailer->website }}"><p class="card-text">{{ $retailer->website }}</p></a>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a type="button" class="btn btn-primary" href="#">Visualizar</a>
                          @if (Auth::check())
                          <a type="button" class="btn btn-secondary" href="/retailer/edit/{{ $retailer->id }}">Editar</a>
                          <a type='button' type="submit" class="btn btn-danger">Apagar</a>
                          
                          @endif
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