@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')

    
<div class="container mt-4">
    <div class="card border-primary bt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">Product List</h3>
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
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th style="width: 80px;">Edit</th>
                            <th style="width: 80px;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getCategory() }}</td>
                            <td>
                              
                                <a class="btn btn-primary"
                                href="{{route('admin.edit', ['id'=> $product->getId()])}}">
                                <i class="bi-pencil"></i>
                                </a> 
                                
                            </td>
                            <td>
                                <form action="{{ route('admin.product.delete', $product->getId()) }}"
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