@extends('layouts.app')

@section('content')

     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #hero-image{
        background-image: url("images/1648624063.jpg"),linear-gradient(rgba(0, 0, 0, 0.644),rgba(0, 0, 0, 0.637));
        background-blend-mode: overlay;
        height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        margin-top: -23px;
    }

    #hero-text{
            color: white;
        }

        #sec-2{
            padding: 5% 4%;
            background: black;
            color: white;
        }

        #sec-1{
            padding-bottom: 5%;
        }

    </style>


<main>

  
  <section id="hero-image" class="py-5 text-center container-fluid">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light" id="hero-text">WELCOME</h1>
        <p class="lead" id="hero-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry
            Lorem Ipsum is simply dummy text of the printing and typesetting industry
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
        </p>
      </div>
    </div>
  </section>

                                 
  <div class="album py-5 bg-light">
    <div class="container" id="sec-1">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($resorts as $resort)

        <div class="col">
          <div class="card shadow-sm">

            <img src="{{asset('images')}}/{{$resort->image}}" width="100%" height="225" alt="">

            <div class="card-body">
              <p class="card-text">{{$resort->name}}</p>
              <p class="card-text">City: {{$resort->city}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('resort.show',[$resort->id])}}">
                        <button class="btn btn-sm btn-outline-secondary">
                            View
                        </button>
                    </a>
                </div>
                <small class="text-muted">{{$resort->created_at->diffForHumans()}}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach
        
      </div>

    </div>

    <section id="sec-2" class="container-fluid">
        <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">About Us <span class="text-muted">It’ll blow your mind.</span></h2>
            <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
            </p>
        </div>
        <div class="col-md-5">
            <img src="{{asset('images/happy.jpg')}}" 
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt=""  width="500" height="500">
        </div>
        </div>

    </section>

       
    
     
  </div>
  
</main>


<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    
@endsection