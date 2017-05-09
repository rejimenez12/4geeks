@extends('index')

@section('body')

    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Categoría</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
                @if( isset($categories) )
                    @foreach( $categories  as $category)
                      <tr>
                        <td>{{ $category->category }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('normalEditCategory',$category->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Editar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('normalDeleteCategory',$category->id) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Eliminar
                            </a>
                        </td>
                      </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>



@endsection