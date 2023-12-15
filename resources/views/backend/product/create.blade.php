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
                                    <h5>Product Information</h5>
                                </div>

                                @if (session('product-success'))
                                    <div class="alert alert-success">{{ session('product-success') }}</div>
                                @endif

                                <form class="theme-form theme-form-2 mega-form" action="{{ route('product.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Category
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="category_id">
                                                <option>- Select One Category -</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('product_name') is-invalid @enderror"
                                                type="text" placeholder="Product Name" name="product_name">
                                            @error('product_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product Name Details</label>
                                        <div class="col-sm-9">
                                            <textarea name="product_name_details" class="form-control" rows="3"></textarea>
                                            @error('product_name_details')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product Short Details</label>
                                        <div class="col-sm-9">
                                            <textarea name="product_short_details" class="form-control" rows="4"></textarea>
                                            @error('product_short_details')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product Long Details</label>
                                        <div class="col-sm-9">
                                            <textarea name="product_long_details" class="form-control" rows="4"></textarea>
                                            @error('product_long_details')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Additional Information</label>
                                        <div class="col-sm-9">
                                            <textarea name="additional_info" class="form-control" rows="4"></textarea>
                                            @error('additional_info')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product Photo</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="product_photo[]" multiple>
                                            @error('product_photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0"></label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-animation" type="submit">Add New Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Description</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="form-label-title col-sm-3 mb-0">Product
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <div id="editor"></div>
                                                </div>
                                            </div>
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
