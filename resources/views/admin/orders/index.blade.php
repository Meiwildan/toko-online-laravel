@extends('layouts.admin')

@section('title')
  Orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>New Orders
                        <a href="{{ 'order-history' }}" class="btn btn-warning float-right">Order History</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date Order</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $itemfarrel)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($itemfarrel->created_at)) }}</td>
                                <td>{{ $itemfarrel->tracking_no }}</td>
                                <td>{{ $itemfarrel->total_price }}</td>
                                <td>{{ $itemfarrel->status == '0' ? 'pending' : 'completed' }}</td>
                                <td>
                                    <a href="{{url('admin/view-order/'.$itemfarrel->id)}}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection