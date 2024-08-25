
@extends('frontEnd.layout.master')

@section('title')
{{ $webcats }}
@stop

@section('content')
 <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">{{ $webcats }}</span>
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
         {{ $webpros->links() }}
        </div>
      </div>
    </section>
@endsection