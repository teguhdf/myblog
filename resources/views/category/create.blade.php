@extends('includes.head')

@section('title','Create Category')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Halaman Buat Kategory</h1>
        </div><hr>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <form action="{{route('category.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Buat katgory baru..">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
            <br>
            <div class="text-center">
                <h4><b>Semua Kategori</b></h4>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Tanggal Edit</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($category as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{date('j F Y', strtotime($item->updated_at))}}</td>
                            <td><a href="#modalEdit" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#modalHapus" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                        </tr>

                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- modal Edit--}}
    <div class="modal fade" id="modalEdit" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.update', $item->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{$item->name}}">
                        </div>
                        <input type="submit"  class="btn btn-primary" />    
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal Hapus--}}
    <div class="modal fade" id="modalHapus" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Category</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.destroy', $item->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <div class="form-group">
                            <h4>Apa anda yakin akan menghapus kategori {{$item->name}} ?</h4>
                        </div>
                        <button type="submit" class="btn btn-danger">Hapus</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection