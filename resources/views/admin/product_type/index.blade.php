@extends('admin.layout_master')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Product type</li>
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
                        <a href="{{ route('product_type.create') }}"><button type="button" class="btn btn-primary">Add type</button></a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_types as $key => $product_type)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product_type->name }}</td>
                                    <td>
                                        <a href="{{ route('product_type.edit',$product_type->id) }}"><i class="ri-edit-2-fill"></i></a>
                                        <form action="{{ route('product_type.destroy', $product_type->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-icon btn-hover btn-sm btn-rounded btnDelete">
                                                <i class="ri-delete-bin-2-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@endsection
