@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')
<div class="container mt-4" >
<div class="card mb-4">
    <div class="card-header">
    <h3 class="card-title">Edit Product</h3>
    
    </div>
    <div class="card-body">
    @if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
    @foreach ($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
    </ul>
    @endif
    <!-- add form -->
    <form method="POST"
    action="{{ route('admin.update',
    ['id' => $viewData['product']->getId()]) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--add element form: name, price, image, description-->
    <div class="row">
        <div class="col">
        <div class="mb-3 row">
        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
        <div class="col-lg-10 col-md-6 col-sm-12">
        <input name="name" value="{{ $viewData['product']->getName() }}" type="text"
        class="form-control">
        </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="mb-3 row">
        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
        <div class="col-lg-10 col-md-6 col-sm-12">
        <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number"
        class="form-control">
        </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Category:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
            {{-- <input name="category" value="{{ $viewData['product']->getCategory() }}" type="text"
            class="form-control"> --}}

            <select name="category"class="form-control">
                <option value="{{ $viewData['product']->getCategory() }}">{{ $viewData['product']->getCategory() }}</option>
                <option value="woment">Woment</option>
                <option value="men">Men</option>
                <option value="bag">Bag</option>
                <option value="shoes">Shoes</option>
                <option value="watches">Watches</option>
                
                </select>
            </div>
            </div>
            </div>
        </div> 
        <div class="row">
            <div class="col">
            <div class="mb-3 row">
            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Image:</label>
            <div class="col-lg-8 col-md-6 col-sm-12">
            <input class="form-control" type="file" name="image">
            </div>
            </div>
            </div>
            <div class="col">
            &nbsp;
            </div>
            </div>
            <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ $viewData['product']->getDescription() }}</textarea>
            </div> 
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
    </div>
</div>
@endsection