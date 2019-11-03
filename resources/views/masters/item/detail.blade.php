@extends('layouts.main')


@section('content')

<div class="container-fluid">
    <h2>Detail Item</h2>
</div>

<hr>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card mb-3" style="max-width: 300px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src=" {{$item->getImage()}} " class="card-img">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"> {{$item->brand->name}} {{$item->tipe}} </h5>
                          <p class="card-text"> {{$item->description}} </p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
