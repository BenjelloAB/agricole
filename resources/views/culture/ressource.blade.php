@extends('layouts.master')
@section('css')

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
                                <th>semences</th>
                                <th>engrais</th>
                                <th>pesticides</th>
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
                                    <td>{{ $ressorce->cultur->nom}}</td>
                                    <td>{{ $ressorce->semences }}</td>
                                    <td>{{ $ressorce->engrais }}</td>
                                    <td>{{ $ressorce->pesticides }}</td>
                                    <td>{{ $ressorce->machines_culture }}</td>
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
                                <div class="modal fade" id="edit{{ $ressorce->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{route('culture.updateRessource')}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $ressorce->id }}">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">
                                                                Nom_culture
                                                            </label>

                                                            <select name="cultur" id="" class="form-control">
                                                                @foreach ($cultur as $item)
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
                                                            <label for="Name_en" class="mr-sm-2">machines_culture
                                                            </label>
                                                            <input type="number" class="form-control"
                                                                name="machines_culture" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">pesticides
                                                            </label>
                                                            <input type="text" class="form-control" name="pesticides"
                                                                required>
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
                                <div class="modal fade" id="delete{{ $ressorce->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{route('culture.deleteRessource')}}" method="post">
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
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">
                                    Nom_culture
                                </label>
                                <select name="cultur" id="" class="form-control">
                                    @foreach ($cultur as $cultur)
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
                                <label for="Name_en" class="mr-sm-2">machines_culture
                                </label>
                                <input type="number" class="form-control" name="machines_culture" required>
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">pesticides
                                </label>
                                <input type="text" class="form-control" name="pesticides" required>
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

@endsection
