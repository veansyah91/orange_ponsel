@extends('layouts.main')

@section('content')

<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h2>Kasir</h2>
      </div>
      <div class="col-6" >
          <h4 class="text-right text-primary" id="tanggal">{{date('d M Y')}}</h4>
      </div>
    </div>
  </div>
</div>

<hr>

<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-4">          
        <div class="form-group row">
          <label for="name" class="col-sm-5 col-form-label">No Nota</label>
          <div class="col-sm-7">
          <input type="text" class="form-control" id="name" value="{{getDateToString()}}" readonly>
          </div>
        </div>          
      </div>
      <div class="col-md-4 offset-md-4">        
          <div class="form-group row">
            <label for="name" class="col-sm-5 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-7">
              <select class="custom-select" id="customer" name="customer" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                <option selected><-- Pilih Pelanggan --></option>
                @foreach ($customers as $customer)
                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
            </div>
          </div>            
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function(){

    })
</script>

@endsection
