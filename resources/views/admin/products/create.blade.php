@extends('admin.layouts.app')
@push('admin-styles')
    <style>
        .bootstrap-tagsinput {
            display: block !important;
        }

    </style>
@endpush
@section('admin-content')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Add Product</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Product Name<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" placeholder="Product Name"
                                                name="productName" id="productName">
                                            @error('productName')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description<span class="text-danger"> *</span></label>
                                            <textarea rows="5" class="form-control" placeholder=" Product Short Description..." name="shortDescription"
                                                id="shortDescription"></textarea>
                                            @error('shortDescription')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Thumbnail<span class="text-danger"> *</span></label>
                                            <input type="file" name="file" class="form-control" required=""
                                                name="productThumbnail" id="productThumbnail">
                                            @error('productThumbnail')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Images<span class="text-danger"> *</span></label>
                                            <input type="file" name="file" class="form-control" required=""
                                                name="productImages" id="productImages">
                                            @error('productImages')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Category<span class="text-danger"> *</span></label>
                                            <select class="form-control" name="productCategory" id="productCategory">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('productCategory')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select SubCategory<span class="text-danger"> *</span></label>
                                            <select class="form-control" name="productSubCategory"
                                                id="productSubCategory">
                                                <option selected disabled>Select SubCategory</option>
                                            </select>
                                            @error('productSubCategory')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Quantity<span class="text-danger"> *</span></label>
                                            <input type="number" class="form-control" name="productQuantity"
                                                id="productQuantity">
                                            @error('productQuantity')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Code<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" placeholder="Product Code"
                                                name="productCode" id="productCode">
                                            @error('productCode')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selling Price<span class="text-danger"> *</span></label>
                                            <input type="number" class="form-control" name="productPrice"
                                                id="productPrice">
                                            @error('productPrice')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Discount Price</label>
                                            <input type="number" class="form-control" name="productPrice"
                                                id="productPrice">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Color</label>
                                            <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput"
                                                placeholder="Add Color" name="productColor" id="productColor" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Size</label>
                                            <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput"
                                                placeholder="Add Size" name="productSize" id="productSize" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Product Tags<span class="text-danger"> *</span></label>
                                        <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput"
                                            placeholder="Add Tags" name="productTags" id="productTags" />
                                        @error('productTags')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <label>Long Description<span class="text-danger"> *</span></label>
                                        <textarea id="editor1" name="longDescription" rows="10" cols="80">
                                            Product Long Description...
                                        </textarea>
                                        @error('longDescription')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" class="filled-in chk-col-info" name="hotDeals"
                                            id="hotDeals" />
                                        <label for="hotDeals">Hot Deals</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" class="filled-in chk-col-info" name="specialOffer"
                                            id="specialOffer" />
                                        <label for="specialOffer">Special Offer</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" class="filled-in chk-col-info" name="featured"
                                            id="featured" />
                                        <label for="featured">Featured</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" class="filled-in chk-col-info" name="specialDeals"
                                            id="specialDeals" />
                                        <label for="specialDeals">Special Deals</label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                    <i class="ti-trash"></i> Cancel
                                </button>
                                <input type="submit" class="btn btn-rounded btn-primary btn-outline" value="Add Product" />
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#productCategory').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('admin/subcategories/ajax') }}" + "/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(result) {
                            console.log(result);
                            var d = $("select[name='productSubCategory']").empty();
                            $.each(result, function(key, value) {
                                $("select[name='productSubCategory']").append(`
                            <option value="` + value.id + `">` + value.name + `</option>
                            `)
                            })
                        }
                    });
                } else {
                    alert("could not fetch subcatgories")
                }
            });
        });
    </script>
@endsection
