@extends('index')

@section('body')
    <div class="col-md-1">
        <label for="name" class="control-label">Filtro</label>
    </div>
    
    <div class="col-md-3">

        <input ng-change="filterNote(filtro)" ng-model="filtro"  type="text" class="form-control" name="name">
    </div>

    <div class="col-md-3">
        <input ng-click="orderNote()" type="button" class="btn btn-primary" name="name" value="Ordenar por Título">
    </div>
   
    <div class="col-md-12" style="padding-top:2%">
        <table class="table table-hover" ng-init="listNote()">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Category</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="note in notes">
                    <td>/% note.title %/</td>
                    <td>/% note.description %/</td>
                    <td>/% note.category%/</td>
                    <td>/% note.created_at %/</td>
                    
                    <td><a href="/normal/edit/note//%note.id%/" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a ng-click="deleteNote(note.id)" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Eliminar
                        </a>
                    </td>
                    <td ng-if="note.mark == 0">
                        <input ng-click="marcarNote(mark1,note.id)" ng-model='mark1' type="button" class="btn btn-primary" name="name" value="/%espera%/">
                    </td>
                    <td ng-if="note.mark == 1">
                        <input ng-click="marcarNote(mark2,note.id)" ng-model='mark2' type="button" class="btn btn-primary" name="name" value=/%listo%/>
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>



@endsection