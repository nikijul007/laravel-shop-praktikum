@extends('layout.master')
@section('titel')
Sign Up
@endsection

@section('inhalt')
<div>
    <br> <br> <br> <br> 
</div>
<div class="row weißeSchrift">
    <div class="col-md-5 col-md-offset-4">

        <h1>Sign Up</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error}} </p>
            @endforeach
        </div>
        @endif   


        <form action="{{route('users.signup')}}" method="post">
             <div class="form-group">
                <label for="name" ><i class="fa fa-user-plus" aria-hidden="true"></i> Name</label>  
                <input type="text" id="name" name="name" class="form-group-sm form-control">
                <input type="text" id='nachname' name='nachname' class="form-group-sm form-control">
            </div> 
            
            <div class="form-group">
                <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</label>  
                <input type="text" id="email" name="email" class="form-control">
            </div>  
            <div class="form-group">
                <label for="password" ><i class="fa fa-lock" aria-hidden="true"></i> Password</label>  
                <input type="password" id="password" name="password" class="form-control">
            </div>   
            <button type="submit" class="btn btn-primary">Sign Up</button>
            {{csrf_field()}}
        </form>
    </div>   
</div>
@endsection
