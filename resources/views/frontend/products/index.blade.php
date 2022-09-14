@extends('layouts.front')

@section('title')
   Products
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h5 class="mb-0">Collection / {{ $category->name }}</h5>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>
            @foreach ($products as $prodfarrel)
            <div class="col-md-3 mb-3">
                <a href="{{url('category/'.$category->slug.'/'.$prodfarrel->slug)}}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$prodfarrel->image) }}" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5>{{ $prodfarrel->name }}</h5>
                       
                        <span class="float-start">{{ $prodfarrel->selling_price }}</span>
                        <span class="float-end"><s>{{ $prodfarrel->original_price }}</s></span>
                    </div>
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
   </div>

@endsection