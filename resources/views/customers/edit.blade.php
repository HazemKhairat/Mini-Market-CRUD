@extends('layout.app')


@section('content')
<div class="container col-md-6">
    <div class="card mt-5">
        <h6 class="p-3">Update Customer<a class="float-end btn btn-info" href="{{route("customer.index")}}">Back</a>
        </h6>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
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
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{route("customer.update", $customer->id)}}">
                <!-- Laravel token  -->
                @csrf
                <!-- forms  -->
                <div class="form-groub">
                    <label for="">first name</label>
                    <input name="first name" value="{{$customer->first_name}}" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">last name</label>
                    <input name="last name" value="{{$customer->last_name}}" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Email</label>
                    <input name="email" value="{{$customer->email}}" type="email" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Phone</label>
                    <input name="phone" value="{{$customer->phone}}" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">customer image <img width="40" src="{{asset("upload/$customer->image")}}" alt=""></label>
                    <input name="image" type="file" class="form-control">
                </div>
                
                <button class="btn btn-info mt-3" type="submit">Update Data</button>
            </form>
        </div>
    </div>
</div>
@endsection