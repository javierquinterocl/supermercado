@extends('layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Productos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Productos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @include('layouts.partial.msg')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabla de productos</h3>
                                <a href="{{ route('products.create') }}" class="btn btn-primary float-right"
                                    title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Price</th>
                                            <th>Imagen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->amount }}</td>
                                                <td>{{ $product->price }}</td>

                                                <td>
                                                    @if ($product->image != null)
                                                        <p><img class="img-responsive img-thumbnail"
                                                                src="{{ asset('uploads/products/' . $product->image) }}"
                                                                style="height: 70px; width: 70px;" alt=""></p>
                                                    @elseif ($product->image == null)
                                                    @endif
                                                </td>
                                                <td>
                                                    <input data-id="{{ $product->id }}" class="toggle-class"
                                                        type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                        data-toggle="toggle" data-on="Activo" data-off="Inactivo"
                                                        {{ $product->status ? 'checked' : '' }}>
                                                </td>

                                                <td>


                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('products.edit', $product->id) }}" title="Edit"><i
                                                            class="fas fa-pencil-alt"></i></a>

                                                    <form class="d-inline delete-form"
                                                        action="{{ route('products.destroy', $product) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class=" btn btn-danger btn-sm"
                                                            title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endsection

                    @push('scripts')


                        <script>
                            $(document).ready(function() {
                                $("example2").DataTable()
                            });
                            $(function() {
                                $('.toggle-class').change(function() {
                                    var estado = $(this).prop('checked') == true ? 1 : 0;
                                    var product_id = $(this).data('id');
                                    $.ajax({
                                        type: "GET",
                                        dataType: "json",
                                        url: 'changeproducturl',
                                        data: {
                                            'status': estado,
                                            'product_id': product_id
                                        },
                                        success: function(data) {
                                            console.log(data.success)
                                        }
                                    });
                                })
                            })
                        </script>

                        <script>
                            $('.delete-form').submit(function(e) {
                                e.preventDefault();
                                Swal.fire({
                                    title: 'Estas seguro?',
                                    text: "Este registro se eliminara definitivamente",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Aceptar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        this.submit();
                                    }
                                })
                            });
                        </script>
                        @if (session('eliminar') == 'ok')
                            <script>
                                Swal.fire(
                                    'Eliminado',
                                    'El registro ha sido eliminado exitosamente',
                                    'success'
                                )
                            </script>
                        @endif
                    @endpush
