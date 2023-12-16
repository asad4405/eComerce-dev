@extends('layouts.backend_master')
@section('content')
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Colors</h5>
                            <form class="d-inline-flex">
                                <a href="{{ route('attribute.create') }}" class="align-items-center btn btn-theme">
                                    <i data-feather="plus-square"></i>Add New
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive category-table">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Color Name</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($colors as $color)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>


                                            <td>{{ $color->color_name }}</td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="" class="btn btn-sm btn-info">
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

                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Sizes</h5>
                            <form class="d-inline-flex">
                                <a href="{{ route('attribute.create') }}" class="align-items-center btn btn-theme">
                                    <i data-feather="plus-square"></i>Add New
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive category-table">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Size Name</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($sizes as $size)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>


                                            <td>{{ $size->size_name }}</td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="" class="btn btn-sm btn-info">
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
    <!-- All User Table Ends-->
@endsection
