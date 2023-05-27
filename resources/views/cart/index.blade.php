@extends('layouts.app')
@section('title',  $viewData["title"] )
@section('body')

@if(count($viewData["products"]) > 0)
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4 text-center">Quantity</th>
								<th class="column-5">Total</th>
                                <th class="column-3 text-center">Action</th>
                            </tr>

                            @foreach ($viewData["products"] as $product) 
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ asset('/storage/' . $product->getImage()) }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{$product->getName()}}</td>
                                <td class="column-3">$ {{$product->getPrice()}}</td>
                                <td class="column-4 text-center">
                                     <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <a href="#" class="fs-16 zmdi zmdi-minus"></a>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="{{session('products')[$product->getId()]}}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <a href="#"  class="fs-16 zmdi zmdi-plus"></a>
                                        </div>
                                    </div>
                                
                                    
                                    
                                   
                                    
                                </td>
                                <td class="column-5">$ {{$product->getPrice()*(session('products')[$product->getId()])}}
                                    
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('cart.deleteById', ['id'=>$product->getId()]) }}">
                                        {{-- <i class="fs-16 zmdi zmdi-delete"></i> --}}X

                                    </a>
                                    </td>
                                
                                    
                            </tr>
                            @endforeach

                            
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <a class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                          Continue to Shopping  
                        </a>
                        <a class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" href="{{route('cart.delete')}}">
                            Delete All  
                          </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
               
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                ${{$viewData["total"]}}
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                ${{$viewData["total"]}}
                            </span>
                        </div>
                    </div>

                    <a href="{{route('cart.purchase')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Purchase
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</form>
@else
<div class="container m-5">
    <h1 class="text-center">No item in cart!</h1>
</div>



@endif
@endsection