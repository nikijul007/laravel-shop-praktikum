@extends('layout.master')

@section('titel')
Admin - Produkte
@endsection

@section('inhalt')
<div>
    <br> <br> <br> 
</div>
<div class="col-md-4 col-md-offset-4 weißeSchrift">
    <h1>Vorhandene Produkte</h1>

</div>
@foreach($products->chunk(3) as $productChunk)
<div class="row">
    <br> <br> <br> <br>
    @foreach($productChunk as $product)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail schwarzeBox">
            <img src="{{$product->image_path}}" title="Hier ist kein Bild vorhanden."
                 class='img-responsive weißeSchrift'>
            <div class="caption">
                <div class="weißeSchrift">
                    <h3>{{$product->title}}</h3>
                    <h6>Id: {{$product->id}}</h6>
                </div>
                <p class="description">{{$product->description}}</p>
                <div class="pull-left price weißeSchrift"> {{ number_format($product->price, 2, ',', '.' ) }} €</div>
                <div class="clearfix">
                    <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-info pull-right">Edit Product</a>
                    <a href="{{ route('admin.products.delete', ['id' => $product->id]) }}" class="btn btn-danger pull-right">Delete Product</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach
@endsection
