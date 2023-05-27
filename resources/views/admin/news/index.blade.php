@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')

    
<div class="container mt-4">
    <div class="card border-primary bt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">Newsletter List</h3>
                </div>
               
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered border-primary table-hover table-striped">
                    <thead>
                        <tr class="table-primary border-primary">
                            <th>Newsletter ID</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['news'] as $new)
                        <tr>
                            <td>{{ $new->getId() }}</td>
                            <td>{{ $new->getEmail() }}</td>

                            
                        </tr>
                        @endforeach

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection