@extends('layouts.admin.default')

@section('title','Products')

@include('layouts.css_and_js.table')

@section('content-header')
    <h1>
    	<b>Produk</b>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                	<a href="{{ route('products.create') }}" class="btn btn-flat btn-sm btn-primary">+ Tambah</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$dt->id}}</td>
                            <td>
                            	<img src="{{ asset('img/'.$dt->image) }}" style="width: 50px;">
                            </td>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->description}}</td>
                            <td>
                            	<a class="btn btn-flat btn-xs btn-success" href="{{ route('products.show',$dt->id) }}">Detail</a>
                            </td>
                            <td>
                            	<form role="form" method="POST" action="{{ route('products.destroy',$dt->id) }}">
				                	@csrf
				                    @method('DELETE')
				                    <button class="btn btn-flat btn-xs btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini: {{ $dt->nama }} ?')">Delete</button>
				                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop