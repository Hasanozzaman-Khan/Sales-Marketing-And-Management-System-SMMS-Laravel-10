@extends('backend.layout.app')

@section('title', 'Manage Employee')


@section('content')

@include('message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="me-auto">Manage Employee</h3>
                <a class="ms-auto btn btn-outline-primary" href="{{route('employee.pending')}}">Pending Employee</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th class="text-center">Action</th>
                                <!-- <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $emp)
                                <tr>
                                    <td>Image</td>
                                    <td>{{$emp->name}}</td>
                                    <td>{{$emp->comp_id}}</td>
                                    <td>{{$emp->phone}}</td>
                                    <td class="text-center">Action
                                        <a href="#" class="btn btn-outline-primary">View</a>
                                    </td>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
