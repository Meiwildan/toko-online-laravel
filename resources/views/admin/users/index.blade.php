@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Registered Users</h1>
            <hr>
        </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($users as $itemfarrel)
            <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $itemfarrel->name. ' ' .$itemfarrel->lname }}</th>
                <th>{{ $itemfarrel->email }}</th>
                <th>{{ $itemfarrel->phone }}</th>
               
              
                <th>
                    <a href="{{ url('view-user/'.$itemfarrel->id) }}" class="btn btn-primary btn-sm">View</a>
                    
                </th>
            </tr>
            @endforeach
        </tbody>
       </table>
 
    </div>
</div>
@endsection