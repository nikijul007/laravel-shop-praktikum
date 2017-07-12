@extends('layout.master')
@section('titel')
Admin - Change
@endsection
@section('inhalt')
    <form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="post" id="product-change">
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
    </form>
@endsection

