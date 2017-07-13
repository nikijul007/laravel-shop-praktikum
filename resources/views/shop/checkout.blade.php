@extends('layout.master')
@section('titel')
Checkout
@endsection

@section('inhalt')
<div>
    <br> <br> <br> <br> 
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 weißeSchrift">
        <h1>Checkout</h1>
        <h4>Your Total: ${{ number_format($total, 2, ',', '.' ) }} €</h4>

        <div id="charge-error" class="alert alert-danger" {{!Session::has('error') ? 'hidden' : ''}}>
            {{Session::get('error')}}
        </div>

        <form action="{{route('checkout')}}" method="post" id="checkout-form">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id='name' class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" id='address' class="form-control" name="address" placeholder="Address" required>
                    </div>
                    <hr>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id='description' class="form-control" name="description" placeholder="Descripe your order!" required>
                    </div>
                    <hr>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-name">Card Holder Name</label>
                        <input type="text" id='card-name' class="form-control" placeholder="Name" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-number">Credit Card Number</label>
                        <input type="text" id='card-number' class="form-control" placeholder="4242 4242 4242 4242" value="4242 4242 4242 4242" required>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="card-expiry-month">Expiration Month</label>
                            <input type="text" id='card-expiry-month' class="form-control" placeholder="12" required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="card-expiry-year">Expiration Year</label>
                            <input type="text" id='card-expiry-year' class="form-control" placeholder="2020" required>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="card-cvc">CVC</label>
                    <input type="text" id='card-cvc' class="form-control" required>
                </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-success">!!!Buy now!!!</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{URL::to('scr/js/checkout.js')}}"></script>
@endsection
