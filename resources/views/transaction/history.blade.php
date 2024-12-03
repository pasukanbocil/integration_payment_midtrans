@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Transaction History</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Products</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->order_id }}</td>
                       <td>{{ \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('d F Y H:i') }}</td>

                        {{-- <td>{{ $transaction->created_at->diffForHumans() }}</td> --}}
                        <td>
                            @foreach($transaction->items as $item)
                                <div>{{ $item->product->name }} ({{ $item->quantity }}x)</div>
                            @endforeach
                        </td>
                        <td>Rp {{ number_format($transaction->total_amount) }}</td>
                        <td>
                            <span class="badge bg-{{ $transaction->status === 'paid' ? 'success' : ($transaction->status === 'pending' ? 'warning' : 'danger') }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
