@extends('frontEnd.layout.master')

@section('title')
Car Care Tips
@stop

@section('content')

	<div class="row" id="product_list" style="margin-top:0px;">
      <div class="col-sm-12 col-md-12 col-xs-12" class="header_top">
          <h2 style="letter-specing:1px;margin-bottom:15px;">Car Care Tips</h2>
      <img src="{{asset('/public/frontEnd')}}/image/car-care-tips-img.jpg" width="100%">
      </div>
      
      
       <div class="col-sm-12 col-md-12 col-xs-12" class="tips_container">
          <div class="col-sm-12 col-md-12 col-xs-12">
              <h3>A Fast and Easy Way to Wax</h3>
          </div>
          <div class="col-sm-12 col-md-12 col-xs-12">
             <p>This video explains how to use our three core wax products - paste, liquid, spray.</p>
          </div>
           <div class="col-sm-7 col-md-7 col-xs-12" class="video_frame">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Z4L51ir6hYg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
      </div>
      
        <div class="col-sm-12 col-md-12 col-xs-12" class="tips_container">
          <div class="col-sm-12 col-md-12 col-xs-12">
              <h3>How to make wheels shine</h3>
          </div>
           <div class="col-sm-7 col-md-7 col-xs-12" class="video_frame">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ZVblceeAZ2w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
      </div>
        <div class="col-sm-12 col-md-12 col-xs-12" class="tips_container">
          <div class="col-sm-12 col-md-12 col-xs-12">
              <h3>The Best Way to Wash Your Car</h3>
          </div>
          <div class="col-sm-12 col-md-12 col-xs-12">
             <p>TThis video explains how to use our car wash.</p>
          </div>
           <div class="col-sm-7 col-md-7 col-xs-12" class="video_frame">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/VAx9A_xzWQk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
      </div>
       
</div>
@stop
