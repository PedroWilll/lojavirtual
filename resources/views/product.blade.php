
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
                                <input type="file" class="form-control" name="image" id="prodimg" placeholder="Imagem">
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
                        <a type="button" class="btn btn-primary" href="#">Visualizar</a>
                          @if (Auth::check())
                          <a type="button" class="btn btn-secondary" href="/product/edit/{{ $product->id}}">Editar</a>
                          
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete" data-catid="{{ $product->id }}">Apagar</button>
                         
                         
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


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja realmente apagar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Essa operação não poderá ser desfeita!!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" id="campo" action="">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger" >Apagar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
function setaDadosModal(valor) {
    var teste = document.getElementById('campo').action;
    
    teste = valor.toString();
}
</script>