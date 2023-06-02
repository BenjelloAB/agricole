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
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ressource</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">dashboard</a></li>
                <li class="breadcrumb-item active">ressource</li>
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
                    Parcelle de terrain
                </button>

                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nom_culture</th>
                                <th>consommation semences(Kg)</th>
                                <th>engrais</th>
                                <th>consommation pesticides(Kg)</th>
                                <th>consommation_en_eau(L)</th>
                                <th>besoin_en_pesticides_culture</th>
                                <th>machines_culture</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($ressorce as $ressorce)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $ressorce->parcelle->nom }}</td>
                                    <td>{{ $ressorce->semences }}</td>
                                    <td>{{ $ressorce->engrais }}</td>
                                    <td>{{ $ressorce->pesticides }}</td>
                                    <td>{{ $ressorce->besoin_en_eau }}</td>
                                    <td>{{ $ressorce->besoin_en_pesticides_culture }}</td>
                                    <td>
                                        {{ $ressorce->nom_machine }}
                                        @if (!$loop->last)
                                            <br>
                                        @endif
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $ressorce->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $ressorce->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade benj" id="edit{{ $ressorce->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('culture.updateRessource') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $ressorce->id }}">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Nom_parcelle
                                                        </label>

                                                        <select name="parcelle" id="" class="form-control">
                                                            <option selected disabled>selectioner le
                                                                parcelle</option>
                                                            @foreach ($parcelle as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nom }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">semences
                                                        </label>
                                                        <input type="text" class="form-control" name="semences"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            engrais
                                                        </label>
                                                        <input id="Name" type="text" name="engrais"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">pesticides
                                                        </label>
                                                        <input type="text" class="form-control" name="pesticides"
                                                            required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">besoin_en_eau
                                                        </label>
                                                        <input type="text" class="form-control" name="besoin_en_eau"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">besoin_en_pesticides_culture
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="besoin_en_pesticides_culture" required>
                                                    </div>
                                                    <br>
                                                    <div class="col">
                                                        <!-- here -->
                                                        <button class="uk-button uk-button-default form-control"
                                                            type="button">select
                                                            machine culture</button>
                                                        <div uk-dropdown>
                                                            <ul class="uk-nav uk-dropdown-nav">
                                                                <li class="uk-active">
                                                                    <div
                                                                        class="saad uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[0]"
                                                                                value="Tracteur">
                                                                            <p>Tracteur</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[0]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[1]"
                                                                                value="Charrue">
                                                                            <p>Charrue</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[1]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[2]"
                                                                                value="Cultivateur">

                                                                                <p>Cultivateur</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[2]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[3]"
                                                                                value="Herse">
                                                                            <p>Herse</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[3]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[4]"
                                                                                value="Semoir">
                                                                            <p>Semoir</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[4]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[5]"
                                                                                value="Transplanteuse">
                                                                            <p>Transplanteuse</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[5]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[6]"
                                                                                value="Pulvérisateur">
                                                                            <p>Pulvérisateur</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[6]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[7]"
                                                                                value="Irrigation">
                                                                            <p>Irrigation</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[7]" value="0">
                                                                        </label>
                                                                        <label><input class="uk-checkbox"
                                                                                type="checkbox" name="nom_machine[8]"
                                                                                value="Herse étrille">
                                                                            <p>Herse étrille</p>
                                                                            <input type="number" min="0"
                                                                                max="2" name="numMachine[8]" value="0">
                                                                        </label>

                                                                    </div>
                                                                </li>

                                                            </ul>
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
                                <div class="modal fade" id="delete{{ $ressorce->id }}" tabindex="-1"
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
                                                <form action="{{ route('culture.deleteRessource') }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effacer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $ressorce->id }}">
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
                        hhhhhhhhhhhhhh
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('culture.storeRessource') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Nom_parcelle
                            </label>
                            <select name="parcelle" id="" class="form-control">
                                <option selected disabled>selectioner le culture</option>
                                @foreach ($parcelle as $cultur)
                                    <option value="{{ $cultur->id }}">{{ $cultur->nom }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">semences
                            </label>
                            <input type="text" class="form-control" name="semences" required>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                engrais
                            </label>
                            <input id="Name" type="text" name="engrais" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">pesticides
                            </label>
                            <input type="text" class="form-control" name="pesticides" required>
                        </div>

                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">besoin_en_eau
                            </label>
                            <input type="text" class="form-control" name="besoin_en_eau" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">besoin_en_pesticides_culture
                            </label>
                            <input type="number" class="form-control" name="besoin_en_pesticides_culture" required>
                        </div>
                        <br>
                        <div class="col">
                            <!-- here -->
                            <button class="uk-button uk-button-default form-control" type="button">select
                                machine culture</button>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active">
                                        <div class="saad uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[0]"
                                                    value="Tracteur">
                                                <p>Tracteur</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[0]" value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[1]"
                                                    value="Charrue">
                                                <p>Charrue</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[1]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[2]"
                                                    value="Cultivateur">
                                                <p>Cultivateur</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[2]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[3]"
                                                    value="Herse">
                                                <p>Herse</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[3]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[4]"
                                                    value="Semoir">
                                                <p>Semoir</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[4]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[5]"
                                                    value="Transplanteuse">
                                                <p>Transplanteuse</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[5]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[6]"
                                                    value="Pulvérisateur">
                                                <p>Pulvérisateur</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[6]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[7]"
                                                    value="Irrigation">
                                                <p>Irrigation</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[7]"value="0">
                                            </label>
                                            <label><input class="uk-checkbox" type="checkbox" name="nom_machine[8]"
                                                    value="Herse étrille"value="0">
                                                <p>Herse étrille</p>
                                                <input type="number" min="0" max="2"
                                                    name="numMachine[8]" value="0">
                                            </label>

                                        </div>
                                    </li>

                                </ul>
                            </div>



                        </div>

                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ferme</button>
                    <button type="submit" class="btn btn-success">Valide</button>
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
