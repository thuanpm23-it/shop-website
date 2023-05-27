@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')

    
<div class="container mt-4">
    <div class="card border-primary bt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">Item List</h3>
                </div>
               
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered border-primary table-hover table-striped">
                    <thead>
                        <tr class="table-primary border-primary">
                            <th >Item ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['items'] as $item)
                        <tr>
                            <td>{{ $item->getId() }}</td>
                            <td>{{ $item->getQuantity() }}</td>
                            <td>{{ $item->getPrice() }}</td>
                            <td>{{ $item->getOrderId() }}</td>
                            <td>{{ $item->getProductId() }}</td>
                            <td>{{ $item->getProduct()->getName() }}</td>

                            
                        </tr>
                        @endforeach

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection