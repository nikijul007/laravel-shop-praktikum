@extends('layout.master')
@section('titel')
Shopping Card
@endsection


@section('inhalt')
<div>
    <br> <br> <br> <br> 
</div>
@if(Session::has('card'))
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <ul class="list-group">
            @foreach($products as $product)
            <li class="list-group-item">
                <span class="badge">{{$product['qty']}}</span>
                <strong>{{$product['item']['title']}}</strong>
                <span class="label label-success">{{ number_format($product['price'], 2, ',', '.' ) }} € </span>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" 
                            data-toggle="dropdown">Action<span class="caret"></span> </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('product.reduceOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                        <li><a href="{{ route('product.reduceall', ['id' => $product['item']['id']]) }}">Reduce all</a></li>
                </div>
                <a href="{{ route('product.addOne', ['id' => $product['item']['id']]) }}" class="btn btn-primary btn-xs">Add one</a>
                @endforeach
        </ul>

    </div>       
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 weißeSchrift">
        <strong>Total: {{ number_format($totalPrice, 2, ',', '.' ) }} €</strong>
    </div>       
</div>
<br>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>

        <a href="{{ route('product.deleteCard')}}" type="button" class="btn btn-danger pull-right">Alles löschen</a>
    </div>
</div>
@else
<div class="row weißeSchrift">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <h2>No Items in Card.</h2>
        <h4>When you would like to shop, click <a href="{{ route('product.index') }}" >here.</a></h4>
    </div>       
</div>
@endif
@endsection

