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
        <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
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
                                <label for="inputName">Titre du livre *</label>
                                <input type="text" id="inputName" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Nom de l'auteur *</label>
                                <input type="text" id="inputClientCompany" class="form-control" name="author" required>
                            </div>
                            <div class="form-group">
                                <label for="customFile">Image de couverture *</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                    <label class="custom-file-label" for="customFile">Choisir une image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Résumé du livre *</label>
                               {{-- <textarea id="inputDescription" class="form-control" rows="4"></textarea>--}}
                                <textarea id="summernote" name="summary" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Statut *</label>
                                <select id="inputStatus" class="form-control custom-select" name="is_published">
                                    <option value="0">Non publié</option>
                                    <option value="1">Publié</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputCategory">Catégorie *</label>
                                <select id="inputCategory" class="form-control custom-select" name="category_id" required>
                                    <option value=""></option>
                                    @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @empty
                                    @endforelse
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
                <a href="{{route('books.index')}}" class="btn btn-secondary">Annuler</a>
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

            //Custom file upload
            bsCustomFileInput.init();

            // Toast alert
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.toastrDefaultError').click(function() {
                toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
        })
    </script>

@endsection
