@extends('layouts.backend_master')
@section('content')
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Category ({{ $categories->count() }})</h5>
                            <form class="d-inline-flex">
                                <a href="{{ route('category.create') }}" class="align-items-center btn btn-theme">
                                    <i data-feather="plus-square"></i>Add New
                                </a>
                            </form>
                        </div>

                        @if (session('edit-category'))
                            <div class="alert alert-success">{{ session('edit-category') }}</div>
                        @endif

                        @if (session('delete-category'))
                            <div class="alert alert-secondary">{{ session('delete-category') }}</div>
                        @endif

                        <div class="table-responsive category-table">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Slug</th>
                                        <th>Time</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

                                            <td>{{ $category->category_name }}</td>

                                            <td>
                                                <div class="table-image">
                                                    <img src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </td>

                                            <td>{{ $category->category_slug }}</td>

                                            <td>{{ $category->created_at->diffForHumans() }}</td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="" class="btn btn-sm btn-primary">
                                                            Show
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{ route('category.edit', $category->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-secondary">Delete</button>
                                                        </form>
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
    <!-- All User Table Ends-->
@endsection
