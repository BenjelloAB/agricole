@extends('layouts.master')
@section('css')

@section('title')
    Culture
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Culture</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">dashboard</a></li>
                <li class="breadcrumb-item active">culture</li>
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
                <a href="{{ route('culture.store') }}"> <button type="button" class="button x-small">
                        ajouter un culture
                    </button>
                </a>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nom_parcelle</th>
                                <th>nom_employe</th>
                                <th>type</th>
                                <th>date_de_plantation_culture</th>
                                <th>date_de_récolte_prévue_culture</th>
                                <th>besoin_en_eau</th>
                                <th>besoin_en_nutriments_culture</th>
                                <th>besoin_en_pesticides_culture</th>
                                <th>état_de_santé_culture</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>

                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>ggg</td>
                                    <td>hh</td>
                                    <td>yy</td>
                                    <td>pp</td>
                                    <td>tt</td>
                                    <td>qq</td>
                                    <td>ww</td>
                                    <td>åå</td>
                                    <td>åå</td>
                                    <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color:rgb(0, 0, 0)"> changer les informations de
                                                        parcelle de terrain</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">
                                                                Nom
                                                            </label>
                                                            <input id="nom" type="text" name="nom"
                                                                class="form-control" required>
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">Prenom
                                                            </label>
                                                            <input type="text" class="form-control" name="prenom"
                                                                required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">
                                                                Date_Naissance
                                                            </label>
                                                            <input id="date" type="date" name="date"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">Lieu_Naissance
                                                            </label>
                                                            <input type="text" class="form-control" name="lieu"
                                                                required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">Situation_familial
                                                            </label>
                                                            <input type="text" class="form-control" name="situation"
                                                                required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">
                                                                adress_postal
                                                            </label>
                                                            <input id="Name" type="text" name="adress"
                                                                class="form-control" required>
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">CIN
                                                            </label>
                                                            <input type="text" class="form-control" name="cin"
                                                                required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">
                                                                Telephone
                                                            </label>
                                                            <input id="Name" type="text" name="tele"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">mail
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="mail">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">Niveau_scolaire
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="scolaire">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">
                                                                experiance
                                                            </label>
                                                            <input id="Name" type="text" name="experiance"
                                                                class="form-control" required>
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">Dernier_employer
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                name="employe">
                                                        </div>
                                                    </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Ferme</button>
                                                <button type="submit" class="btn btn-success">Valide</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_parcelle -->
                                <div class="modal fade" id="delete" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color: rgb(0, 0, 0)"> Supprimer l'employe</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effacer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ferme</button>
                                                        <button type="submit" class="btn btn-danger">Valide</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
