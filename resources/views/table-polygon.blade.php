@extends('layouts.template')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h3> Data Polygon </h3>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped" id="example">
<thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Create at</th>
        <th>Update at</th>

    </tr>
</thead>
<tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($polygons as $p)
                        @php
                            $geometry = json_decode($p->geom);
                        @endphp
                        <tr>
                            <td>{{$no++ }}</td>
                            <td>{{$p->name }}</td>
                            <td>{{$p->description}}</td>
                            <td>{{ $p->created_at ? $p->created_at->format('D, d-m-Y, H:i:s') : now()->format('D, d-m-Y, H:i:s') }}</td>
                            <td>{{ $p->update_at ? $p->update_at->format('D, d-m-Y, H:i:s') : now()->format('D, d-m-Y, H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('styles')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('script')

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#example');
</script>
@endsection
