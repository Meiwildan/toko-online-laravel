@extends('layouts.front')

@section('title')
   My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h5 class="mb-0">
            <a href="{{ url('/') }}">
            Home
        </a> /
            <a href="{{ url('cart') }}">
          Cart
            </a>
        </h5>
    </div>
</div>

    <div class="container my-5">
        <div class="card shadow product_data">
            @if ($cartitems->count() > 0)   
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartitems as $itemfarrel)
                    
              
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/'.$itemfarrel->products->image) }}" width="100px" alt="tes">
                            
                        </div>
                        <br>
                            <div class="col-md-3 my-auto">
                                <h3>{{ $itemfarrel->products->name }}</h3>
                            </div>
                           
                            <div class="col-md-2 my-auto">
                                <h3>{{ $itemfarrel->products->selling_price }}</h3>
                            </div>
                           
                            <div class="col-md-3 my-auto">
                                <input type="hidden"  class="prod_id" value="{{ $itemfarrel->prod_id }}">
                                @if ($itemfarrel->products->qty > $itemfarrel->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="130px;">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity "  class="form-control qty-input text-center" value="{{$itemfarrel->prod_qty}}"/>
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div>
                                @php
                                    $total += $itemfarrel->products->selling_price * $itemfarrel->prod_qty;
                                @endphp
                                 @else
                                 <h6>Out of stock</h6>
                                @endif
                               
                        </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"> <br></i>  Remove</button>
                    </div>
                </div>
                @php
                $total += $itemfarrel->products->selling_price * $itemfarrel->prod_qty; @endphp
               
           
                @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price : {{ $total }}
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </h6>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"> Cart is Empty</i></h2>
            <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue shopping</a>
        </div>
    @endif
    </div>
    
</div>

@endsection