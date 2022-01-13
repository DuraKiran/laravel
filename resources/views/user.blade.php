@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-light mt-3 mx-auto rounded shadow-lg pt-2 px-3">
        <div class="d-flex justify-content-between align-items-baseline">
            <h3 class="ps-0 text-dark">Users</h3>
            <a href="{{route('users.create')}}" class="btn-success btn text-decoration-none ">Add New</a>
            </div>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td data-label="id">{{$user->id}}</td>
                    <td data-label="name">{{$user->name}}</td>
                    <td data-label="email">{{$user->email}}</td>
                    <td data-label="">
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-success btn-sm text-decoration-none">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm p-1" form="form-{{$user->id}}">Delete</button>
                        <form id="form-{{$user->id}}" class="d-none" action="{{route('users.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection