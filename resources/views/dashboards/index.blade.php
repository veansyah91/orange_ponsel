@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h2>Dashboard</h2>
</div>
<hr>
<div class="container-fluid">
    <div class="row">
      <div class="col-8">
        <h3>Ready Stock</h3>
        <h7 class="text-danger"><strong>Per {{date('d M Y')}}</strong></h7>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-right">
        <h7 class="">
          <strong>
            <a href="/dashboard/stockpriority" class="btn btn-sm btn-primary">Atur Prioritas BRAND
            </a>
          </strong></h7>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row">
        @foreach ($priorities as $priority)
        <div class="col-sm">
          <div class="card border-dark mb-3" style="max-width: 18rem;">
              <div class="card-header text-dark">
                  <h2>{{$priority->brand->name}}</h2>
              </div>
              <div class="card-body text-dark">
                  <table>
                      <body>
                          <tr>
                              <td><h5 class="card-title">Sisa Stock :</h5></td>
                              <td class="blockquote" align="right"><h3>{{$totals[$loop->index]}}</h3></td>
                          </tr>
                      </body>
                  </table>
              </div>
              @if ($totals[$loop->index] > 0)
                <a class="card-footer text-dark clearfix small z-1" href="{{url('/dashboard/stockpriority/' . $priority->brand->id)}}">
                    <span class="float-left">Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
              @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>

@endsection
