@extends('admin.layout')

@section('header')
<h1>
	POSTS
	<small>Crear publicación</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
	<li class="active">Crear</li>
</ol>
@stop

@section('content')
<div class="row">
	@if ($post->photos->count())
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				@foreach ($post->photos as $photo)
				<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
					{{ method_field('DELETE') }} {{ csrf_field() }}
					<div class="col-md-2">
						<button class="btn btn-danger btn-xs" style="position: absolute">
							<i class="fa fa-remove"></i>
						</button>
						<img class="img-responsive" src="{{ url($photo->url) }}">
					</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
	@endif
	<form id="post-form" method="POST" action="{{ route('admin.posts.update', $post) }}">
		{{ csrf_field() }} {{ method_field('PUT') }}
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label>Título de la publicación</label>
						<input name="title" class="form-control" value="{{ old('title', $post->title) }}"
							placeholder="Ingresa aquí el título de la publicación">
						{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						<label>Contenido publicación</label>
						<textarea rows="10" name="body" id="editor" class="form-control"
							placeholder="Ingresa el contendido completo de la publicación">{{ old('body', $post->body) }}</textarea>
						{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
					</div>
					
					@if( auth()->user()->getRoleDisplayNames()  == 'Administrador' )
					<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
						<label>Estado de la publicación</label>
						<br>
						@if ($post->status == 'PUBLICADO')
						<label><input type="radio" name="status" id="status" value="PUBLICADO" checked>Publicar</label>
						<br>
						@else
						<label><input type="radio" name="status" id="status" value="PUBLICADO">Publicar</label>
						<br>
						@endif

						@if ($post->status == 'NO-PUBLICADO')
						<label><input type="radio" name="status" id="status" value="NO-PUBLICADO" checked>No publicar</label>
						@else
						<label><input type="radio" name="status" id="status" value="NO-PUBLICADO">No publicar</label>
						@endif
					</div> 

					<div class="form-group {{ $errors->has('observations') ? 'has-error' : '' }}">
						<label>observaciones</label>
						<textarea name="observations" 
						class="form-control"
						rows="5"
						placeholder="Ingresa opservaciones en caso de tenerlas">{{ old('observations', $post->observations) }}</textarea>
						{!! $errors->first('observations', '<span class="help-block">:message</span>') !!}
					</div>
					@endif
					
					<div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
						<label>Contenido embebido (iframe)</label>
						<textarea rows="2" name="iframe" id="editor" class="form-control"
							placeholder="Ingresa contenido embebido (iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
						{!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group">
						<label>Fecha de publicación:</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input name="published_at" class="form-control pull-right"
								value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
								type="text" id="datepicker">
						</div>
					</div>
					<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
						<label>Categorías</label>
						<select name="category_id" class="form-control select2">
							<option value="">Seleciona una categoría</option>
							@foreach ($categories as $category)
							<option value="{{ $category->id }}"
								{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
								{{ $category->name }}</option>
							@endforeach
						</select>
						{!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
						<label>Etiquetas</label>
						<select name="tags[]" class="form-control select2" multiple="multiple"
							data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
							@foreach ($tags as $tag)
							<option
								{{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
								value="{{ $tag->id }}">{{ $tag->name }}</option>
							@endforeach
						</select>
						{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
						<label>Extracto publicación</label>
						<textarea name="excerpt" class="form-control"
							placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
						{!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group">
						<div class="dropzone"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
					</div>
					@if( auth()->user()->getRoleDisplayNames()  == 'Autor' )
						<input type="hidden" name="status" value="PENDIENTE">
					@endif
				</div>
			</div>
		</div>
	</form>

</div>
@stop

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">

<!-- Select2 -->
<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- daterange picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<!-- picker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
	$('#datepicker').datepicker({
		autoclose: true
	});

	$('.select2').select2({
		tags: true
	});

	CKEDITOR.replace('editor');
	CKEDITOR.config.height = 315;

	var myDropzone = new Dropzone('.dropzone', {
		url: '/admin/posts/{{ $post->url }}/photos',
		paramName: 'photo',
		acceptedFiles: 'image/*',
		maxFilesize: 2,
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
		},
		dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
	});

	myDropzone.on('error', function (file, res) {
		var msg = res.photo[0];
		$('.dz-error-message:last > span').text(msg);
	});

	Dropzone.autoDiscover = false;

</script>
@endpush