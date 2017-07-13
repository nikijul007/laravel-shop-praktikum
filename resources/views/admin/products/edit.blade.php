@extends('layout.master')

@section('titel')
Admin - Change
@endsection

@section('inhalt')
<div>
    <br> <br> <br> <br> <br>
</div>
<form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="post" id="product-change">
    <div class="row weißeSchrift">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="image_path">Image path</label>
                <input type="text" id='image_path' class="form-control" name="image_path" value="{{ $product->image_path }}" class="form-control @if ($errors->has('image_path')) parsley-error @endif" required>
                @if ($errors->has('image_path'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('image_path') }}</li>
                </ul>
                @endif
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
