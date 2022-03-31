@extends('layouts.app')
 
@section('content')


    <section id="sec-2" class="container">
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
                Some great placeholder content for the first featurette here. Imagine some exciting prose here.
            </p>
        </div>
        <div class="col-md-5">
            <img src="{{asset('images/happy.jpg')}}" 
            class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt=""  width="500" height="500">
        </div>
        </div>

        <a href="{{ url('/offers') }}" class="btn btn-info" style="color: white;">View Offers</a>

    </section>
    
@endsection

