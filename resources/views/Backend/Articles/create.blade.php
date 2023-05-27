@extends('layouts.Backend.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajouter un livre</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Ajouter un livre</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route('books.store')}}" method="post">
            @csrf
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
                                <label for="inputName">Titre du livre</label>
                                <input type="text" id="inputName" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Nom de l'auteur</label>
                                <input type="text" id="inputClientCompany" class="form-control" name="author">
                            </div>
                            <div class="form-group">
                                <label for="customFile">Image de couverture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choisir une image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Résumé du livre</label>
                               {{-- <textarea id="inputDescription" class="form-control" rows="4"></textarea>--}}
                                <textarea id="summernote" name="summary"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Statut</label>
                                <select id="inputStatus" class="form-control custom-select" name="is_published">
                                    <option value="1">Publié</option>
                                    <option value="0">Non publié</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputCategory">Catégorie</label>
                                <select id="inputCategory" class="form-control custom-select" name="category_id">
                                    <option value="1">Categorie 1</option>
                                    <option value="0">Catégorie 2</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Créer un livre" class="btn btn-success float-right">
            </div>
        </div>
        </form>
        <br>
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote();

            bsCustomFileInput.init();
        })
    </script>

@endsection
