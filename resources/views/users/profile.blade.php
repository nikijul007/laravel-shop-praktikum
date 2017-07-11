@extends('layout.master')
@section('titel')
User Profile
@endsection

@section('inhalt')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>User Profile</h1>
        <hr>
        <h2>Your Orders</h2>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->card->items as $item)
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($item['price'], 2, ',', '.' ) }} €</span>
                         
                           {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">
                <strong>Total Price: {{ number_format($order->card->totalPrice, 2, ',', '.' ) }} €</strong>
            </div>
        </div>
        @endforeach
    </div>   
</div>
@endsection

