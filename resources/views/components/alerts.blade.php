@if(session('status') === "success")
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Succès !</h5>
        {{session('message')}}
    </div>
@elseif(session('status') === "warning")
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Avetissement !</h5>
        {{session('message')}}
    </div>
@elseif(session('status') === "error")
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Erreur !</h5>
        {{session('message')}}
    </div>
@elseif(session('status') === "info")
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Information !</h5>
        {{session('message')}}
    </div>
@endif
