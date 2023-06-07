@extends('layouts.master')
@section('css')

@section('title')
Ajouter employé
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Ajouter employé</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Employé</a></li>
                <li class="breadcrumb-item active">Ajouter employé</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('employe.create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>Nom</label>
                            <input type="text" class="form-control" id="validationDefault01" name="nom" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>Prénom</label>
                            <input type="text" class="form-control" id="validationDefault02" name="prenom" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>Date de naissance</label>
                            <input type="date" class="form-control" id="validationDefault01" name="date" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>Lieu de naissance</label>
                            <input type="text" class="form-control" id="validationDefault02" name="lieu" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>Situation Familiale</label>
                                <select id="Name_en" style="background-color: #f6f7f8" class="custom-select custom-select-lg mb-3" name="situation" required>
                                    <option selected disabled>Selectionner la situation familiale</option>
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié(e)">Marié(e)</option>
                                    <option value="Divorcé(e)">Divorcé(e)</option>
                                    <option value="Veuf/Veuve">Veuf/Veuve</option>
                                    <option value="En couple">En couple</option>
                                </select>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>adresse</label>
                            <input type="text" class="form-control" id="validationDefault02" name="adress" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>CIN</label>
                            <input type="text" class="form-control" id="validationDefault01" name="cin" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>Téléphone</label>
                            <input type="text" class="form-control" id="validationDefault02" name="tele" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault03">Adresse mail</label>
                            <input type="text" class="form-control" id="validationDefault03" name="mail">
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault05">Niveau Scolaire</label>
                            <select id="Name_en" style="background-color: #f6f7f8" class="custom-select custom-select-lg mb-3" name="scolaire" required>
                                <option selected disabled>Selectionner le niveau de scolarité</option>
                                <option value="Primaire">Primaire</option>
                                <option value="Secondaire">Secondaire</option>
                                <option value="Collégial">Collégial</option>
                                <option value="Universitaire">Universitaire</option>
                                <option value="Formation professionnelle">Formation professionnelle</option>
                            </select>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault03"><span style="color: red">*</span>experience(ans)</label>
                            <input type="number" min="0" class="form-control" id="validationDefault03" name="experiance"
                                required>
                        </div>


                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault05">Dernier emploie</label>
                            <input type="text" class="form-control" id="validationDefault05" name="employe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label" for="invalidCheck2" style="color: red">
                                *les champs ce sont obligatoire
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
