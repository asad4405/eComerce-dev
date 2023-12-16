@extends('layouts.backend_master')
@section('content')
    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xxl-8 col-lg-10 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Add Size</h5>
                                </div>

                                @if (session('add-size'))
                                    <div class="alert alert-success">{{ session('add-size') }}</div>
                                @endif
                                @if (session('error-size'))
                                    <div class="alert alert-secondary">{{ session('error-size') }}</div>
                                @endif

                                <form class="theme-form theme-form-2 mega-form" action="{{ route('size.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-4 row align-items-start">
                                        <label class="col-sm-3 col-form-label form-label-title">
                                            Size Name</label>
                                        <div class="col-sm-9">
                                            <div class="row g-sm-4 g-3">
                                                <div class="col-sm-10 col-9">
                                                    <input type="text" placeholder="Size Name" id="size"
                                                        name="size_name">
                                                    @error('size_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-xxl-4">
                                                    <button class="btn text-white theme-bg-color">Add
                                                        new Size</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Add Color</h5>
                                </div>

                                @if (session('add-color'))
                                    <div class="alert alert-success">{{ session('add-color') }}</div>
                                @endif
                                @if (session('error-color'))
                                    <div class="alert alert-secondary">{{ session('error-color') }}</div>
                                @endif

                                <form class="theme-form theme-form-2 mega-form" action="{{ route('color.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-4 row align-items-start">
                                        <label class="col-sm-3 col-form-label form-label-title">
                                            Color Name</label>
                                        <div class="col-sm-9">
                                            <div class="row g-sm-4 g-3">
                                                <div class="col-sm-10 col-9">
                                                    <input type="text" placeholder="Color Name" id="color"
                                                        name="color_name">
                                                    @error('color_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                {{-- <div class="col-sm-2 col-3">
                                                    <button type="submit" class="btn text-danger h-100 w-100">Remove</button>
                                                </div> --}}

                                                <div class="col-xxl-4">
                                                    <button class="btn text-white theme-bg-color">Add
                                                        new Color</button>
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
@section('footer_scripts')
    <script>
        $("#size").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input,
                };
            },
        });
    </script>
    <script>
        $("#color").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input,
                };
            },
        });
    </script>
@endsection
