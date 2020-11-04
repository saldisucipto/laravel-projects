@extends('layouts.master')
@section('content')
<div class="container pt-5">
    @if (Session::has('sukses'))
    <div class="m-5">
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Berhasil</h4>
            <p>{{Session::get('sukses')}}</p>
        </div>
    </div>

    @endif

    <div class="row">
        <div class="hidden-md-down col-md-3">
        </div>
        <div class="col-md-6">
            <h3 class="text-center text-bold pb-2">My Todo Apps With Laravel <br> <i
                    class="text-info text-center fas fa-tasks pt-1 fa-2x text-bold"></i></h3>
            <h6 class="m-2 text-primary" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus"></i> |
                <b>Create New Task</b></h6>
            @if (count($data) > 0)
            @foreach ($data as $item)
            <div class="card m-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <input id="id" type="hidden" value="{{$item->id}}">
                            <b>{{$item->text}}</b>
                            <span class="badge badge-info text-white">{{$item->due}}</span>
                        </div>
                        <div class="col-sm-6">
                            {{$item->body}}
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col"><button style="border-radius:50%;" type="button" class="btn btn-sm bg-primary"
                                        data-toggle="modal" data-target="#modalshow{{$item->id}}"><i
                                            class="fas fa-eye text-white"></i></button></div>
                                <div class="col"><button style="border-radius:50%;" type="button" class="btn btn-sm bg-danger"
                                    data-toggle="modal" data-target="#modaldel{{$item->id}}"><i
                                        class="fas fa-trash fa-circle fa-1x text-white"></i></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modaldel{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="text-white"><b>DELETE DATA !</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center"><h5 class="text-center"><b> <i class="fas fa-trash text-danger fa-4x"></i></b></h5></div>
                        <div class="text-center">
                          <h5>Yakin Akan Mengahpus File Berikut ?</h5>
                        </div>
                        <div class="text-center">
                          <b>{{$item->text}}</b>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-6">
                                <div class="text-right">
                                    <a href="/todo/delete/{{$item->id}}" class="btn btn-sm btn-danger">Yaudah</a>
                                </div>
                            </div>
                        <div class="col-md-6"> <a href="#" class="btn btn-sm btn-primary text-left"  data-dismiss="modal">Gajadi</a></div>
                        </div>
                        </div>
                        <div class="modal-footer">
                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalshow{{$item->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-center text-uppercase"><b>{{$item->text}}</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="text-center"><h5 class="text-center"><b>{{$item->text}}</b></h5></div>
                        <div class="text-left">
                          {{$item->body}}
                        </div>
                        <div class="text-left">
                          {{$item->due}}
                        </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-md-3">
          {{-- <a href="/todo/print/todo" id="print" class="btn btn-md btn-primary"><i class="fas fa-print"></i> PRINT</a> --}}
          <button onclick="print_current_page()" class="btn btn-sm btn-primary" ><i class="fas fa-print"></i> PRINT</button>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaleditLabel">Create Todo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/todo/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="text-right" for="">Title</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="text" id="text"
                                        placeholder="Mau Ngerjain Apa Nih..">
                                </div>
                            </div>
                            <div class="form-group pt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="text-right" for="">Keterangan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="body" id="body" cols="30"
                                            rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-right">Tanggal</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="due" id="due">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
