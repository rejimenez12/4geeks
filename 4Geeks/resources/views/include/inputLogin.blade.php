
{{ csrf_field() }}

<div ng-show="response" class=" col-md-12 alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error!</strong> Email o password invalidos.
</div>


<div class="form-group" ng-class="loginForm.email.$invalid && loginForm.formSubmitted">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
    <div class="col-md-6">

        {!! Form::email('email', null , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'email', 'autofocus']) !!}
        <p ng-show="loginForm.email.$error.email" class="alert alert-warning">Introduce un correo valido</p>
        <p ng-show="loginForm.email.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 3 caracteres</p>

    </div>
</div>

<div class="form-group" ng-class="loginForm.password.$invalid && loginForm.formSubmitted">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">

        {!! Form::password('password' , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'password']) !!}
        <p ng-show="loginForm.password.$error.minlength" class="alert alert-warning">Tiene que tener un minimo de 3 caracteres</p>
    </div>
</div>

<div class="form-group" ng-class="loginForm.remember.$invalid && loginForm.formSubmitted">
    <div class="col-md-6 col-md-offset-4">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('remember', null , ['class' => 'form-control','required','ng-minlength' => '3', 'ng-model' => 'remember']) !!}Remember Me

            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">

        {!! Form::submit('Login' , ['class' => 'btn btn-primary','ng-disabled' => 'loginForm.$invalid']) !!}
    </div>
</div>


