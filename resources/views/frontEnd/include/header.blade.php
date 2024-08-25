 <div class="wrap">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-5 ">
            <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('public/frontEnd/images/new.png') }}" style="">
    <span>Grip n Grease</span></a>
          </div>
        <div class="col-md-7">
            <div class="row">
              <div class="col">
                <div class="top-wrap d-flex" style="margin-top:10px;">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-location-arrow"></span></div>
                  <div class="text"><span><b>Email us</b></span><span style="color:gray;">info@gripngrease.com</span></div>
                </div>
              </div>
              <div class="col">
                <div class="top-wrap d-flex" style="margin-top:10px;">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-location-arrow"></span></div>
                  <div class="text"><span><b>Call us</b></span><span style="color:gray;">01670010703, 01613322871</span></div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-end align-items-center">
                <div class="social-media">
                  <p class="mb-0 d-flex">
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="position:relative;top:0px">
      <div class="container">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>
        <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
        </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ route('frontEnd.showroom') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ route('frontEnd.whereToBuy') }}" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="{{ route('frontEnd.contactUs') }}" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>