@extends('index')

@section('body')

<div ng-show="success" class=" col-md-12 alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> Categoria creada con exito.
</div>

<div ng-show="response" class=" col-md-12 alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error!</strong> /%error%/.
</div>


<form ng-submit="createCategory(categoryForm)" name="categoryForm" novalidate>
    
<div class="form-group" ng-class="categoryForm.category.$invalid && categoryForm.formSubmitted">
    <label for="email" class="col-md-2 control-label">Categoría</label>
    <div class="col-md-6">
        <input ng-model="category" type="text" class="form-control" name="category" required ng-minlength="5">
        <p ng-show="categoryForm.category.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 5 caracteres</p>
    </div>
</div>


	<div class="form-group">
	    <div class="col-md-4">
	        <input class="btn btn-primary" type="submit" ng-disabled="categoryForm.category.$invalid" value="crear categoría">

	    </div>
	</div>
</form>


@endsection