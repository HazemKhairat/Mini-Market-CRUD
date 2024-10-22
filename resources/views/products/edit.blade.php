@extends('layout.app')


@section('content')
<div class="container col-md-6">
    <div class="card mt-5">
        <h6 class="p-3">Update Product<a class="float-end btn btn-info" href="{{route("product.index")}}">Back</a>
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
            <form enctype="multipart/form-data" method="POST" action="{{route("product.update", $product->id)}}">
                <!-- Laravel token  -->
                @csrf
                <!-- forms  -->
                <div class="form-groub">
                    <label for="">Product name</label>
                    <input name="name" value="{{$product->name}}" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Product description</label>
                    <input name="description" value="{{$product->description}}" type="text" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Product price</label>
                    <input name="price" value="{{$product->price}}" type="number" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Product image <img width="40" src="{{asset("upload/$product->image")}}" alt=""></label>
                    <input name="image" type="file" class="form-control">
                </div>
                <div class="form-groub">
                    <label for="">Category name</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach ($category as $item)
                        @if ($item->title == $product->category->title)
                            <option selected value="{{$item->id}}">{{$item->title}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endif  
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-info" type="submit">Update Data</button>
            </form>
        </div>
    </div>
</div>
@endsection