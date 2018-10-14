@extends('app')

@section('content')
    <div id="crud" class="row">
        <div class="col-12 text-center py-1">
            <h1 class="page-header">Control de Tareas</h1>
        </div>
        <div class="col-12 container">
            <a href="#" title="Nueva Tarea" class="btn btn-primary mb-2 float-right" data-toggle="modal" data-target="#create">Nueva Tarea</a>
            <table class="table table-hover table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tarea</th>
                        <th scope="col">Creada</th>
                        <th scope="col">Estado</th>
                        <th scope="col" colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(keep, indice) in keeps.tasks.data" 
                        v-bind:class="[keep.status != 'ACTIVE' ? 'table-success' : '']">
                        <th width="10px" scope="row" v-text="indice + 1" class="text-center"></th>
                        <td v-text="keep.keep" v-on:click.prevent="showKeep(keep)"></td>
                        <td class="text-center" v-text="since(keep.created_at)"></td>
                        <td v-text="keep.status" class="text-center"></td>
                        <td colspan="2" v-if="keep.status != 'ACTIVE'" class="text-center">
                            <a href="#" title="Ver" class="text-warning" v-on:click.prevent="showKeep(keep)"><i class="far fa-eye"></i></a>
                        </td>
                        <td width="10px" v-if="keep.status == 'ACTIVE'">
                            <a href="#" title="Editar" class="text-warning" v-on:click.prevent="editKeep(keep)"><i class="fas fa-edit"></i></a>
                        </td> 
                        <td width="10px" v-if="keep.status == 'ACTIVE'">
                            <a href="#" title="Eliminar" class="text-danger" v-on:click.prevent="deleteKeep(keep)"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1" class="page-item">
                        <a class="page-link" href="#" title="Atras" @click.prevent="changePage(pagination.current_page - 1)">
                            <span>Atras</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                        class="page-item" 
                        v-bind:class="[page == isActived ? 'active' : '']">
                        <a class="page-link" href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page" 
                        class="page-item">
                        <a href="#" class="page-link" 
                            @click.prevent="changePage(pagination.current_page + 1)">
                            <span>Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>
            @include('patrials.show')
            @include('patrials.create')
            @include('patrials.edit')
        </div>
    </div>
@endsection