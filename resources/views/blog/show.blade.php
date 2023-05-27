@extends('layouts.app')
@section('title', $viewData['title'])
@section('body')

<section class="bg0 p-t-52 p-b-20">
    <div class="container">
      <div class="row">
        <div class="col-md-12 p-b-80">
          <div class="p-r-45 p-r-0-lg">
            <div class="wrap-pic-w how-pos5-parent">
              <img src="{{ asset('/storage/' . $viewData['blog']->getImage()) }}" alt="IMG-BLOG" />
            </div>

            <div class="p-t-32">

              <h4 class="ltext-109 cl2 p-b-28">
                {{ $viewData['blog']->getTitle() }} 
              </h4>

              <p class="stext-117 cl6 p-b-26">
                {{ $viewData['blog']->getLongDesc() }} 
              </p>

              <p class="stext-117 cl6 p-b-26">
                {{ $viewData['blog']->getLongDesc() }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection