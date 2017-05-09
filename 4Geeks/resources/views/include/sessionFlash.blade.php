@if ( Session::has('messageError') )

    <div class="alert alert-danger text-center">

        <button class="close" data-close="alert"></button>

        <i class="fa fa-warning"></i>

        <span>{{ Session::get('messageError') }}</span>

    </div>

@elseif( Session::has('messageSuccess') )

    <div class="alert alert-success text-center" role="alert">

        <button class="close" data-close="alert"></button>

        <i class="fa fa-check-square"></i>

        <span> {{ Session::get('messageSuccess') }} </span>

    </div>

@endif