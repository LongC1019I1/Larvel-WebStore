<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<h2>Responsive Checkout Form</h2>
<p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on
    top of each other instead of next to each other.</p>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="/action_page.php" method="">

                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="name" placeholder="John M. Doe">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                        <label for="city"><i class="fa fa-institution"></i> Phone</label>
                        <input type="number" id="city" name="phone" placeholder="New York">
                    </div>


                </div>
                <label>
                    <input type="checkbox" checked="checked" name="status"> Shipping address same as billing
                </label>
                <input type="submit" value="Continue to checkout" class="btn">

        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Cart <span class="price" style="color:black"><i
                        class="fa fa-shopping-cart"></i> <b>{{$cart->totalQty}}</b></span></h4>
            @foreach($cart->items as $item)
                <p><a name="productName" href="#">{{$item['item']->name}}</a>
                    <span name="productQty"> Số lượng: {{$item['totalQty']}} </span>
                    <span name="productPrice" class="price">{{number_format($item['totalPrice'])}}</span></p>
            @endforeach
            <hr>
            <p>Total <span name="totalCart" class="price"
                           style="color:black"><b>{{number_format($cart->totalPrice)}}</b></span></p>
        </div>
    </div>
</div>
</form>
</body>
</html>
