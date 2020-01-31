@extends('layouts.app')
@section('content')
<div class="container">

<!-- Begin Carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="storage/images/banner.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="storage/images/banner.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="storage/images/banner.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<!-- End of Carousel -->
    <br>
    <h1 style="text-align:center;"> Produtos </h1>
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
      <h1 style="text-align:center;"> Fornecedores </h1>
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