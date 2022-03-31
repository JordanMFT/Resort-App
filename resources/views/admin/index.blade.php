@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                {{-- Message alert --}}
                 @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}    
                    </div>                    
                @endif
                <div class="card-header">All resort
                     <span class="float-end">
                        <a href="{{route('admin.create')}}">
                            <button class="btn btn-secondary">Add Property</button>
                        </a>
                    </span>
                </div>
                   
                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">City</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($resorts)>0)
                            @foreach ($resorts as $key=>$resort)
                            <tr>
                                
                                <td><img src="{{asset('images')}}/{{$resort->image}}" alt="" width="80px"></td>
                                <td>{{$resort->name}}</td>
                                <td>{{$resort->description}}</td>
                                <td>${{$resort->price}}</td>
                                <td>{{$resort->city}}</td>
                
                                <td>
                                    <a href="{{route('admin.edit',[$resort->id])}}">
                                        <button class="btn btn-outline-success">
                                            Edit
                                        </button>
                                    </a>
                                </td>
            
                                <td>
                            

                                        <form method="POST" id="delete-form{{$resort->id}}" 
                                            action="{{route('admin.destroy',[$resort->id])}}">
                                            @csrf {{ method_field('DELETE') }} 
                                        </form>
                                            <a href="#" onclick="if(confirm('Do you want to delete?')){
                                                
                                                event.preventDefault();
                                                document.getElementById('delete-form{{$resort->id}}').submit()

                                            }else{
                                                event.preventDefault();
                                            }"> <input type="submit" value="Delete" class="btn btn-danger"></a>
                                    </div>
                                </div>

                                </td>
                            </tr>
                            @endforeach

                             @else
                                <td>No property to display</td>
                            @endif
                            
                        </tbody>
                    </table>
                    {{-- For pagination links to show up --}}
                              {{ $resorts->links() }}
                </div>
                
            </div>

        </div>
    </div>
</div>
@endsection