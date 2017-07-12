@extends('layout.master')
@section('titel')
Admin - Create
@endsection
@section('inhalt')
<form action="{{route('admin.create')}}" method="post" id="product-create">
    <div class="row weißeSchrift">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="imagePath">Image path</label>
                <input type="text" id='imagePath' class="form-control" name="imagePath" placeholder="https://cdn.shopify.com/s/files/1/0795/0905/products/52ad078a-2c03-40bf-afff-f34607071d6f_1024x1024.jpg?v=1447366834" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="address">Title</label>
                <input type="text" id='title' class="form-control" name="title" placeholder="Produktname" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id='description' class="form-control" name="description" placeholder="Cooles Produkt." required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id='price' class="form-control" name='price' placeholder="0.99" required>
            </div>
            <hr>
            <hr>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
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