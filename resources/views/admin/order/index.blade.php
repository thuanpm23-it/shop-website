@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')

    
<div class="container mt-4">
    <div class="card border-primary bt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">Order List</h3>
                </div>
               
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered border-primary table-hover table-striped">
                    <thead>
                        <tr class="table-primary border-primary">
                            <th >Order ID</th>
                            <th>Total</th>
                            <th>User ID</th>
                            <th>User Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['order'] as $order)
                        <tr>
                            <td>{{ $order->getId() }}</td>
                            <td>{{ $order->getTotal() }}</td>
                            <td>{{ $order->getUserId() }}</td>
                            <td>{{ $order->getUser()->getName() }}</td>
                            
                        </tr>
                        @endforeach

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection