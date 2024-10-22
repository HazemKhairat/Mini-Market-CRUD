@extends('layout.app')

@section('content')
<div class="container col-4">
    <div class="card mt-5">
        <h6 class="p-3">- Show Products-- <a class="float-end btn btn-info" href="{{route("product.create")}}">Create New</a></h6>
        <img class="img-fluid"  src="{{asset("upload/$product->image")}}" alt="">
        <div class="card-body">
            <hr>
            <h6> Name: {{ $product->name}}</h6>
            <hr>
            <h6> description: {{ $product->description}}</h6>
            <hr>
            <h6> price: {{ $product->price}}</h6>
            <hr>
            <h6> category: {{ $product->category->title}}</h6>
        </div>
    </div>
</div>
@endsection