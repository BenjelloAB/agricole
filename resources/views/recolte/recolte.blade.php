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
                <li class="breadcrumb-item active">recolte</li>
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
                <a href="{{ route('recolte.store') }}"> <button type="button" class="button x-small">
                        ajouter un recolte
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
                                <th>quantité_récoltée</th>
                                <th>date_récolte</th>
                                <th>coût_récolte</th>
                                <th>Moyen_rendement</th>
                                <th>qualité_récolte</th>
                                <th>prix_de_vente</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($recolte as $recolte)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $recolte->parcelle->nom }}</td>
                                    <td>
                                        @foreach ($recolte->employes as $employe)
                                            {{ $employe->nom }} {{ $employe->prenom }}
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $recolte->quantité_récoltée }}</td>
                                    <td>{{ $recolte->date_récolte }}</td>
                                    <td>{{ $recolte->coût_récolte }}</td>
                                    <td>{{ $recolte->Moyen_rendement }}</td>
                                    <td>{{ $recolte->qualité_récolte }}</td>
                                    <td>{{ $recolte->prix_de_vente }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $recolte->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <!-- delete_modal_parcelle -->
                                <div class="modal fade" id="delete{{ $recolte->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color: rgb(0, 0, 0)"> Supprimer le culture</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('recolte.delete')}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effacer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{$recolte->id}}">
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
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
