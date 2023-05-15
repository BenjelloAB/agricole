@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css" />

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">ajouter culture</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">employe</a></li>
                <li class="breadcrumb-item active">ajouter culture</li>
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
                <form action="{{ route('recolte.creat') }}" method="POST" class="was-validated">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>nom_parcelle</label>

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
                            <label for="validationDefault02"><span style="color: red">*</span>nom_employe</label>
                            <button class="uk-button uk-button-default form-control" type="button">select
                                l'employe</button>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active">
                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
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
                            <label for="validationDefault01"><span style="color: red">*</span>quantité_récoltée</label>
                            <input type="text" class="form-control" id="validationDefault01" name="quantité_récoltée" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>date_récolte</label>
                            <input type="text" class="form-control" id="validationDefault01" name="date_récolte" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span
                                    style="color: red">*</span>coût_récolte</label>
                            <input type="text" class="form-control" id="validationDefault02"
                                name="coût_récolte" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span
                                    style="color: red">*</span>Moyen_rendement</label>
                            <input type="text" class="form-control" id="validationDefault01"
                                name="Moyen_rendement" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>qualité_récolte</label>
                            <input type="text" class="form-control" id="validationDefault02" name="qualité_récolte"
                                required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span
                                    style="color: red">*</span>prix_de_vente</label>
                            <input type="text" class="form-control" id="validationDefault01"
                                name="prix_de_vente" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label" for="invalidCheck2" style="color: red">
                                *les champs ce sont obliges
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
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
