<div id="home-slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#home-slider" data-slide-to="0" class="active"></li>
      <li data-target="#home-slider" data-slide-to="1"></li>
      <li data-target="#home-slider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="">
          <img class="d-block" src="{{ asset('img/demo/banner-2000-600-1.jpg') }}" alt="First slide">
        </a>
        </div>
      <div class="carousel-item">
        <a href="">
          <img class="d-block" src="{{ asset('img/demo/banner-2000-600-2.jpg') }}" alt="Second slide">
        </a>
        </div>
      <div class="carousel-item">
        <a href="">
          <img class="d-block" src="{{ asset('img/demo/banner-2000-600-3.jpg') }}" alt="Third slide">
        </a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#home-slider" role="button" data-slide="prev">
      <i class="fas fa-chevron-left" aria-hidden="true"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#home-slider" role="button" data-slide="next">
      <i class="fas fa-chevron-right" aria-hidden="true"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>