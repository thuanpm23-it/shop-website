@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')
<div class="container mt-4">
<div class="card mb-4">
    <div class="card-header ">
        <div class="col">
            <h3 class="card-title"> Create Product</h3>
        </div>
           
    </div>
    <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
    @foreach($errors->all() as $error)
    <li>- {{ $error }}</li>
    @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('admin.add') }}" enctype="multipart/form-data">
    @csrf <!– bảo vệ sự tấn công CSRF-->
    <!-- add form controls to create product -->
    <div class="row">
        <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                 <div class="col-lg-10 col-md-6 col-sm-12">
                 <input name="name" value="{{ old('name') }}" type="text" class="form-control">
               </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Category:</label>
                 <div class="col-lg-10 col-md-6 col-sm-12">
                 {{-- <input name="category" value="{{ old('category') }}" type="text" class="form-control">     --}}
                 
                 <select name="category" value="{{ old('category') }}" class="form-control">
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
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
               <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="price" value="{{ old('price') }}" type="number" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="mb-3 row">
        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Image :</label>
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
        <textarea class="form-control" name="description" rows="3">{{ old('description') }}
        </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
    </div>
</div>
    
@endsection