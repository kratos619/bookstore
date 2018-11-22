@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Product</div>
           
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('products.update' , ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{method_field('PUT')}}
                        <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" value="{{$product->name}}"  class="form-control" placeholder="Title..." >
                        </div>
                        <div class="form-group">
                        <label for="">Price </label>
                        <input type="text" name="price"  class="form-control"  value="{{$product->price}}" placeholder="Price..." >
                    <small>Old Price : {{$product->price}}</small>    
                    </div>
                        <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image"  value="{{$product->image}}"  class="form-control" placeholder="Image....." >
                        </div>
                        <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description"  class="form-control" >  {{$product->description}} </textarea>
                        </div>
                        <div class="form-group">
                          
                          <input type="submit" value="Add Product" name="submit" class="btn btn-success btn-block">
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
