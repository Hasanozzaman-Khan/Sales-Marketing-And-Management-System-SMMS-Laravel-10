@extends('backend.layout.app')

@section('title', 'Manage Size')

@section('size-expend', 'true')
@section('size-expend-show', 'show')
@section('manage-size-active', 'active')

@section('content')

@include('message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Manage Size</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                                <!-- <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sizes as $size)
                                <tr>
                                    <td>{{$size->name}}</td>
                                    <td  class="text-center">
                                        <a href="{{route('size.edit',[$size->id])}}"><button class="btn btn-outline-primary"><i class="mdi mdi-table-edit"></i>Edit</button></a>
                                    <!-- </td>
                                    <td> -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$size->id}}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$size->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form class="" action="{{route('size.destroy',[$size->id])}}" method="post">@csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you Sure to delete size {{$size->name}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-outline-danger">Yes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <td>No Size</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
