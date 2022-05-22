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
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Update SubCategory</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" action="{{ route('subcategories.update', $subcategory->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
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
                                        name="subCategoryName" value="{{ $subcategory->name }}">
                                    @error('subCategoryName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-rounded btn-info btn-outline">
                                    <i class="ti-save-alt"></i> Update SubCategory
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
