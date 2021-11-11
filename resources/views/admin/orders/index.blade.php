@extends('layouts.admin')

@section('title')
    orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>open orders</h4>
                    <a href="{{ url('comlpetedorders') }}" class="btn btn-warning">competed orders</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>total price</th>
                            <th>status</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->status == '0' ? 'order pending': 'order completed'}}</td>
                                <td><a href="{{ url('admin/vieworder/'.$item->id) }}" class="btn btn-primary">view</a></td>
                            <tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection