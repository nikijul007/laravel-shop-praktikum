@extends('layout.master')
@section('titel')
Shop
@endsection


@section('inhalt')

@isset($success)
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">
            {{$success}}
        </div>
    </div>
</div>
@endisset

<!--@if(!Session::has('success'))
<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>-->

@endif

@foreach($products->chunk(3) as $productChunk)
<div class="row">
    @foreach($productChunk as $product)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="{{$product->imagePath}}" alt="..."
                 class='img-responsive'>
            <div class="caption">
                <h3>{{$product->title}}</h3>
                <p class="description">{{$product->description}}</p>
                <div class="pull-left price"> {{ number_format($product->price, 2, ',', '.' ) }} €</div>
                <div class="clearfix">
                    <form action="{{ route('product.addToCard', ['id' => $product->id]) }}" method="post">
                        <input type="text" id="anzahl" name="anzahl" class="form-control small">
                        <button class="btn btn-success pull-right" type="submit">Add to card</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach

@endsection
