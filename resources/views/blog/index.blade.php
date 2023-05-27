@extends('layouts.app')
@section('title', $viewData['title'])
@section('body')

<section class="bg0 p-t-62 p-b-60">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 p-b-80">
          <div class="p-r-45 p-r-0-lg">
            @foreach ($viewData['blogs'] as $blog)
            <div class="p-b-63">
              <a href="blog-detail.html" class="hov-img0 how-pos5-parent">
                <img src="{{ asset('/storage/' . $blog->getImage()) }}" alt="IMG-BLOG" />
              </a>

              <div class="p-t-32">
                <h4 class="p-b-15">
                  <a
                    href="{{ route('blog.show', ['id' => $blog->getId()]) }}"
                    class="ltext-108 cl2 hov-cl1 trans-04"
                  >
                  {{$blog->getTitle()}}
                  </a>
                </h4>

                <p class="stext-117 cl6">
                  {{$blog->getShortDesc()}}
                </p>

                <div class="flex-w flex-sb-m p-t-18">

                  <a
                    href="{{ route('blog.show', ['id' => $blog->getId()]) }}"
                    class="stext-101 cl2 hov-cl1 trans-04 m-tb-10"
                  >
                    Continue Reading

                    <i class="fa fa-long-arrow-right m-l-9"></i>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection