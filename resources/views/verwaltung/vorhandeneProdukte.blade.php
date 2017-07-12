@extends('layout.master')

@section('titel')
Admin - Produkte
@endsection

@section('inhalt')
<div class="col-md-4 col-md-offset-4 weißeSchrift">
    <h1>{{ trans('messages.test') }} </h1>

</div>
@foreach($products->chunk(3) as $productChunk)
<div class="row">
    <br> <br> <br> <br>
    @foreach($productChunk as $product)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail schwarzeBox">
            <img src="{{$product->imagePath}}" alt="{{ URL::asset('img/tabBild.png') }}"
                 class='img-responsive'>
            <div class="caption">
                <div class="weißeSchrift">
                    <h3>{{$product->title}}</h3>
                </div>
                <p class="description">{{$product->description}}</p>
                <div class="pull-left price weißeSchrift"> {{ number_format($product->price, 2, ',', '.' ) }} €</div>
                <div class="clearfix">
                    <a href="{{ route('admin.changeProduct', ['id' => $product->id]) }}" class="btn btn-info pull-right">Edit Product</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach 
</div>
@endforeach


@endsection


@section('Adminpage')
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-lock" aria-hidden="true"></i> Admin Menu <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('admin.createProduct') }}"><i class="fa fa-plus" aria-hidden="true"></i> Neues Produkt </a></li>
        <li><a href="{{ route('admin.products') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Vorhandene Produkte </a></li>
    </ul>
</li>


@endsection
@section('admin')
<li><a href="{{ route('verwaltung.admin') }}"><i class="fa fa-lock" aria-hidden="true"></i> Admin</a></li>
@endsection