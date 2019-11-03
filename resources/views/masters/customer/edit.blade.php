@extends('layouts.main')


@section('content')

<div class="container-fluid">
    <h2>Input Pelanggan</h2>
</div>

<hr>

<div class="container-fluid">
  <div class="container">
    <div class="row">
    <div class="col-8">
        <form method="post" action="/master/customer/{{$customer->id}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Nama Pelanggan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}" class="@error('nama') is-invalid @enderror">
                    @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
            </div>
            <div class="form-group">
                <label for="hp">Telepon</label>
            <input type="text" class="form-control" id="hp" name="hp" value="{{$customer->hp}}">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3">{{$customer->address}}</textarea>
            </div>
    
                <button type="submit" class="btn btn-primary">Tambah</button>                  
        </form>
      </div>
    </div>
  </div>
</div>

@endsection