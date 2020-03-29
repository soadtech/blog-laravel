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
        <form method="POST" action="{{ route('admin.posts.update', $post)}}">
            {{csrf_field()}} {{method_field('PUT')}}
            <div class="col-md-8">
                
                <div class="box box-primary">
                    
                        <div class="box-body">
                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                <label for="">Titulo del post <small>(obligatorio)</small></label>
                                <input 
                                name="title" 
                                type="text" 
                                class="form-control" 
                                placeholder="Ingresa el titulo" 
                                value="{{ old('title', $post->title) }}">

                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                
                            </div>

                            <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                                <label for="">Contenido del post <small>(obligatorio)</small></label>
                                <textarea rows="10" id="editor" name="body" class="form-control" placeholder="Ingresa el contenido">{{old('body', $post->body)}}</textarea>
                                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                            </div>

                            <div class="form-group {{$errors->has('iframe') ? 'has-error' : ''}}">
                                <label for="">Agregar videos <small>(obligatorio)</small></label>
                                <textarea rows="2" id="editor" name="iframe" class="form-control" placeholder="Ingresa el contenido">{{old('iframe', $post->iframe)}}</textarea>
                                {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
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
                                <input name="published_at" 
                                type="text" 
                                class="form-control pull-right" 
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y'): null) }}"
                                id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!--categorias-->
                        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                            <label for="">Categorias <small>(obligatorio)</small></label>
                            <select name="category_id" class="form-control select2">
                                <option value="">Selecciona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                        >{{$category->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
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
                            <textarea name="excerpt" class="form-control" placeholder="Ingresa el extracto">{{old('excerpt', $post->excerpt)}}</textarea>
                            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <div class="dropzone">

                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Crear Post</button>
                        </div>

                    </div>                 
                </div>
            </div><!--COL-MD-4-->
        </form>

        @if($post->photos->count())
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @foreach($post->photos as $photo)
                            <form method="POST" action="{{route('admin.photos.destroy', $photo)}}">
                                {{csrf_field()}} {{ method_field('DELETE') }}
                                <div class="col-md-3">
                                    <button type="submit"class="btn btn-danger" style="position: absolute"><i class="fa fa-remove"></i></button>
                                    <img class="img-responsive" src="/storage/{{$photo->url}}">
                                </div>
                            </form>   
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div><!--ROW-->
@stop

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<link rel="stylesheet" href="/adminlte/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush()

@push('scripts')
<!-- Dropzone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Select2 -->
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    //Date picker
    
    $('#datepicker').datepicker({
      autoclose: true
    });

    CKEDITOR.replace('editor');
    CKEDITOR.config.height = 240;

    //Initialize Select2 Elements
    $('.select2').select2({
        tags: true
    });

    var myDropzone = new Dropzone('.dropzone', {
        url: '/admin/posts/{{$post->url}}/photos',
        acceptedFiles: 'image/*',
        paramName: 'photo',
        maxFilesize: 5,
        maxFiles: 3,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Arrastra las imagenes para subirlas'
    });

    myDropzone.on('error', function(file, res){
        console.log(res);
        
        // var msg = res.photo;
        // $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover = false;
    
</script>
@endpush()


