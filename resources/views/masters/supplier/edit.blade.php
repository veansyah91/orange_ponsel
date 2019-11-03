@extends('layouts.main')


@section('content')

<div class="container-fluid">
    <h2>Input Pemasok</h2>
</div>

<hr>

<div class="container-fluid">
  <div class="container">
    <div class="row">
    <div class="col-8">
        <form method="post" action="/master/supplier/{{$supplier->id}}">
          @method('patch')
          @csrf
            <div class="form-group">
              <label for="name">Nama Toko Pemasok</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$supplier->name}}" class="@error('nama') is-invalid @enderror">
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="cs">Telepon CS</label>
              <input type="text" class="form-control" id="cs" name="cs" value="{{$supplier->cs}}">
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea class="form-control" id="address" name="address" rows="3" value="{{$supplier->address}}"></textarea>
           </div>
            <div class="form-group">
                <label for="sales">Nama Sales</label>
                <input type="text" class="form-control" id="sales" name="sales" value="{{$supplier->sales}}" >
            </div>
            <div class="form-group">
                <label for="hp">Np. HP</label>
                <input type="text" class="form-control" id="hp" name="hp" value="{{$supplier->hp}}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection