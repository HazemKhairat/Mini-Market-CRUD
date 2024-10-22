@extends('layout.app')

@section('content')
<div class="container col-3">
    <div class="card mt-5">
        <h6 class="p-3">- Show Customers <a class="float-end btn btn-info" href="{{route("customer.index")}}">Back</a></h6>
        <img class="img-fluid"  src="{{asset(path: "upload/$customer->image")}}" alt="">
        <div class="card-body">
            <hr>
            <h6> First name: {{ $customer->first_name}}</h6>
            <hr>
            <h6> Last name: {{ $customer->last_name}}</h6>
            <hr>
            <h6> email: {{ $customer->email}}</h6>
            <hr>
            <h6> phone: {{ $customer->phone}}</h6>
        </div>
    </div>
</div>
@endsection