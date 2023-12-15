@extends('layouts.backend_master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Products List ({{ $products->count() }})</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="{{ route('product.create') }}">Add Product</a>
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
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $product->id)->get()->random()->product_photo }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </td>

                                                <td>{{ $product->product_name }}</td>

                                                <td> {{ $product->category->category_name }} </td>

                                                {{-- @if () --}}
                                                <td class="status-close">
                                                    <span>Active</span>
                                                </td>
                                                {{-- @else
                                                <td class="status-danger">
                                                    <span>Deactive</span>
                                                </td>
                                                @endif --}}

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="" class="btn btn-sm btn-primary">
                                                                Show
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="" class="btn btn-sm btn-info">
                                                                Edit
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <button class="btn btn-sm btn-secondary" type="submit">Delete</button>
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
