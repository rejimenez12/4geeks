{{ csrf_field() }}


<div ng-show="response" class=" col-md-12 alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error!</strong> /%error%/.
</div>
<div ng-show="success" class=" col-md-12 alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> Cuenta creada con éxito.
</div>



<div class="form-group" ng-class="registerForm.name.$invalid && registerForm.formSubmitted">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        {!! Form::text('name', null , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'name', 'autofocus']) !!}
        <p ng-show="registerForm.name.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 3 caracteres</p>

    </div>
</div>

<div class="form-group" ng-class="registerForm.email.$invalid && registerForm.formSubmitted">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        {!! Form::email('email', null , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'email', 'autofocus']) !!}
        <p ng-show="registerForm.email.$error.email" class="alert alert-warning">Introduce un correo valido</p>
        <p ng-show="registerForm.email.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 3 caracteres</p>
    </div>
</div>

<div class="form-group" ng-class="registerForm.email.$invalid && registerForm.formSubmitted">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        {!! Form::password('password' , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'password']) !!}
        <p ng-show="registerForm.password.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 3 caracteres</p>

    </div>
</div>

<div class="form-group" ng-class="registerForm.password_confirmation.$invalid && registerForm.formSubmitted">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        {!! Form::password('password_confirmation' , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'password_confirmation']) !!}
        <p ng-show="registerForm.password_confirmation.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 3 caracteres</p>
        
    </div>
</div>

<div class="form-group" ng-class="loginForm.email.$invalid && loginForm.formSubmitted">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit('Register' , ['class' => 'btn btn-primary','ng-disabled' => 'registerForm.$invalid']) !!}
    </div>
</div>
