@extends('layouts.Backend.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modifier la catégorie</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Modifier la catégorie</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route('categories.update', $category->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Titre de la catégorie *</label>
                                <input type="text" value="{{$category->name}}" id="inputName" class="form-control" name="name" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('categories.index')}}" class="btn btn-secondary">Annuler</a>
                    <input type="submit" value="Mettre à jour la catégorie" class="btn btn-success float-right">
                </div>
            </div>
        </form>
        <br>
    </section>
    <!-- /.content -->
@endsection

@section('js')

@endsection
