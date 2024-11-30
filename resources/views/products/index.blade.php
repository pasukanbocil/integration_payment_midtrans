@extends('layouts.app')

@section('styles')
<style>
    .product-card {
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .product-card .card-img-top {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .product-card .card-body {
        padding: 1.25rem;
        background: white;
    }

    .product-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        height: 2.4rem;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-card .card-text {
        margin-bottom: 0.5rem;
    }

    .product-card .description {
        height: 4.5rem;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .btn-primary {
        transition: all 0.2s ease;
        width: 100%;
        margin-top: 1rem;
    }

    .btn-primary:hover {
        transform: scale(1.02);
    }

    .price {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .stock {
        color: #6c757d;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Products</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="product-card card h-100">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text description">{{ $product->description }}</p>
                        <p class="card-text price">Rp {{ number_format($product->price) }}</p>
                        <p class="card-text stock">Stock: {{ $product->stock }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
