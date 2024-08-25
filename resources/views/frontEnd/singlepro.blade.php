
@extends('frontEnd.layout.master')

@section('title')
{{ $webpros->name }}
@stop

@section('content')
 <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center ftco-animate">
           <!-- <span class="subheading">{{ $webpros->name }}</span>-->
            <h2>{{ $webpros->name }}</h2>
          </div>
        </div>
        <div class="row d-flex">
         
        <div class="col-md-5">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('/') }}{{ $webpros->image }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/') }}{{ $webpros->image1 }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/') }}{{ $webpros->image2 }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style=" color:black;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style=" color:black;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
        <!--description face-->
        <div class="col-md-7">
          <div class="card">
            <div class="card-body">
              <h6 class="card-text"><b>Price:</b> {{ $webpros->price }}</h6>
              <h6 class="card-text"><b>Brand:</b> {{ $webpros->brand }}</h6>
              <h6 class="card-text"><b>Condition:</b> {{ $webpros->condition }}</h6>
                  <h6 class="card-text"><b>Availaable:</b>
                  @if($webpros->status == 1) 
                   <b class="text-success">Yes</b>
                   @else
                   <b class="text-info">No</b>
                   @endif
                  </h6>
                  <p class="card-text">{!! $webpros->description !!}</p>
            </div>
      </div>
          
        </div>
        <!--description face-->
         
         
        </div>
      </div>
    </section>
@endsection