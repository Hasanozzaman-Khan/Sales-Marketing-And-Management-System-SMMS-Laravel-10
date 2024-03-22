@extends('backend.layout.app')

@section('title', 'Manage Pending Employee')

@section('employee-expend', 'true')
@section('employee-expend-show', 'show')
@section('create-employee-active', 'active')

@section('content')

@include('message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="">Manage Pending Employee</h4>
                <a class="btn btn-outline-primary" href="{{route('employee.index')}}">Back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                                <!-- <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingEmployees as $pendingEmp)
                                <tr>
                                    <td>{{$pendingEmp->email}}</td>
                                    <td>{{$pendingEmp->name}}</td>
                                    <td class="text-center">
                                        <a href="{{route('employee.approve',[$pendingEmp->id])}}" class="btn btn-outline-primary">Approve Employee</a>
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
