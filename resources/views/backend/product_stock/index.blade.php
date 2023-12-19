@extends('layouts.backend_master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Product Stocks List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="{{ route('stock.create') }}">Add Product Stock</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Current Qty</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($inventories as $inventory)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $inventory->product->id)->get()->random()->product_photo }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </td>

                                                <td>{{ $inventory->product->product_name }}</td>

                                                <td>{{ $inventory->color->color_name }}</td>

                                                <td>{{ $inventory->size->size_name }}</td>

                                                <td>{{ $inventory->product_quantity }}</td>

                                                <td class="td-price">
                                                    @if ($inventory->discount_price == $inventory->regular_price)
                                                        ${{ $inventory->discount_price }}
                                                    @else
                                                        ${{ $inventory->discount_price }}
                                                        &nbsp;&nbsp;
                                                        <del class="text-danger">${{ $inventory->regular_price }}</del>
                                                    @endif
                                                </td>

                                                @if ($inventory->product_quantity > 0)
                                                    <td class="status-close">
                                                        <span>In Stock</span>
                                                    </td>
                                                @else
                                                    <td class="status-danger">
                                                        <span>Stock Out</span>
                                                    </td>
                                                @endif

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('stock.edit', $inventory->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                Edit
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-secondary">Delete</button>
                                                        </li>
                                                    </ul>
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
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
