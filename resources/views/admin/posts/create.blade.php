@extends('admin.layout')

@section('header')
    <h1>
        Crear post
        <small>Crea un nuevo articulo para tu blog</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i>Posts</a></li>
        <li class="active">Crear</li>
      </ol>
@endsection

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('admin.posts.store')}}">
            {{csrf_field()}}
            <div class="col-md-8">
                
                <div class="box box-primary">
                    
                        <div class="box-body">
                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                <label for="">Titulo del post <small>(obligatorio)</small></label>
                                <input name="title" type="text" class="form-control" placeholder="Ingresa el titulo" value={{old('title')}}>
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                
                            </div>

                            <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                                <label for="">Contenido del post <small>(obligatorio)</small></label>
                                <textarea rows="10" id="editor" name="body" class="form-control" placeholder="Ingresa el contenido">{{old('body')}}</textarea>
                                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                            </div>

                        </div>
                    
                    
                </div>
            </div><!--COL-MD-8-->

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <!--FECHA-->
                        <div class="form-group">
                            <label>Fecha de publicacion (opcional):</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="published_at" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!--categorias-->
                        <div class="form-group {{$errors->has('category') ? 'has-error' : ''}}">
                            <label for="">Categorias <small>(obligatorio)</small></label>
                            <select name="category" class="form-control">
                                <option value="">Selecciona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                        </div>

                        {{-- <!--etiquetas-->
                        <div class="form-group">
                            <label>Etiquetas</label>
                            <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Seleciona una o mas etiquetas" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <!--EXTRACTO-->
                        <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="">Extracto del post <small>(obligatorio)</small></label>
                            <textarea name="excerpt" class="form-control" placeholder="Ingresa el extracto">{{old('excerpt')}}</textarea>
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Crear Post</button>
                        </div>

                    </div>                 
                </div>
            </div><!--COL-MD-4-->
        </form>
    </div><!--ROW-->
@stop

@push('styles')

<link rel="stylesheet" href="/adminlte/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush()

@push('scripts')
<!-- bootstrap datepicker -->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<!-- Select2 -->
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    //Date picker
    
    $('#datepicker').datepicker({
      autoclose: true
    });

    CKEDITOR.replace('editor');

    //Initialize Select2 Elements
    $('.select2').select2()
</script>
@endpush()

