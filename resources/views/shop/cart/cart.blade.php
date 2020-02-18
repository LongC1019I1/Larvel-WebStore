<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    Shopping Cart
                                </h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button"
                                        class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    Continue shopping
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @forelse($cart->items as $item)
                    <div class="row">
                        <div class="col-xs-2">
                            <img class="img-responsive"
                                 src="{{asset('storage/'.$item['item']->image)}}">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name">
                                <strong>{{$item['item']->name}}</strong>
                            </h4>
                            <h4>
                                <small>{{$item['item']->desc}}</small>
                            </h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6>
                                    <strong>{{number_format($item['item']->price)}}
                                        <span class="text-muted">x</span>
                                    </strong>
                                </h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="number"
                                       class="form-control input-sm"
                                       id="change-product-qty"
                                       data-id="prdouct-{{$item['item']->id}}"
                                       value="{{$item['totalQty']}}">
                            </div>
                            <div class="col-xs-6 text-right">
                                <h6>
                                    <strong>{{number_format($item['totalPrice'])}}</strong>
                                </h6>
                            </div>
                            <div class="col-xs-2">
                                <a href="{{route('deleteCart',$item['item']->id)}}">
                                <button type="button"
                                        class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @empty
                        <div>
                            <p>Chưa có sản phẩm</p>
                        </div>
                    @endforelse
                        <div class="text-center">
                            <div class="col-xs-9">
                                <h6 class="text-right">
                                    Added items?
                                </h6>
                            </div>
                            <div class="col-xs-3">
                                <button type="button"
                                        class="btn btn-default btn-sm btn-block">
                                    Update cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total
{{--                                Đối tượng cart--}}
                                <strong>{{number_format($cart->totalPrice)}}</strong>
                            </h4>
                        </div>
                        <div class="col-xs-3">
                            <a href="{{route('checkout')}}"
                                    class="btn btn-success btn-block">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
