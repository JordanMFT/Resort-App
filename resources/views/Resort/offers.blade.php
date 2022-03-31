@extends('layouts.app')
 
@section('content')

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

      <br>
      <div class="float-end">
        {{-- For pagination links to show up --}}
            {{ $resorts->links() }}
      </div>
      
      
    </div>
        

       
    
     
  </div>
    
@endsection

