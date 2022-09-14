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
            <a href="{{ url('wishlist') }}">
          My Wishlist
            </a>
        </h5>
    </div>
</div>

    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                <div class="card-body">
                    @foreach ($wishlist as $itemfarrel)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/products/'.$itemfarrel->products->image) }}" width="100px" alt="tes">
                                
                            </div>
                            <br>
                                <div class="col-md-2 my-auto">
                                    <h3>{{ $itemfarrel->products->name }}</h3>
                                </div>
                               
                                <div class="col-md-2 my-auto">
                                    <h3>{{ $itemfarrel->products->selling_price }}</h3>
                                </div>
                               
                                <div class="col-md-2 my-auto">
                                    <input type="hidden"  class="prod_id" value="{{ $itemfarrel->prod_id }}">
                                    @if ($itemfarrel->products->qty > $itemfarrel->prod_qty)
                                    <h6>In Stock</h6>
                                    <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="130px;">
                                    <button class="input-group-text  decrement-btn">-</button>
                                    <input type="text" name="quantity "  class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text  increment-btn">+</button>
                                </div>
                                     @else
                                     <h6>Out of stock</h6>
                                    @endif
                                   
                            </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"> <br></i>  Add To Cart</button>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"> <br></i>  Remove</button>
                        </div>
                    </div>
                   
                   
               
                    @endforeach
            </div>
           
                @else
                    <h4>There are no products in your wishlist</h4>
                @endif
            </div>
           
    </div>
    
</div>

@endsection