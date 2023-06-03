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
            <h4 class="mb-0">Gérer Finance Totale</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">dashboard</a></li>
                <li class="breadcrumb-item active">Gérer Finance Totale</li>
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


                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01">Capital</label>
                            <input type="text" class="form-control" id="validationDefault01" name="capital" value="{{ $user }}" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"> Dépenses Culture</label>
                            <input type="text" class="form-control" id="validationDefault02" value="{{ $cout_total }}" name="prenom" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01">Dépenses Récolte</label>
                            <input type="text" class="form-control" id="validationDefault01" value="{{ $cout_recolte }}" name="date" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02">Dépenses Employés</label>
                            <input type="text" class="form-control" id="validationDefault02" value="{{ $employe }}" name="lieu" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01">Total Coût</label>
                            <input type="text" class="form-control" id="validationDefault01" value="{{ $cout_CRE }}" name="situation"
                            disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02">Le Reste</label>
                            <input type="text" class="form-control" id="validationDefault02" value="{{ $user-$cout_CRE }}" name="adress" disabled>
                        </div>

                    </div>




            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
