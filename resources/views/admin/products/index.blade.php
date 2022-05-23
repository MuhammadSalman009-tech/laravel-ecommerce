@extends('admin.layouts.app')
@push('admin-styles')
@endpush
@section('admin-content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Categories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Category Icon</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <div class="modal fade" id="category-delete-modal-{{ $category->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Are sure you want to delete
                                                                {{ $category->name }}?</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-rounded btn-danger"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button"
                                                                class="btn btn-rounded btn-primary float-right"
                                                                onclick="event.preventDefault();document.getElementById('delete-category-form-{{ $category->id }}').submit();">Yes</button>
                                                            <form id="delete-category-form-{{ $category->id }}"
                                                                action="{{ route('categories.destroy', $category->id) }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td><i class="{{ $category->icon }}"></i></td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-sm btn-primary mr-2">Edit</a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#category-delete-modal-{{ $category->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Add Category</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" placeholder="Category Name"
                                        name="categoryName">
                                    @error('categoryName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Category Icon</label>
                                    <input type="text" class="form-control" placeholder="fas fa-user" name="categoryIcon">
                                    @error('categoryIcon')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-rounded btn-info btn-outline">
                                    <i class="ti-save-alt"></i> Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
