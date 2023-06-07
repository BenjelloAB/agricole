@extends('layouts.master')
@section('css')

@section('title')
    finance cultivation
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <img class="navbar-brand brand-logo" src="2.png" alt="" srcset="" width="200px">
            {{-- <img class="navbar-brand brand-logo-mini" src="iconagri.png" alt="" srcset="" width="35px"> --}}
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                <li class="breadcrumb-item active">Finance cultivation</li>
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
                   Gérer finance cultivation
                </button>

                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom parcelle </th>
                                <th>Coût semences (dh)</th>
                                <th>Coût engrais (dh)</th>
                                <th>Coût pesticides (dh)</th>
                                <th>Coût machines cultivation (dh)</th>
                                <th>Coût consommation eau (dh)</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($finance_culture as $finance_culture)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $finance_culture->parcelle->nom }}</td>
                                    <td>{{ $finance_culture->coût_semences }}</td>
                                    <td>{{ $finance_culture->coût_engrais }}</td>
                                    <td>{{ $finance_culture->coût_pesticides }}</td>
                                    <td>{{ $finance_culture->coût_machines_culture }}</td>
                                    <td>{{ $finance_culture->cout_consommation_eau }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $finance_culture->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $finance_culture->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit{{ $finance_culture->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color:rgb(0, 0, 0)">Modifier les données
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('finance.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $finance_culture->id }}">


                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                          Nom parcelle
                                                        </label>
                                                        <select name="cultur_id" id="" class="form-control">
                                                            <option value="selectioner le parcelle">Sélectionner
                                                                parcelle</option>
                                                            @foreach ($cultur as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nom }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    {{-- <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            ressourceculture_id
                                                        </label>
                                                        <select name="ressourceculture_id" id=""
                                                            class="form-control">
                                                            <option value="selectioner le parcelle">Sélectioner le
                                                                culture</option>
                                                            @foreach ($ressourceculture as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->id }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div> --}}
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                           Type plante cultivée
                                                        </label>
                                                        <select name="plant" id="" class="form-control">

                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Taille parcelle (Hectare)
                                                        </label>
                                                        <select name="taille" id="" class="form-control">

                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Les machines
                                                        </label>
                                                        <select name="machine" id="" class="form-control">
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Coût semences (dh)
                                                        </label>
                                                        <input type="number" class="form-control" name="coût_semences"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Coût engrais (dh)
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="coût_engrais" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Coût pesticides (dh)
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="coût_pesticides" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Coût machines culture (dh)
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="coût_machines_culture" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Coût consommation eau (dh)
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            name="cout_consommation_eau" required>
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
                                <div class="modal fade" id="delete{{ $finance_culture->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color: rgb(0, 0, 0)"> Supprimer les données</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('finance.delete') }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous vraiment
                                                        supprimer ces données</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $finance_culture->id }}">
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
                        Gérer finance cultivation
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('finance.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                              Nom parcelle
                            </label>
                            <select name="cultur_id" id="" class="form-control"
                                onchange="console.log($(this).val())">
                                <option value="selectioner le parcelle">Sélectionner
                                    parcelle</option>
                                @foreach ($cultur as $cultur)
                                    <option value="{{ $cultur->id }}">{{ $cultur->nom }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Type plante cultuvée
                            </label>
                            <select name="plant" id="" class="form-control">

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Taille parcelle (Hectare)
                            </label>
                            <select name="taille" id="" class="form-control">

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Les machines
                            </label>
                            <select name="machine" id="" class="form-control">
                            </select>
                        </div>

                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Consommation semences (kg)
                              </label>
                            <select name="semences" id="" class="form-control">

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Consommation engrais (kg)
                            </label>
                            <select name="engrais" id="" class="form-control">

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                              Consommation  pesticides (kg)
                            </label>
                            <select name="pesticides" id="" class="form-control">
                            </select>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Consommation eau (Litre)
                            </label>
                            <select name="besoin_en_eau" id="" class="form-control">
                            </select>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Coût semences (dh)
                            </label>
                            <input type="number" class="form-control" name="coût_semences" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Coût engrais (dh)
                            </label>
                            <input type="number" class="form-control" name="coût_engrais" required>
                        </div>

                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Coût pesticides (dh)
                            </label>
                            <input type="number" class="form-control" name="coût_pesticides" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Coût machines culture (dh)
                            </label>
                            <input type="number" class="form-control" name="coût_machines_culture" required>
                        </div>

                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Coût consommation eau (dh)
                            </label>
                            <input type="number" class="form-control" name="cout_consommation_eau" required>
                        </div>


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
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('plante') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="plant"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="plant"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('taille') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="taille"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="taille"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('machine') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="machine"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="machine"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('semences') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="semences"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="semences"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('engrais') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="engrais"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="engrais"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('pesticides') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="pesticides"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="pesticides"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="cultur_id"]').on('change', function() {
            var cultur_id = $(this).val();
            if (cultur_id) {
                $.ajax({
                    url: "{{ URL::to('besoin_en_eau') }}/" + cultur_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="besoin_en_eau"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="besoin_en_eau"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
