@extends('layouts.app')
@section('title', $viewData['title'])

@section('body')





<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                    Women
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                    Men
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                    Bag
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                    Shoes
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                    Watches
                </button>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                     Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form  action="{{route('product.search')}}">
                <div class="bor8 dis-flex p-l-15">
                    <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="q" placeholder="Search">
                </div>	
            </form>
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 ">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('product.newness')}}" class="filter-link stext-106 trans-04 ">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('product.asc')}}" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('product.desc')}}" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{route('product.index')}}" class="filter-link stext-106 trans-04">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('product.index', ['min_price' => 0, 'max_price' => 50]) }}" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                </a>
                            </li>
                            
                            <li class="p-b-6">
                                <a href="{{ route('product.index', ['min_price' => 50, 'max_price' => 100]) }}" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>
                            
                            <li class="p-b-6">
                                <a href="{{ route('product.index', ['min_price' => 100, 'max_price' => 150]) }}" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>
                            
                            <li class="p-b-6">
                                <a href="{{ route('product.index', ['min_price' => 150, 'max_price' => 200]) }}" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>
                            
                            <li class="p-b-6">
                                <a href="{{ route('product.index', ['min_price' => 200, 'max_price' => 99999]) }}" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    

                    
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach ($viewData['products'] as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->getCategory() }}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        {{-- <img src='front/images/'. $product['image']" alt="IMG-PRODUCT"> --}}
                        <img src="{{ asset('/storage/' . $product->getImage()) }}"  alt="IMG-PRODUCT">

                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->getName()}}
                            </a>

                            <span class="stext-105 cl3">
                                ${{ $product->getPrice() }}
                            </span>
                        </div>

                       
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Load more -->
       
    </div>
</div>


    



@endsection