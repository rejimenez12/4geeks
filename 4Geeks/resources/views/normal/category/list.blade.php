@extends('index')

@section('body')
    <div class="col-md-1">
        <label for="name" class="control-label">Filtro</label>
    </div>
    
    <div class="col-md-3">

        <input ng-change="filterCategory(filtro)" ng-model="filtro"  type="text" class="form-control" name="name">
    </div>

    <div class="col-md-3">
        <input ng-click="orderCategory()" type="button" class="btn btn-primary" name="name" value="Ordenar por Categoría">
    </div>
   
    <div class="col-md-12" style="padding-top:2%">
        <table class="table table-hover" ng-init="listCategory()">
            <thead>
              <tr>
                <th>Categoría</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="category in categories">
                    <td>/% category.category %/</td>
                    <td>/% category.created_at %/</td>
                    <td><a href="/normal/edit/category//%category.id%/" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a ng-click="deleteCategory(category.id)" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Eliminar
                        </a>
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>



@endsection