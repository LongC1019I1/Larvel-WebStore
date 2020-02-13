@extends('shop.master')

@section('content')
        <h3 class="h3">shopping Demo-1 </h3>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">

                            <img class="pic-1" src="{{asset('storage/'.$product->image)}}">
                            <img class="pic-2" src="{{asset('storage/'.$product->image)}}">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">20%</span>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star disable"></li>
                    </ul>
                    <div style="height: 200px" class="product-content">
                        <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                        <div class="price">{{number_format($product->price,0,',','.')}}
                            <span>$20.00</span>
                        </div>
                        <a class="add-to-cart" href="{{route('addToCart',$product->id)}}">+ Add To Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endsection