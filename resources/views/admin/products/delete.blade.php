@extends('layout.master')

@section('titel')
Admin - Change
@endsection

@section('inhalt')

<div class="col-md-4 col-md-offset-4 weißeSchrift schwarzeBox">
    <h2>Are you sure to delete the Product: </h2>
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
                <a href="{{ route('admin.products.index') }}" class="btn btn-info pull-right">No, don´t delete</a>
                <form action="{{ route('admin.products.delete', ['id' => $product->id]) }}" method="post" id='product-delete'>
                    <button type="submit" class="btn btn-danger pull-right">Delete Product</button>
                    <input type="hidden" name="method" value="delete">
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


