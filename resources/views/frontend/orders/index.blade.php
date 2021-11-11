@extends('layouts.frontend')

@section('name')
    orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 py-12">
            <div class="card">
                <div class="card-header">
                    <h4>my orders</h4>
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
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->status == '0' ? 'order pending': 'order completed'}}</td>
                                <td><a href="{{ url('vieworder/'.$item->id) }}" class="btn btn-primary">view</a></td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection