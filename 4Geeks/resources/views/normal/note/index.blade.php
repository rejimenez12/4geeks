@extends('index')

@section('body')

<div ng-show="response" class=" col-md-12 alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> Nota creada con éxito.
</div>

<form ng-submit="createNote(noteForm)" name="noteForm" novalidate>

    <div class="form-group col-md-6" >
        <label for="email" class="col-md-2 control-label">Título</label>
        <div class="col-md-10">
            {!! Form::text('title', null , ['class' => 'form-control','required','ng-minlength' => '5', 'ng-model' => 'title']) !!}
            <p ng-show="noteForm.title.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 5 caracteres</p>
        </div>

    </div>

    <div class="form-group col-md-6" >
        <label for="email" class="col-md-2 control-label">Categoría</label>
        <div class="col-md-10">
            {!! Form::select('category_id', isset($category) ? $category : ["" => 'Seleccione'], null, ['class' => 'form-control', 'required','ng-model' => 'category_id']) !!}
        </div>

    </div>


    <div class="form-group col-md-12">
        <label for="email" class="col-md-1 control-label">Descripción</label>
        <div class="col-md-11">
            {!! Form::textarea('description', null ,['class' => 'form-control', 'required', 'ng-minlength' => '5' ,'rows' => 5, 'ng-model' => 'description']) !!}
            <p ng-show="noteForm.description.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 5 caracteres</p>
        </div>



    </div>


	<div class="form-group col-md-12">
	    <div class="col-md-12">
	        <center>
                {!! Form::submit('crear nota' , ['class' => 'btn btn-primary','ng-disabled' => 'noteForm.$invalid']) !!}
            </center>
            

	    </div>
	</div>
</form>



@endsection