@extends('layouts.main')

@section('content')

<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h2>Input Stock</h2>
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
        <div class="col-12">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="supplier">Pemasok</label>
                <select class="custom-select" id="supplier" name="supplier" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <option selected><-- Pilih Pemasok --></option>
                    @foreach ($suppliers as $supplier)
                      <option value="{{$supplier->name}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="item">Item</label>
                <select class="custom-select" id="item" name="item" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <option selected><-- Pilih Item --></option>
                    @foreach ($items as $item)
                      <option value="{{$item->tipe}}">{{$item->tipe}} ({{$item->brand->name}})</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="code">Kode/IMEI</label>
                  <input type="text" class="form-control" id="kode" name="kode" placeholder="kode/imei">
              </div>
              <div class="form-group col-md-6">
                  <label for="modal">Harga Modal</label>
                  <input type="text" class="form-control" id="modal" name="modal" placeholder="harga modal">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-6"></div>
              <div class="form-group col-md-2" class="text-right">
                <label for="modal" >Jumlah</label>
              </div>
              <div class="form-group col-md-2">
                <input type="number" class="form-control" id="jml" name="jml" placeholder="jumlah" value="1">
              </div>
              <div class="form-group col-md-2 ">
                <button type="button" class="btn btn-primary text-right" id="tambah">Tambah</button>
              </div>
            </div>

            <hr>

            <form action="/stock/create" method="POST">
              @csrf
              <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Data</label>
                <div class="col-sm-10">
                    <input type="text" id="jumlah" name="jumlah" readonly>
                </div>
              </div>
              <button class="btn btn-primary align-text-right mt-1" type="submit">Simpan</button>
              <table class="table mt-2" id="mytable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Pemasok</th>
                    <th scope="col">Item</th>
                    <th scope="col">Kode/IMEI</th>
                    <th scope="col">Harga Modal</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </form>
        </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function(){
        var a=0;
        $("#tambah").click(function(){
          let kode = $("#kode").val();
          let supplier = $("#supplier").val();
          let item = $("#item").val();
          let modal = $("#modal").val();
          let jml = $("#jml").val();

          a++;
          $("#jumlah").val(a);
          $("#mytable > tbody")
          .append(`<tr>
                      <td>
                        <input type="text" class="center" name="supplier[`+a+`]" id="supplier[`+a+`]" value="`+supplier+`" readonly>
                      </td>
                      <td>
                        <input type="text" class="center" name="item[`+a+`]" id="item[`+a+`]" value="`+item+`" readonly>
                      </td>
                      <td>
                        <input type="text" class="center" name="kode[`+a+`]" id="kode[`+a+`]" value="`+kode+`">
                      </td>
                      <td>
                        <input type="text" class="center" name="modal[`+a+`]" id="modal[`+a+`]" value="`+modal+`">
                      </td>
                      <td>
                        <input type="text" class="center" name="jml[`+a+`]" id="jml[`+a+`]" value="`+jml+`">
                      </td>
                    </tr>`);
          });
    })
</script>

@endsection
