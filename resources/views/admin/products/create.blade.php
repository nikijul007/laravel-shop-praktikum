@extends('layout.master')
@section('titel')
Admin - Create
@endsection
@section('inhalt')
<div>
    <br> <br> <br> <br> <br> 
</div>
<form action="{{route('admin.products.store')}}" method="post" id="product-create">
    <div class="row weißeSchrift">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="image_path">Image path</label>
                <input type="text" id='image_path' value="{{ old('image_path', '') }}" class="form-control @if ($errors->has('image_path')) parsley-error @endif" name="image_path" placeholder="https://cdn.shopify.com/s/files/1/0795/0905/products/52ad078a-2c03-40bf-afff-f34607071d6f_1024x1024.jpg?v=1447366834" required>
                @if ($errors->has('image_path'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('image_path') }}</li>
                </ul>
                @endif
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id='title' value="{{ old('title', '') }}" class="form-control" name="title" placeholder="Produktname" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id='description' value="{{ old('description', '') }}" class="form-control" name="description" placeholder="Cooles Produkt." required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id='price' class="form-control" value="{{ old('price', '') }}" name='price' placeholder="0.99" required>
            </div>
            <hr>
            <hr>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
        {{csrf_field()}}
    </div>
</form>
@endsection
