@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if ($product->image)
                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                @endif
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p class="h4">Price: Rp {{ number_format($product->price) }}</p>
                <p>Stock: {{ $product->stock }}</p>

                @auth
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <div class="input-group" style="max-width: 150px;">
                                <button type="button" class="btn btn-outline-secondary" id="minus-btn">-</button>
                                <input type="number" class="form-control text-center" id="quantity" name="quantity"
                                    min="1" max="{{ $product->stock }}" value="1" style="width: 60px;">
                                <button type="button" class="btn btn-outline-secondary" id="plus-btn">+</button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login untuk membeli</a>
                @endauth
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const plusBtn = document.getElementById('plus-btn');
            const minusBtn = document.getElementById('minus-btn');
            const maxQuantity = {{ $product->stock }};

            // Handle plus button click
            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue < maxQuantity) {
                    quantityInput.value = currentValue + 1;
                }
            });

            // Handle minus button click
            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        });
    </script>
@endpush
