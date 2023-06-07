@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css"  />
    <style>
        div.uk-drop.uk-dropdown-uk-open {
            top: -43.425px;
            left: 4.99997px;
            padding: 11px;
            max-width: 1259.2px;
            width: 100% !important;
        }

        .uk-drop {
            width: 100%;
        }

        .uk-dro label {
            font-size: 16px;
            font-weight: 700;
        }

        input.uk-checkbox {
            /* margin-right: 21px; */

        }

        #exampleModal>div>div>div.modal-body>form>div>div>ul>li>div>label {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            font-size: 14px;
            margin-bottom: 10px;
        }

        #exampleModal>div>div>div.modal-body>form>div>div>ul>li>div>label>input[type=number] {
            outline: none;
            width: 24%;
            border: 1px solid gray;
        }

        #exampleModal>div>div>div.modal-body>form>div>div>ul>li>div>label>p {
            width: 50%;
        }

        div>ul.uk-nav>li.uk-active>div.saad>label {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            font-size: 14px;
            margin-bottom: 10px;
        }

        div>ul.uk-nav>li.uk-active>div.saad>label>input[type=number] {
            outline: none;
            width: 24%;
            border: 1px solid gray;
        }

        div>ul.uk-nav>li.uk-active>div.saad>label>p {
            width: 50%;
        }



        #exampleModal>div>div>div.modal-body>form>div>div>ul>li>div>label>input[type=checkbox] {}
    </style>
@section('title')
    ressource pour la récolte
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Ressources pour la Récolte</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">dashboard</a></li>
                <li class="breadcrumb-item active">Ressources pour la Récolte</li>
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
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                Gérer Ressources Récolte
                </button>

                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom Parcelle</th>
                                <th>Machines utilisées</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($ressource as $ressource)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $ressource->parcelle->nom }}</td>
                                    <td>{{ $ressource->machine_recolte }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $ressource->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $ressource->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit{{ $ressource->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color:rgb(0, 0, 0)"> Changer les informations de cette parcelle</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('ressource.updateRessource') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')


                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $ressource->id }}">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Nom de la Parcelle
                                                        </label>
                                                        <select name="recolte_id" id="" class="form-control">
                                                            <option selected disabled>selectioner le nom de Parcelle</option>
                                                            @foreach ($recolte as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nom }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>




                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">machines de Récolte utilisées
                                                        </label>
                                                        <!-- here -->
                                                        <button class="uk-button uk-button-default form-control"
                                                            type="button">selectionner
                                                            machines Récolte</button>
                                                        <div uk-dropdown>
                                                            <ul class="uk-nav uk-dropdown-nav">
                                                                <li class="uk-active">
                                                                    <div
                                                                        class="saad uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[0]"
                                                                                value="Moissonneuse">
                                                                            <p>Moissonneuse</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[0]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[1]"
                                                                                value="Récolteuse">
                                                                            <p>Récolteuse</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[1]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[2]"
                                                                                value="Cueilleur">
                                                                            <p>Cueilleur</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[2]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[3]"
                                                                                value="Tracteur">
                                                                            <p>Tracteur</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[3]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[4]"
                                                                                value="Équipement_Tri">
                                                                            <p>Équipement_Tri</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[4]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[5]"
                                                                                value="Silos">
                                                                            <p>Silos</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[5]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[6]"
                                                                                value="chambres_froides">
                                                                            <p>ChambresFroides</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[6]" value="0">
                                                                        </label>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>



                                                    </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success">Valider</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_parcelle -->
                                <div class="modal fade" id="delete{{ $ressource->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color: rgb(0, 0, 0)"> Supprimer ces données</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('ressource.deleteRessource') }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effectuer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $ressource->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-danger">Valider</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Changer les informations de cette parcelle
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('ressource.storeRessource') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Nom_recolte
                            </label>
                            <select name="recolte_id" id="" class="form-control">
                                <option selected disabled>selectioner le nom de Parcelle</option>
                                @foreach ($recolte as $recolte)
                                    <option value="{{ $recolte->id }}">{{ $recolte->nom }}</option>
                                @endforeach

                            </select>
                        </div>
                        <br>



                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">machines de Récolte utilisées
                            </label>
                            <!-- here -->
                            <button class="uk-button uk-button-default form-control" type="button">selectionner machines Récolte</button>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active">
                                        <div class="saad uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[0]"
                                                    value="Moissonneuse">
                                                <p>Moissonneuse</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[0]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[1]"
                                                    value="Récolteuse">
                                                <p>Récolteuse</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[1]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[2]"
                                                    value="Cueilleur">
                                                <p>Cueilleur</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[2]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[3]"
                                                    value="Tracteur">
                                                <p>Tracteur</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[3]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[4]"
                                                    value="Équipement_Tri">
                                                <p>Équipement_Tri</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[4]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[5]"
                                                    value="Silos">
                                                <p>Silos</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[5]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[6]"
                                                    value="ChambresFroides">
                                                <p>ChambresFroides</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[6]" value="0">
                                            </label>
                                        </div>
                                    </li>

                                </ul>
                            </div>



                        </div>
                        <br>

                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit-icons.min.js"></script>
@endsection
