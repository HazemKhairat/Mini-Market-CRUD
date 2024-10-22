@extends('layout.app')

@section('content')
<div class="container col-6">
    <div class="card mt-5">
        <h2 class="p-3 text-center"> Categories <a class="float-end btn btn-info"
                href="{{route("category.create")}}">New Category</a></h2>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <table class="table">
                
                <tr>
                    <th class="text-center" >No</th>
                    <th class="text-center" >Title</th>
                    <th class="text-center" >Description</th>
                    <th class="text-center"  colspan="2"></th>
                </tr>

                @foreach ($categories as $category)
                    <tr>
                        <th class="text-center" >{{$loop->iteration}}</th>
                        <th class="text-center" >{{ $category->title}}</th>
                        <th class="text-center" >{{ $category->description}}</th>
                        <th class="text-center" ><a class="text-decoration-none" href="{{route('category.edit', $category->id)}}"><button class="btn btn-warning">Edit</button></a></th>
                        <th class="text-center" ><a class="text-decoration-none" href="{{route('category.destroy', $category->id)}}"><button class="btn btn-danger">Delete</button></a></th>

                    </tr>
                @endforeach
            </table>
            {{$categories->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
@endsection