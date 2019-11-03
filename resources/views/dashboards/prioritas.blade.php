@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h2>Dashboard</h2>
</div>

<hr>

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h5>Atur Prioritas Brand</h5>
      </div>
    </div>

    <div class="row">
      <div class="col-4  mt-3">
        @if ($priorities->isEmpty())
          <form action="/dashboard/stockpriority" method="post">
        @else
          <form action="/dashboard/stockpriority" method="post">
          @method('patch')
        @endif
          @csrf
          <table class="table">
            <tbody>
              <tr>
                <td>1</td>
                <td> <select class="custom-select" id="brand" name="brand[0]">
                    @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select> </td>
              </tr>
              <tr>
                <td>2</td>
                <td> <select class="custom-select" id="brand" name="brand[1]">
                    @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select> </td>
              </tr>
              <tr>
                <td>3</td>
                <td> <select class="custom-select" id="brand" name="brand[2]">
                    @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select> </td>
              </tr>
              <tr>
                <td>4</td>
                <td> <select class="custom-select" id="brand" name="brand[3]">
                    @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select> </td>
              </tr>
            </tbody>
          </table>
          <button type="submit" name="button" class="btn btn-primary float-right">Simpan</button>
        </form>

      </div>
    </div>


</div>


@endsection
