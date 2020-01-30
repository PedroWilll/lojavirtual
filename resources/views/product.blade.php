<?php if(session()->has('msg')) ?>
<div class="alert alert-sucess" role="alert">
<?php session('msg') ?>
</div>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ProductController') }}</div>
                <div>
                    <form method="POST" action="/productupdate" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="image">Imagem</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" placeholder="Imagem">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>  
                        </div>
                        
                        
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>

@endsection