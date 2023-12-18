@extends('layouts.backend_master')
@section('content')
    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Stock Information</h5>
                                </div>

                                @if (session('product-stock-success'))
                                    <div class="alert alert-success">{{ session('product-stock-success') }}</div>
                                @endif

                                @if (session('product-stock-error'))
                                    <div class="alert alert-secondary">{{ session('product-stock-error') }}</div>
                                @endif

                                @if (session('product-price-error'))
                                    <div class="alert alert-secondary">{{ session('product-price-error') }}</div>
                                @endif

                                <form class="theme-form theme-form-2 mega-form" action="{{ route('stock.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Product
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="product_id">
                                                <option>- Select One Product -</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Size
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="size_id">
                                                <option>- Select One Size -</option>
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->size_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('size_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Color
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="color_id">
                                                <option>- Select One Color -</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->color_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('color_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product Quantity</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Product Quantity"
                                                name="product_quantity" value="{{ $inventory->product_quantity }}">
                                            @error('product_quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Regular Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('regular_price') is-invalid @enderror"
                                                type="text" placeholder="Regular Price" name="regular_price">
                                            @error('regular_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Discount Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('discount_price') is-invalid @enderror"
                                                type="text" placeholder="Discount Price" name="discount_price">
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0"></label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-animation" type="submit">Add New Product Stock</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Product Add End -->
@endsection
