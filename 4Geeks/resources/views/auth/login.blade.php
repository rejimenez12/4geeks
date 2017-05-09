@extends('index')

@section('body')
<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-sm-8 col-xs-8">

            @include('include.sessionFlash')
            
        </div>
        
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        
                        @include('include.inputLogin')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
