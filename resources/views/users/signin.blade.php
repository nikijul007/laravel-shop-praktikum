@extends('layout.master')
@section('titel')
Sign In
@endsection

@section('inhalt')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign In</h1>
       
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error}} </p>
            @endforeach
        </div>
        @endif
        
        @isset($customerErrors)
            @if(count($customerErrors)>0)
            <div class="alert alert-danger">
                @foreach($customerErrors as $error)
                <p>{{ $error}} </p>
                @endforeach
            </div>
            @endif
        @endisset
       
        <form action="{{route('users.signin')}}" method="post">
            <div class="form-group">
                <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</label>  
                <input type="text" id="email" name="email" class="form-control">
            </div>  
            <div class="form-group">
                <label for="password" ><i class="fa fa-lock" aria-hidden="true"></i> Password</label>  
                <input type="password" id="password" name="password" class="form-control">
            </div>   
            <button type="submit" class="btn btn-primary">Sign In</button>
            {{csrf_field()}}
        
            
            <button formmethod="post" formaction="{{route('product.index')}}" class="pull-right">Go to Shop</button>
        </form
      
        
        
    </div>   
</div>
@endsection

