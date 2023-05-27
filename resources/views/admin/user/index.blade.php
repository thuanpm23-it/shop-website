@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')

    
<div class="container mt-4">
    <div class="card border-primary bt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">User List</h3>
                </div>
                {{-- <div class="col-auto">
                    <a href="{{route('admin.new')}}"><button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi-plus-lg"></i> Add</button></a>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered border-primary table-hover table-striped">
                    <thead>
                        <tr class="table-primary border-primary">
                            <th >User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['users'] as $user)
                        <tr>
                            <td>{{ $user->getId() }}</td>
                            <td>{{ $user->getName() }}</td>
                            <td>{{ $user->getEmail() }}</td>
                            <td>{{ $user->getRole() }}</td>
                            
                        </tr>
                        @endforeach

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection