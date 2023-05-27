@extends('layouts.app')
@section('title', $viewData['title'])
@section('body')

<div class="container">
    <div class="card my-5">
        <div class="card-header">
            Purchase Completed
        </div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Congratulations, purchase completed. Order number is
                <b>#{{ $viewData['order']->getId() }}</b>
            </div>
        </div>
    </div>
</div>

@endsection