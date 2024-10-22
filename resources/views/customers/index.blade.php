@extends('layout.app')

@section('content')
<div class="container col-6">
    <div class="card mt-5">
        <h2 class="p-3 text-center"> Customers <a class="float-end btn btn-info"
                href="{{route("customer.create")}}">Add Customer</a></h2>
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
                @foreach ($customers as $customer)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{ $customer->first_name}}</th>
                        <th class="ml-10"><a class="text-decoration-none" href="{{route('customer.show', $customer->id)}}"><button class="btn btn-primary">Show</button></a></th>
                        <th><a class="text-decoration-none" href="{{route('customer.edit', $customer->id)}}"><button class="btn btn-warning">Edit</button></a></th>
                        <th><a class="text-decoration-none" href="{{route('customer.destroy', $customer->id)}}"><button class="btn btn-danger">Delete</button></a></th>

                    </tr>
                @endforeach
            </table>
            {{$customers->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
@endsection