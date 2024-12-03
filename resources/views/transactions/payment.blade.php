@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>
                <div class="card-body">
                    <h5>Order ID: {{ $transaction->order_id }}</h5>
                    <h5>Total Amount: Rp {{ number_format($transaction->total_amount) }}</h5>
                    <button id="pay-button" class="btn btn-primary">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        const transaction = {!! json_encode($transaction) !!};

        snap.pay('{{ $transaction->snap_token }}', {
            onSuccess: function(result) {
                // Kirim request ke backend untuk update status
                fetch('/transactions/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        order_id: transaction.order_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Payment success!');

                        window.location.href = '/';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('There was an error updating the payment status');
                });
            },
            onPending: function(result) {
                alert('Please complete your payment');
            },
            onError: function(result) {
                alert('Payment failed!');
            },
            onClose: function() {
                alert('You closed the popup without finishing the payment');
            }
        });
    });
</script>
@endpush
