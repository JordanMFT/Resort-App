 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Alert message --}}
            @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}    
                    </div>                    
                @endif

                {{-- When you create a upload field you need to use this code:enctype="multipart/form-data --}}

            <form action="{{route('admin.update',[$resort->id])}}" method="POST" enctype="multipart/form-data">@csrf
                 {{method_field('PUT')}}
            <div class="card"> 
                <div class="card-header">Update resort</div>
                <div class="card-body">
                    <div class="form-group">

                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                        value="{{$resort->name}}">

                         @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">
                            {{$resort->description}}
                        </textarea>

                         @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{$resort->price}}">

                         @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    &nbsp;
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                        value="{{$resort->price}}">

                         @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                         @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    &nbsp;

                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit">
                            Update
                        </button>
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection