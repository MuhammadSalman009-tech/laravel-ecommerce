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
                            <h3 class="box-title">Sub Categories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <div class="modal fade"
                                                id="SubCategory-delete-modal-{{ $subcategory->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Are sure you want to delete
                                                                {{ $subcategory->name }}?</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-rounded btn-danger"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button"
                                                                class="btn btn-rounded btn-primary float-right"
                                                                onclick="event.preventDefault();document.getElementById('delete-SubCategory-form-{{ $subcategory->id }}').submit();">Yes</button>
                                                            <form id="delete-SubCategory-form-{{ $subcategory->id }}"
                                                                action="{{ route('subcategories.destroy', $subcategory->id) }}"
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
                                                <td>{{ $subcategory->id }}</td>
                                                <td>{{ $subcategory['category']['name'] }}</td>
                                                <td>{{ $subcategory->name }}</td>
                                                <td>
                                                    <a href="{{ route('subcategories.edit', $subcategory->id) }}"
                                                        class="btn btn-sm btn-primary mr-2">Edit</a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#SubCategory-delete-modal-{{ $subcategory->id }}">Delete</button>
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
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Add SubCategory</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" action="{{ route('subcategories.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>SubCategory Name</label>
                                    <input type="text" class="form-control" placeholder="SubCategory Name"
                                        name="subCategoryName">
                                    @error('subCategoryName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-rounded btn-info btn-outline">
                                    <i class="ti-save-alt"></i> Add SubCategory
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
