@extends('layouts.app')

@section('title', 'Add order')

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
                            <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" id="form-fields">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Client<strong
                                                        style="color:red;">(*)</strong></label>
                                                <select type="text" class="form-control select2 mb-8 lh-base" name="client"
                                                    value="{{ old('client') }}">
                                                    <option value="-1" class="lh-base">Enter the client</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}
                                                            ({{ $client->document }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <table class="table">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Subtotal</th>
      <th scope="col">
      <div class="col-6">
                                            <input type="hidden" class="form-control" name="status" value="1">
                                            <input type="hidden" class="form-control" name="registered_by"
                                                value="{{ Auth::user()->id }}">

                                            <span id="add-field-button" class="form-control btn btn-primary">
                                                Add product
                                            </span>
                                        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"> <select class=" select2 mb-12"  name="product_id[]">
                                                <option value="-1">Please select a product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                        (${{ $product->price }})
                                                    </option>
                                                @endforeach
                                            </select></th>
    <th style="width:50%"><input type="number" class="form-control" name="quantity[]" value="1"> </th>
     
  </tbody>
</table>


                                    

                                    <div class="row mt-2" data-details-field=true>
                                        <div class="col-12">
                                           

                                            
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-2 col-xs-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-block btn-flat">Register</button>
                                        </div>
                                        <div class="col-lg-2 col-xs-4">
                                            <a href="{{ route('clients.index') }}"
                                                class="btn btn-danger btn-block btn-flat">Back</a>
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
@push('scripts')
<script>
        fields = document.querySelector("#form-fields")
        addButton = document.querySelector("#add-field-button")

        addButton.addEventListener("click", () => {
            elem = createRowWithFields()
            fields.appendChild(elem)
        })

        function createRowWithFields() {
            return document.querySelector("[data-details-field=true]").cloneNode(true);
        }

       ;
    </script>

<script>
 $(document).ready(function() {
    $('.select2').select2();
   
})

</script>
@endpush