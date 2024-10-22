@extends('layout.app')

@section('content')
<div class="container col-6">
    <div class="card mt-5">
        <h2 class="p-3 text-center"> Products <a class="float-end btn btn-info" href="{{route("product.create")}}">Add Product</a></h2>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th colspan="3"></th>
                </tr>
                @foreach ($products as $item)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{ $item->name}}</th>
                        <th><a class="text-decoration-none" href="{{route('product.show', $item->id)}}"><button class="btn btn-primary">Show</button></a></th>
                        <th><a class="text-decoration-none" href="{{route('product.edit', $item->id)}}"><button class="btn btn-warning">Edit</button></a></th>
                        <th><a class="text-decoration-none" href="{{route('product.destroy', $item->id)}}"><button class="btn btn-danger">Delete</button></a></th>

                    </tr>
                @endforeach
            </table>
            {{$products->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
@endsection