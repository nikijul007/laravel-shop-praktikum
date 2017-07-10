@extends('layout.master')
@section('titel')
    Shop
@endsection


@section('inhalt')

    <?php $success = session()->get('success'); ?>
    @if (!$success === null)
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{$success}}
                </div>
            </div>
        </div>
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
                    <a href="{{route('product.addToCard',['id' => $product->id] )}}" class="btn btn-success pull-right" role="button">Add to card</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endforeach

@endsection
