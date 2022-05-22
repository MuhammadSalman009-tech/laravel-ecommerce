@extends('admin.layouts.app')
@push('admin-styles')
@endpush
@section('admin-content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Update Category</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" action="{{ route('categories.update', $category->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" placeholder="Category Name"
                                        name="categoryName" value="{{ $category->name }}">
                                    @error('categoryName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Category Icon</label>
                                    <input type="text" class="form-control" placeholder="fas fa-user" name="categoryIcon"
                                        value="{{ $category->icon }}">
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
                                    <i class="ti-save-alt"></i> Update Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 col-12">

                </div>
            </div>
        </section>
    </div>
@endsection
