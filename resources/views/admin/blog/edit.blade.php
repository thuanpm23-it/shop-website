@extends('layouts.admin')
@section('title', $viewData['title'])
@section('body')
<div class="container mt-4" >
<div class="card mb-4">
    <div class="card-header">
    
    <h3 class="card-title">Edit Blog</h3>
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
    action="{{ route('admin.blog.update',
    ['id' => $viewData['blog']->getId()]) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--add element form: name, price, image, description-->
    <div class="row">
        <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Title:</label>
                 <div class="col-lg-10 col-md-6 col-sm-12">
                 <input name="title" value="{{ $viewData['blog']->getTitle() }}" type="text" class="form-control">
               </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3 row">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">ShortDesc:</label>
                 <div class="col-lg-10 col-md-6 col-sm-12">
                 <input name="shortDesc" value="{{ $viewData['blog']->getShortDesc() }}" type="text" class="form-control">         
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
        <label class="form-label">LongDesc</label>
        <textarea class="form-control" name="longDesc" rows="3">{{ $viewData['blog']->getLongDesc() }}
        </textarea>
        </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
    </div>
</div>
@endsection