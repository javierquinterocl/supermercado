@extends('layouts.app')

@section('title','Editar Cliente')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('clients.update',$client) }}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $client->name }}">
                                            <label class="control-label">Description <strong style="color:red;">(*)</strong></label>
											<textarea type="text" class="form-control" name="document" placeholder=" Documento " autocomplete="off" value="">{{ $client->document }}</textarea>
                                            <label class="control-label">Document <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="address" placeholder=" Direccion " autocomplete="off" value="{{ $client->address }}">
                                            <label class="control-label">Phone <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="phone" placeholder=" Telefono " autocomplete="off" value="{{ $client->phone }}">   
											<label class="control-label">Email <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="email" placeholder=" Email " autocomplete="off" value="{{ $client->email }}">                                             
                                            <div class="form-group">
                                            <label class="control-label">Img <strong style="color:red;">(*)</strong></label>
                                            <div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group label-floating">
                                        @if ($client->image != null)
                                                        <p><img class="img-responsive img-thumbnail"
                                                                src="{{ asset('uploads/clients/' . $client->image) }}"
                                                                style="height: 70px; width: 70px;" alt=""></p>
                                                    @elseif ($client->image == null)
                                                    @endif
											<label class="control-label">Fotografía</label>
											<input type="file" class="form-control-file" name="image" id="image" >
										</div>
									</div>
								</div>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('clients.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection