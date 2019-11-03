@extends('layouts.main')


@section('content')

<div class="container-fluid">
    <h2>Master</h2>
</div>

<hr>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <h5 class="card-header">Pemasok</h5>
                <div class="card-body">
                    <button type="button" data-toggle="modal" data-target="#inputPemasokModel" class="btn btn-primary btn-sm">Tambah Pemasok</button>
                    <hr>
                    <table class="table table-borderless" id="dataTableSupplier">
                        <thead class="thead-dark">
                          <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>
                                    <a href="/master/supplier/{{$supplier->id}}/edit" class="btn btn-primary btn-sm">edit</a>                                    
                                    <a href="#" class="btn btn-danger btn-sm supplier-delete" prop="supplier" url="master" delete-id="{{$supplier->id}}">hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="col-sm">
            <div class="card">
                <h5 class="card-header">Pelanggan</h5>
                <div class="card-body">
                    <button type="button" data-toggle="modal" data-target="#inputPelangganModel" class="btn btn-primary btn-sm delete">Tambah Pelanggan</button>
                    <hr>
                    <table class="table table-borderless" id="dataTableCustomer">
                        <thead class="thead-dark">
                          <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>
                                    <a href="/master/customer/{{$customer->id}}/edit" class="btn btn-primary btn-sm">edit</a>                             
                                    <a href="#" class="btn btn-danger btn-sm customer-delete" prop="customer" url="master" delete-id="{{$customer->id}}">hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-3">
  <div class="row">
      <div class="col-6">
        <div class="card">
            <h5 class="card-header">Kategori</h5>
            <div class="card-body">
                <button type="button" data-toggle="modal" data-target="#inputKategoriModel" class="btn btn-primary btn-sm">Tambah Kategori</button>
                <hr>
                <table class="table table-borderless" id="dataTableCategory">
                  <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>                            
                      @foreach ($categories as $category)
                      <tr>
                          <td>{{ $category->name }}</td>
                          <td>                                   
                              <a href="#" class="btn btn-danger btn-sm category-delete" prop="category" url="master" delete-id="{{$category->id}}">hapus</a>
                          </td>
                      </tr>
                      @endforeach                            
                  </tbody>
                </table>
            </div>
        </div>
      </div>      

      <div class="col-6">
          <div class="card">
              <h5 class="card-header">Brand</h5>
              <div class="card-body">
                  <button type="button" data-toggle="modal" data-target="#inputBrandModel" class="btn btn-primary btn-sm">Tambah Brand</button>
                  <hr>
                  <table class="table table-borderless" id="dataTableBrand">
                      <thead class="thead-dark">
                          <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>                             
                          @foreach ($brands as $brand)
                          <tr>
                              <td>{{ $brand->name }}</td>
                              <td>                  
                                  <a href="#" class="btn btn-danger btn-sm brand-delete" prop="brand" url="master" delete-id="{{$brand->id}}">hapus</a>
                              </td>
                          </tr>
                          @endforeach                                                                                          
                      </tbody>
                  </table>                     
              </div>
          </div>
      </div>      
  </div>
</div>

<div class="container-fluid mt-3">
    <div class="row">  
        <div class="col-12">
          <div class="card">
              <h5 class="card-header">Item</h5>
              <div class="card-body">
                  <button type="button" data-toggle="modal" data-target="#inputItemModel" class="btn btn-primary btn-sm">Tambah Item</button>
                  <hr>
                  <table class="table table-borderless" id="dataTableItem">
                    <thead class="thead-dark">
                      <tr>
                          <th scope="col">Brand</th>
                          <th scope="col">Tipe</th>
                          <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                            
                        @foreach ($items as $item)
                        <tr>
                            <td>
                              {{ $item->brand->name }}</td>
                            <td>{{ $item->tipe }}</td>
                            <td>
                                <a href="/master/item/{{$item->id}}" class="btn btn-success btn-sm">detail</a>                                    
                                <a href="#" class="btn btn-danger btn-sm item-delete" prop="item" url="master" delete-id="{{$item->id}}">hapus</a>
                            </td>
                        </tr>
                        @endforeach                            
                    </tbody>
                  </table>
              </div>
          </div>
        </div>      
    </div>
  </div>

<!-- Modal Input Pemasok-->
<div class="modal fade" id="inputPemasokModel" tabindex="-1" role="dialog" aria-labelledby="inputPemasokModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inputPemasokModelLabel">Input Pemasok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/master/supplier/create">
                @csrf
                  <div class="form-group">
                    <label for="name">Nama Toko Pemasok</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('nama')}}" class="@error('nama') is-invalid @enderror">
                    @error('name')
                      <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="cs">Telepon CS</label>
                    <input type="text" class="form-control" id="cs" name="cs" >
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                 </div>
                  <div class="form-group">
                      <label for="sales">Nama Sales</label>
                      <input type="text" class="form-control" id="sales" name="sales" >
                  </div>
                  <div class="form-group">
                      <label for="hp">Np. HP</label>
                      <input type="text" class="form-control" id="hp" name="hp" >
                  </div>
        
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                  
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Input Pelanggan-->
  <div class="modal fade" id="inputPelangganModel" tabindex="-1" role="dialog" aria-labelledby="inputPelangganModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inputPelangganModelLabel">Input Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/master/customer/create">
                @csrf
                  <div class="form-group">
                    <label for="name">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('nama')}}" class="@error('nama') is-invalid @enderror">
                    @error('name')
                      <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="hp">Telepon</label>
                    <input type="text" class="form-control" id="hp" name="hp" >
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                  </div>
    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>                  
              </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Input Kategori-->
<div class="modal fade" id="inputKategoriModel" tabindex="-1" role="dialog" aria-labelledby="inputKategoriModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputKategoriModelLabel">Input Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="/master/category/create">
              @csrf
                  <input type="text" class="form-control" id="name" name="name" value="{{old('nama')}}" class="@error('nama') is-invalid @enderror">
                  @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
  
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>                  
            </form>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Input Brand-->
<div class="modal fade" id="inputBrandModel" tabindex="-1" role="dialog" aria-labelledby="inputBrandModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputBrandModelLabel">Input Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="/master/brand/create">
            @csrf
            <div class="form-group">              
              <input type="text" class="form-control" id="name" name="name" value="{{old('nama')}}" class="@error('nama') is-invalid @enderror">
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
    
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>                  
          </form>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Input Item-->
  <div class="modal fade" id="inputItemModel" tabindex="-1" role="dialog" aria-labelledby="inputItemModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="inputItemModelLabel">Input Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="/master/item/create" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <div class="form-group">
                      <label for=category">Kategori</label>
                      <select class="custom-select form-control" id="category" name="category"  onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                          <option selected><-- Pilih Kategori --></option>
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach                          
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="hp">Brand</label>
                      <select class="custom-select" id="brand" name="brand">
                          <option selected><-- Pilih Brand --></option>
                          @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>                              
                          @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">      
                    <label for="tipe">Tipe</label>        
                    <input type="text" class="form-control" id="tipe" name="tipe" value="{{old('tipe')}}" class="@error('nama') is-invalid @enderror">
                    @error('tipe')
                      <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">      
                    <label for="description">Deskripsi</label>        
                    <textarea class="form-control" id="description" name="description" cols="30" rows="5"></textarea>                  
                    @error('description')
                      <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
        
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>                  
              </form>
          </div>
        </div>
      </div>
  </div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
      $(".supplier-delete").click(function(){
        let delete_id = $(this).attr('delete-id');
        let prop = $(this).attr('prop');
        let url = $(this).attr('url');
        deleteData(delete_id,prop,url);
      });
      $(".customer-delete").click(function(){
        let delete_id = $(this).attr('delete-id');
        let prop = $(this).attr('prop');
        let url = $(this).attr('url');
        deleteData(delete_id,prop,url);
      });
      $(".category-delete").click(function(){
        let delete_id = $(this).attr('delete-id');
        let prop = $(this).attr('prop');
        let url = $(this).attr('url');
        deleteData(delete_id,prop,url);
      });
      $(".brand-delete").click(function(){
        let delete_id = $(this).attr('delete-id');
        let prop = $(this).attr('prop');
        let url = $(this).attr('url');
        deleteData(delete_id,prop,url);
      });
      $(".item-delete").click(function(){
        let delete_id = $(this).attr('delete-id');
        let prop = $(this).attr('prop');
        let url = $(this).attr('url');
        deleteData(delete_id,prop,url);
      });
    });

</script>
@endsection