@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')

    
<div class="container mt-4">
    <div class="card border-primary bt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">Contact List</h3>
                </div>
               
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered border-primary table-hover table-striped">
                    <thead>
                        <tr class="table-primary border-primary">
                            <th>Contact ID</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th style="width: 80px;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['contacts'] as $contact)
                        <tr>
                            <td>{{ $contact->getId() }}</td>
                            <td>{{ $contact->getEmail() }}</td>
                            <td>{{ $contact->getMessage() }}</td>
                            <td>
                                <form action="{{ route('admin.contact.delete', $contact->getId()) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                    </button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection