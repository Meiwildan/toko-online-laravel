@extends('layouts.front')

@section('title')
    Toko Online Farrel
@endsection

@section('content')
@include('layouts.inc.slider')
   <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            @foreach ($featured_products as $prodfarrel)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$prodfarrel->image) }}" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5>{{ $prodfarrel->name }}</h5>
                       
                        <span class="float-start">{{ $prodfarrel->selling_price }}</span>
                        <span class="float-end"><s>{{ $prodfarrel->original_price }}</s></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   </div>

   <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
            @foreach ($trending_category as $trendfarrel)
            <div class="col-md-3">
                <div class="item">
                    <a style="text-decoration: none;" href="{{ url('view-category/'.$trendfarrel->slug) }}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/category/'.$trendfarrel->image) }}" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5>{{ $trendfarrel->name }}</h5>
                        <p>
                            {{ $trendfarrel->description }}
                           </p>
                          
                       
                    </div>
                </div>
            </div>
        </a>
        </div>
            @endforeach
        </div>
    </div>
   </div>
@endsection

