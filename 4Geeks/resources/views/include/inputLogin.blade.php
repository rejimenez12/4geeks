
{{ csrf_field() }}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
    <div class="col-md-6">
        <input ng-model="email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input ng-model="password" id="password" type="password" class="form-control" name="password">
        
        @if ( $errors->has('password') )
            <span class="help-block">
                <strong> {{ $errors->first('password') }}</strong> 
            </span>
        @endif
        
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="checkbox">
            <label>
                <input ng-model="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <input class="btn btn-primary" type="button" ng-click="login(email,password,remember)" value="Login">

    </div>
</div>

