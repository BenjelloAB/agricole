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
            <h4 class="mb-0">ajouter employe</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">employe</a></li>
                <li class="breadcrumb-item active">ajouter employe</li>
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
                            <label for="validationDefault01">capital</label>
                            <input type="text" class="form-control" id="validationDefault01" name="capital" value="55550" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02">cout_f_culture</label>
                            <input type="text" class="form-control" id="validationDefault02" value="{{ $cout_total }}" name="prenom" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01">cout_f_recolte: </label>
                            <input type="text" class="form-control" id="validationDefault01" value="{{ $cout_recolte }}" name="date" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02">cout_f_employe:</label>
                            <input type="text" class="form-control" id="validationDefault02" value="{{ $employe }}" name="lieu" disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01">total de cout_CRE</label>
                            <input type="text" class="form-control" id="validationDefault01" value="{{ $cout_CRE }}" name="situation"
                            disabled>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02">le rest</label>
                            <input type="text" class="form-control" id="validationDefault02" value="{{ 55550-$cout_CRE }}" name="adress" disabled>
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
