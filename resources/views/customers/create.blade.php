@extends('layout.app')


@section('content')
<div class="container col-md-6">
    <div class="card mt-5">
        <h6 class="p-3">Add New Customer<a class="float-end btn btn-info" href="{{route("customer.index")}}">Back</a>
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
            <form enctype="multipart/form-data" method="POST" action="{{route("customer.store")}}">
                <!-- Laravel token  -->
                @csrf
                <!-- forms  -->
                <div class="form-groub">
                    <label for="">First name</label>
                    <input name="first name" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Last name</label>
                    <input name="last name" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Customer image</label>
                    <input name="image" type="file" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Phone</label>
                    <input  type="text" name="phone" class="form-control"  id="">
                </div>
                <div class="form-groub">
                    <label for="">Product</label>
                    <select class="form-control" name="product_id" id="">
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-info mt-3" type="submit">Send Data</button>
            </form>
        </div>
    </div>
</div>
@endsection