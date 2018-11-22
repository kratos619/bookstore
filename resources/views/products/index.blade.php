@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>
            <a href="{{route('products.create')}}" class="btn btn-primary m-3"> Add New Product</a>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
      <th scope="col">action</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach ($products as $item)
    <tr>
    <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->price}}</td>
    <td>
        <a href="{{ route('products.edit',['id' =>$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
    </td>
        <td></td>
        <td>
                <button class="btn btn-sm btn-danger"
        data-toggle="modal" data-target="#exampleModal{{$item->id}}"
                >Delete</button>
            
        </td>
    </tr> 
    
    
    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Are You Sure You want to delete </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3> {{$item->name}}</h3>  <br>
       {{$item->price}} <br>
       <p>{{$item->description}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('products.destroy',['id' => $item->id]) }}" method="POST" >
        {{ csrf_field() }}
            {{method_field('DELETE')}}
            <button class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
    


        @endforeach
      
    
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
