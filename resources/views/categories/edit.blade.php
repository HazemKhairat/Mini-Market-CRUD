@extends('layout.app')


@section('content')
<div class="container col-md-6">
    <div class="card mt-5">
        <h6 class="p-3">Update Category<a class="float-end btn btn-info" href="{{route("category.index")}}">Back</a>
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
            <form enctype="multipart/form-data" method="POST" action="{{route("category.update", $category->id)}}">
                <!-- Laravel token  -->
                @csrf
                <!-- forms  -->
                <div class="form-groub">
                    <label for="">Title</label>
                    <input name="title" value="{{$category->title}}" type="text" class="form-control">
                </div>
                <div class="form-groub mt-3">
                    <label for="">Description</label>
                    <input name="description" value="{{$category->description}}" type="text" class="form-control">
                </div>
                
                <button class="btn btn-info mt-3" type="submit">Update Data</button>
            </form>
        </div>
    </div>
</div>
@endsection