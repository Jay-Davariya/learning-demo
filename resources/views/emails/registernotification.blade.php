<!DOCTYPE html>
<html>

<head>
    <title>Register Notification</title>
</head>

<body>
    @csrf
    <h2>Register Notification</h2>
    <p>User's Id: <b>{{ $id }}</b></p>
    <p>Hello User, <b>{{ $customer }}</b></p>
    <p>User's Email: <b>{{ $email }}</b></p>
    <p>User's Shopkeepers:
        <b>
            @foreach ($shopkeepers as $shopkeeper)
                ,{{ $shopkeeper->name }}
            @endforeach
        </b>
    </p>
    <p>User's Product:
        <b>
        @foreach ($products as $product)
        <img class="ms-3 border-" src="{{asset('/storage/product/' . $product->product)}}" , alt="product" width="80px" height="40px"> 
        @endforeach
        </b>
    </p>
    <p>User's Product Name: <b>{{ $product_name }}</b></p>
    <p>User's MRP: <b>{{ $mrp }}</b></p>
    <p>User's Sell Price: <b>{{ $sellprice }}</b></p>
    <p>User's Expiry: <b>{{ $expiry }}</b></p>
    <p>User's Country: <b>{{ $country }}</b></p>
    <p>User's State: <b>{{ $state }}</b></p>
    <p>User's City: <b>{{ $city }}</b></p>
    <p>User's Address: <b>{{ $address }}</b></p>
    <p>This is to notify you that you have registered with Shop Now.</p>
    <p>Thank you!</p>
</body>

</html>