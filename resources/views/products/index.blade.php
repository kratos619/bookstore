@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
      <td><a href="#" class="btn btn-sm btn-warning">Edit</a></td>
        <td></td>
        <td>
            <form action="POST">
                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
            </form>
        </td>
    </tr>      
        @endforeach
      
    
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
