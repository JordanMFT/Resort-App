@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$resort->name}}</div>

                <div class="card-body">

                    <img src="{{asset('images')}}/{{$resort->image}}" class="img-fluid" alt="...">

            <br>
            <br>
                   <span>
                       <h2>Description</h2>
                       <p>{{$resort->description}}</p>
                   </span>
                    
                </div>
            </div>
            
        </div>

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">Info</div>

                <div class="card-body">
                    <span><h4>Price:</h4><p>$ {{$resort->price}}</p></span>
                    <span><h4>city:</h4><p>{{$resort->city}}</p></span>
                    <span><h4>Published: </h4><p>{{$resort->created_at->diffForHumans()}}</p></span>
                </div>                 
            </div>
           <br>

                    {{-- Booking form Conditon: display only when user is logged in --}}
                            @if (Auth::check()&&Auth::user())

                            <div class="card">
                                <div class="card-header">Booking Form</div>

                                <div class="card-body">
                                      <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>
                                            <input type="text" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="check">Check In</label>
                                            <input type="date" class="form-control" id="subject">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="check">Check Out</label>
                                            <input type="date" class="form-control" id="subject">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="offer">Offer List</label>
                                            <select id="lunchBegins" class="selectpicker" name="offer" data-live-search="true" data-live-search-style="begins" title="Select your city">
                                                <option value="">Select resort</option>
                                                @foreach (App\Models\Resort::all() as $resort)
                                                    <option value="{{$resort->id}}">
                                                        {{$resort->name}}
                                                    </option>
                                                @endforeach   
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Book Now</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                                </div>                 
                            </div>

                        {{-- End Form --}}
                                           
                    @else
                          <p style="background:red; padding:3%; width:50%; color:white;">Login to Book Space</p>                
                @endif
        </div>
    </div>
</div>
@endsection