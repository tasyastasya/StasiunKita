<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   

    <div class="container py-12">

<div class="card shadow">
    <div class="card-header">
        <h3 class="card-title">Data</h3>
    </div>
    <div class="card-body">
    <div class="row">
        <div class="col">
        <div class="alert alert-primary" role="alert">
         <h4><i class="fa-solid fa-location-dot"></i> Total Points : </h4>
         <p style="font-size: 30px">{{$total_points}}</p>
        </div>
        </div>
        <div class="col">
        <div class="alert alert-success" role="alert">
         <h4><i class="fa-solid fa-chart-line"></i> Total Polylines : </h4>
         <p style="font-size: 30px">{{$total_polylines}}</p>
        </div>
        </div>
        <div class="col">
        <div class="alert alert-danger" role="alert">
         <h4><i class="fa-solid fa-shapes"></i> Total Polygons : </h4>
         <p style="font-size: 30px">{{$total_polygons}}</p>
        </div>
        </div>
    </div>
    <hr>
    <p>Anda Login Sebagai <b>{{ Auth::user()->name }}</b> dengan email
<i>{{Auth::user()->email}}</i></p>
</div>
</div>
</x-app-layout>
