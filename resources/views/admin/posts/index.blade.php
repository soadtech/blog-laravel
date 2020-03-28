@extends('admin.layout')

@section('header')
    <h1>
        Todos los posts
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@endsection

@section('content')
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Publicaciones</h3>
              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Crear publicacion</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo</th>
                  <th>Extracto</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->excerpt}}</td>
                            <td>
                                <a href="#" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

@stop

<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.posts.store')}}">
            {{csrf_field()}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                {{-- <label for="">Titulo del post <small>(obligatorio)</small></label> --}}
                 <input name="title" type="text" class="form-control" placeholder="Ingresa el titulo" value={{old('title')}}>
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Crear publicacion</button>
        </div>
      </div>
    </div>
  </form>
</div> 