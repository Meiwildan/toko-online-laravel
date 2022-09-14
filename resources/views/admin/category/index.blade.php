@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Category Page</h1>
            <a class="btn btn-success" href="{{ url('add-category') }}">Add Category +</a>
            <hr>
        </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($category as $itemfarrel)
            <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $itemfarrel->name }}</th>
                <th>{{ $itemfarrel->description }}</th>
                <th>
                    <img src="{{ asset('assets/uploads/category/' . $itemfarrel->image) }}" alt="Image" width="150px">
                </th>
                <th>
                    <a href="{{ url('edit-category/'.$itemfarrel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('delete-category/'.$itemfarrel->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </th>
            </tr>
            @endforeach
        </tbody>
       </table>
 
    </div>
</div>
@endsection