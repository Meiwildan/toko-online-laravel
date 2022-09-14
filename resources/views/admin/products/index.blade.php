@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Product Page</h1>
            <a class="btn btn-success" href="{{ url('add-products') }}">Add Products +</a>
            <hr>
        </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Selling Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($products as $itemfarrel)
            <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $itemfarrel->category->name }}</th>
                <th>{{ $itemfarrel->name }}</th>
                <th>{{ $itemfarrel->selling_price }}</th>
                <th>
                    <img src="{{ asset('assets/uploads/products/' . $itemfarrel->image) }}" alt="Image" width="150px">
                </th>
              
                <th>
                    <a href="{{ url('edit-product/'.$itemfarrel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('delete-product/'.$itemfarrel->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </th>
            </tr>
            @endforeach
        </tbody>
       </table>
 
    </div>
</div>
@endsection