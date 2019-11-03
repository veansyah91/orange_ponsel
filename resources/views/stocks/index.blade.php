@extends('layouts.main')


@section('content')

<div class="container-fluid">
    <h2>Stock</h2>
</div>

<hr>

<div class="container-fluid">
  <div class="container">
    <div class="row">
        <div class="col-12">
          <table class="table-responsive mt-3" id="dataTableStock" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Supplier</th>
                <th scope="col">Item</th>
                <th scope="col">Kode/IMEI</th>
                <th scope="col">Harga Modal</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($stocks as $stock)
              <tr class="stock">
                <td>{{date('d F Y',strtotime($stock->created_at))}}</td>
                <td>{{$stock->supplier->name}}</td>
                <td>{{$stock->item->brand->id}} {{$stock->item->tipe}}</td>
                <td>{{$stock->kode}}</td>
                <td>{{$stock->modal}}</td>
                <td>{{$stock->jml}}</td>
                <td>
                  <a href="" class="btn btn-success btn-sm">Edit</a>
                  <a href="#" class="btn btn-danger btn-sm stock-delete" prop="stock" url="stock" delete-id="{{$stock->id}}">hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>

</script>

@endsection
