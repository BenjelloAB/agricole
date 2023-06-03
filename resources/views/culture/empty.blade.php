@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('select-css.css') }}"> --}}

    {{-- <style>
        .input-selector {
            outline: none;
            border: none;

            background-color: #f6f7f8
        }

        .multi-selector {
            width: max-content;
        }

        .select-field {
            border: 1px solid rgb(187, 187, 187);
        }

        .select-field,
        .task,
        .list {
            width: 100%;
            background-color: #f6f7f8;
            padding: 0.3rem;
            outline: none;
            border: none;
        }

        .list {
            box-shadow: 0 30px 60px rgb(0, 0, 0, 0.2);
            display: none;
        }

        .down-arrow {
            font-size: 1.2rem;
            display: inline-block;
            cursor: pointer;
            transition: 0.2s linear;
        }

        .task {
            display: block;
            padding-left: 0;
        }

        .task span {
            float: right;
            font-size: 0.6rem;
            padding-top: 6px;
        }

        .task:hover {
            background-color: aliceblue;
        }

        .show {
            display: block;
        }

        .rotate180 {
            transform: rotate(-60deg);
        }
    </style> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css" />
<style>
    .saad{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;

        overflow-y: scroll;

    }
    .saad label{
        width: 100%;

    }
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
            <h4 class="mb-0"> Commencer la cultivation</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Employé</a></li>
                <li class="breadcrumb-item active">Commencer la cultivation</li>
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
                <form action="{{ route('culture.creat') }}" method="POST" class="was-validated">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>Nom parcelle</label>

                            {{-- <select class="form-control" id="validationDefault01">
                                @foreach ($parcelle as $parcelle)
                                    <option value="{{ $parcelle->nom }}"> {{ $parcelle->nom }}</option>
                                @endforeach
                            </select> --}}
                            <select style="background-color: #f6f7f8" class="custom-select custom-select-lg mb-3"
                                name="nom_parcelle">
                                <option>selectioner le parcelle</option>
                                @foreach ($parcelle as $parcelle)
                                    <option value="{{ $parcelle->id }}"> {{ $parcelle->nom }}</option>
                                @endforeach
                            </select @required(true)>

                            {{-- <button class="uk-button uk-button-default form-control" type="button">select
                                le parcelle</button>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active">
                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            @foreach ($parcelle as $parcelle)
                                                <label><input class="uk-checkbox" type="checkbox" name="nom_parcelle[]"
                                                        value="{{ $parcelle->nom }}"> {{ $parcelle->nom }}</label>
                                            @endforeach
                                        </div>
                                    </li>

                                </ul>
                            </div> --}}

                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>Nom Employé</label>
                            <button class="uk-button uk-button-default form-control" type="button">selectionner
                                l'employé</button>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active">
                                        <div class="saad uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            @foreach ($employe as $employe)
                                                <label><input class="uk-checkbox" type="checkbox" name="nom_employe[]"
                                                        value="{{ $employe->id }}">
                                                    {{ $employe->prenom }} {{ $employe->nom }}</label>
                                            @endforeach
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>Type de Plante</label>
                            <select style="background-color: #f6f7f8" class="custom-select custom-select-lg mb-3"
                                name="nom">
                                <option selected disabled>selectioner le nom</option>
                                @foreach ($legume as $legume)
                                    <option value="{{ $legume->nom }}"> {{ $legume->nom }}</option>
                                @endforeach
                            </select @required(true)>
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span
                                    style="color: red">*</span>Date debut cultivation</label>
                            <input type="date" class="form-control" id="validationDefault02"
                                name="debut_culture" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span
                                    style="color: red">*</span>Date fin cultivation</label>
                            <input type="date" class="form-control" id="validationDefault01"
                                name="fin_culture" required>
                        </div>


                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label" for="invalidCheck2" style="color: red">
                                *les champs ce sont obligatoires
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
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit-icons.min.js"></script>

{{-- <script src="{{ asset('select-js.js') }}"></script> --}}
{{-- <script>
    document.querySelector('.select-field').addEventListener('click', () => {
        document.querySelector('.list').classList.toggle('show');
        document.querySelector('.down-arrow').classList.toggle('rotate180');

    });
</script> --}}
@endsection
