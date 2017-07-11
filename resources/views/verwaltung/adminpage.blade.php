@extends('layout.master')
@section('titel')
Admin
@endsection
@section('inhalt')
<form action="{{route('admin.change')}}" method="post" id="admin-aendern">
    <div class="row weißeSchrift">
        
        <div class="col-xs-12">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="id" id='id' class="form-control" name="id" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="imagePath">Image path</label>
                <input type="text" id='imagePath' class="form-control" name="imagePath" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="address">Title</label>
                <input type="text" id='title' class="form-control" name="title" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id='description' class="form-control" name="description" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id='price' class="form-control" name='price' required>
            </div>
            <hr>
            <hr>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" id='email' class="form-control" name="email" required>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id='password' class="form-control" name="password" required>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-5">
            <button type="submit" class="btn btn-primary">Change Product</button>
            {{csrf_field()}}
        </div>
    </div> 

    @endsection

