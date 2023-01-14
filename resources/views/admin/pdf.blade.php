<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Order Details</h1>

    Coustomer Name : <h3>{{$order->name}}</h3>
    Coustomer Email : <h3>{{$order->email}}</h3>
    Coustomer Address : <h3>{{$order->address}}</h3>
    Coustomer Phone : <h3>{{$order->phone}}</h3>
    Product Name : <h3>{{$order->product_name}}</h3>
    Product Quantity : <h3>{{$order->quantity}}</h3>
    Product Price : <h3>{{$order->price}}</h3>
    Payment Status : <h3>{{$order->payment_status}}</h3>
    Delivery Status : <h3>{{$order->delivery_status}}</h3>
    Order Date : <h3>{{$order->created_at}}</h3><br><br>
    Product Image : <img src="product_images/{{$order->image}}" alt="" srcset=""></br></br>
    


</body>
</html>