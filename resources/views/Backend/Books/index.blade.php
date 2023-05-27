@extends('layouts.Backend.app')

@section('css')
    <style>
    </style>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="display:flex;">
                    <h1>
                        Liste des livres
                    </h1>
                    <h5>
                        <a href="{{route('books.create')}}" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                        </a>
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Liste des livres</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        @component('components.alerts')
        @endcomponent
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>N</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Publié</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $key=>$book)
                <tr>
                    <td>{{++$key}}</td>
                    <td><a href="{{route('books.show', $book->id)}}">{{$book->title}}</a></td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->author}}</td>
                    <td>
                        @if($book->is_published == 1)
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$book->id}}" checked>
                                    <label class="custom-control-label" for="customSwitch{{$book->id}}"></label>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$book->id}}">
                                    <label class="custom-control-label" for="customSwitch{{$book->id}}"></label>
                                </div>
                            </div>
                            @endif
                    </td>
                    <td>{{$book->created_at}}</td>
                    <td>
                        <a href="{{route('books.edit', $book->id)}}" class="">
                            <i class="nav-icon fas fa-edit"></i>
                        </a>
                        <form action="{{route('books.destroy', $book->id)}}" method="post" style="display:contents;">
                            @csrf
                            @method('delete')
                            <button type="submit" style="margin-left: 10px; color: red; background-color: unset;" onclick="return confirm('Voulez-vous vraiment supprimer ce livre?')">
                                <i class="nav-icon fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucun livre enregistré pour l'instant</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th>N</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Publié</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
