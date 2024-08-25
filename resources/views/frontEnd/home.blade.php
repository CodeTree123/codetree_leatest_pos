@extends('frontEnd.layout.master')

@section('title')
Gripngrease
@stop

@section('content')
 @include('frontEnd.include.banner')

 <!--category-->
<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center ">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Top Selling Categories</span>
            <h2>Shop here</h2>
          </div>
        </div>
        <div class="row">
          @foreach($webcats as $web)
          <div class="col-md-4 services ftco-animate">
            <div class="d-block d-flex">
              <div class="icon d-flex justify-content-center align-items-center">
                <img src="{{ asset('/') }}{{ $web->image }}" style="height: 50px;
    width: 50px;">
              </div>
              <div class="media-body pl-3">
                <h3 class="heading">{{ $web->cname }}</h3>
                <p>{!! $web->description !!}</p>
                <p><a href="{{ route('shop.cat',['id'=>$web->id]) }}" class="btn-custom">Click Here</a></p>
              </div>
            </div>
        </div>
          
@endforeach
        
        </div>
      </div>
    </section>
   <!--category--> 
    

    

   

    
    <!--item-->
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Latest Product</span>
            <h2>Explore Our Product</h2>
          </div>
        </div>
        <div class="row d-flex">
          @foreach($webpros as $webp)
          <div class="col-md-4 d-flex ftco-animate">
            <div class="card mb-3" style="">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{ asset('/') }}{{ $webp->image }}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $webp->name }}</h5>
        <h6 class="card-text"><b>Brand:</b> {{ $webp->brand }}</h6>
       <h6 class="card-text"><b>Condition:</b> {{ $webp->condition }}</h6>
      </div>
    </div>
  </div>
  <div class="card-footer"><center><a href="{{ route('shop.pro',['id'=>$webp->id]) }}" class="btn btn-primary">Click Here</a></center></div>
</div>
          </div>
         @endforeach
        </div>
      </div>
    </section>

  <!--item--> 

    
@stop