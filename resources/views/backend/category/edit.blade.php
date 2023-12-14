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
                                    <h5>Edit Category</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" action="{{ route('category.update',$category->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('category_name') is-invalid @enderror"
                                                type="text" placeholder="Category Name" name="category_name" value="{{ $category->category_name }}">
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Details</label>
                                        <div class="col-sm-9">
                                            <textarea name="category_details" class="form-control @error('category_details') is-invalid @enderror" rows="4"
                                                placeholder="Category Details">{{ $category->category_details }}</textarea>
                                            @error('category_details')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Photo</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('category_photo') is-invalid @enderror"
                                                type="file" name="category_photo">
                                            @error('category_photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0"></label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-animation" type="submit">Update new Category</button>
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
