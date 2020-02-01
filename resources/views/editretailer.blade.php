@extends('layouts.app')
@section('content')
@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="/storage/{{ $reta->logo }}" class="img-thumbnail" alt="" id="preview"> 
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Fornecedor</div>
                <div>
                    <form method="POST" action="/retailer/{{ $reta->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $reta->name }}" required autocomplete="name" autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $reta->description }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">WebSite</label>

                            <div class="col-md-6">
                                <input type="text" name="website" class="form-control" value="{{ $reta->website }}" >

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