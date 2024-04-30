@extends('admin.layout_master')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Add product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        </br>
                        @include('admin.notification')
                        <!-- General Form Elements -->
                        <form id="create_product_form">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select id="type" class="form-select" aria-label="Default select example">
                                        @foreach ($product_types as $key => $product_type)
                                        <option {{ $key == 0 ? "selected" : "" }} value="{{ $product_type->id }}">{{
                                            $product_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" id="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input name="price" id="price" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input name="quantity" id="quantity" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="image[]" multiple>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <div class="card">
                                        <div id="description" class="quill-editor-default">
                                            <p>Hello World!</p>
                                            <p>This is Quill <strong>default</strong> editor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Infomation</label>
                                <div class="col-sm-10">
                                    <div class="card">
                                        <div id="infomation" class="quill-editor-default_1">
                                            <p>Hello World!</p>
                                            <p>This is Quill <strong>default</strong> editor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection

@push('scripts')
<script>
    document.getElementById('create_product_form').addEventListener('submit', function(event) {
       event.preventDefault(); // Ngăn chặn form submit mặc định

        // Lấy giá trị từ các trường nhập liệu trong form
        //var type = document.getElementById('type').value;
        var name = document.getElementById('name').value;
        // var price = document.getElementById('price').value;
        // var quantity = document.getElementById('quantity').value;
        // var description = document.querySelector('#description .ql-editor').innerHTML;
        // var information = document.querySelector('#infomation .ql-editor').innerHTML;
        console.log(name);



        // // Thực hiện các hành động khác như gửi dữ liệu đến server
        // // Ví dụ: sử dụng fetch API để gửi dữ liệu đến endpoint
        // fetch('/api/products', {
        //     method: 'POST',
        //     body: JSON.stringify({
        //         name: productName,
        //         description: productDescription,
        //         price: productPrice
        //     }),
        //     headers: {
        //         'Content-Type': 'application/json'
        //     }
        // }).then(response => {
        //     // Xử lý phản hồi từ server
        // }).catch(error => {
        //     console.error('Error:', error);
        // });
    });
</script>

@endpush
