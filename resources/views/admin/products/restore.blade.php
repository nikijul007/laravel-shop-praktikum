@extends('layout.master')

@section('titel')
Admin - Gelöschte Produkte
@endsection

@section('inhalt')
<div class="col-md-4 col-md-offset-4 weißeSchrift">
    <h1>Gelöschte Produkte</h1>

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
                    <form action="{{ route('admin.products.restore', ['id' => $product->id]) }}" method="post" id='product-delete'>
                        <button type="submit" class="btn btn-success pull-right">Restore Product</button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach


@endsection
