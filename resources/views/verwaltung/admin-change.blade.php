@extends('layout.master')
@section('titel')
Admin - Change
@endsection
@section('inhalt')
<form action="{{ route('admin.changeProduct', ['id' => $product->id]) }}" method="post" id="product-change">
    <div class="row weißeSchrift">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="imagePath">Image path</label>
                <input type="text" id='imagePath' class="form-control" name="imagePath" value="{{ $product->imagePath }}" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="address">Title</label>
                <input type="text" id='title' class="form-control" name="title" value="{{ $product->title }}" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id='description' class="form-control" name="description" value="{{ $product->description }}" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id='price' class="form-control" name='price' value="{{ $product->price }}" required>
            </div>
            <hr>
            <hr>
        </div>
        <button type="submit" class="btn btn-primary">Change Product</button>
        {{csrf_field()}}
    </div>

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