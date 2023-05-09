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
                <form action="" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>nom_parcelle</label>
                            <input type="text" class="form-control" id="validationDefault01" name="nom_parcelle" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>nom_employe</label>
                            <input type="text" class="form-control" id="validationDefault02" name="nom_employe" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>type</label>
                            <input type="date" class="form-control" id="validationDefault01" name="type" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>date_de_plantation_culture</label>
                            <input type="text" class="form-control" id="validationDefault02" name="date_de_plantation_culture" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>date_de_récolte_prévue_culture</label>
                            <input type="text" class="form-control" id="validationDefault01" name="date_de_récolte_prévue_culture"
                                required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>besoin_en_eau</label>
                            <input type="text" class="form-control" id="validationDefault02" name="besoin_en_eau" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault01"><span style="color: red">*</span>besoin_en_nutriments_culture</label>
                            <input type="text" class="form-control" id="validationDefault01" name="besoin_en_nutriments_culture" required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault02"><span style="color: red">*</span>besoin_en_pesticides_culture</label>
                            <input type="text" class="form-control" id="validationDefault02" name="besoin_en_pesticides_culture" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-3 mb-3">
                            <label for="validationDefault03"><span style="color: red">*</span>état_de_santé_culture</label>
                            <input type="text" class="form-control" id="validationDefault03" name="état_de_santé_culture"
                                required>
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

@endsection
