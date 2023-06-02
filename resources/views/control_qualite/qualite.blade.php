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
            <img class="navbar-brand brand-logo" src="2.png" alt="" srcset="" width="200px">
            {{-- <img class="navbar-brand brand-logo-mini" src="iconagri.png" alt="" srcset="" width="35px"> --}}
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
                                <th>nom_parcelle</th>

                                <th>texture_du_sol</th>
                                <th>ph_du_sol</th>
                                <th>etat_de_produit_recolte</th>
                                <th>etat_sante</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($control as $control)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $control->parcelle->nom }}</td>

                                    <td>{{ $control->texture_du_sol }}</td>
                                    <td>{{ $control->ph_du_sol }}</td>
                                    <td>{{ $control->etat_de_produit_recolte }}</td>
                                    <td>{{ $control->etat_sante }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $control->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $control->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit{{ $control->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('control_qualite.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $control->id }}">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Nom_recolte
                                                        </label>
                                                        <select name="recolte_id" id="" class="form-control">
                                                            <option value="selectioner le parcelle">selectioner le
                                                                recolte</option>
                                                            @foreach ($recolte as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nom }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">texture_du_sol
                                                            </label>
                                                            <select name="texture_du_sol" id="" class="form-control">
                                                                <option selected disabled>selectioner le recolte</option>
                                                                <option value="sable">sable</option>
                                                                <option value="limon">limon</option>
                                                                <option value="argil">argil</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">ph_du_sol
                                                            </label>
                                                            <input type="number" class="form-control" id="exampleFormControlTextarea1"
                                                                name="ph_du_sol" min="0" max="14" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">etat_de_produit_recolte
                                                            </label>
                                                            <select name="etat_de_produit_recolte" id="" class="form-control">
                                                                <option selected disabled>selectioner le recolte</option>
                                                                <option value="Bien">Bien</option>
                                                                <option value="passable">passable</option>
                                                                <option value="mauvaise">mauvaise</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">etat_sante
                                                            </label>
                                                            <select name="etat_sante" id="" class="form-control">
                                                                <option selected disabled>selectioner le recolte</option>
                                                                <option value="Bien">Bien</option>
                                                                <option value="passable">passable</option>
                                                                <option value="mauvaise">mauvaise</option>
                                                            </select>
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
                                <div class="modal fade" id="delete{{ $control->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('control_qualite.delete') }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effacer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $control->id }}">
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
                    <form action="{{ route('control_qualite.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                nom parcelle
                            </label>
                            <select name="recolte_id" id="" class="form-control">
                                <option value="selectioner le parcelle">selectioner le recolte</option>
                                @foreach ($recolte as $recolte)
                                    <option value="{{ $recolte->id }}">{{ $recolte->nom }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">texture_du_sol
                                </label>
                                <select name="texture_du_sol" id="" class="form-control">
                                    <option selected disabled>selectioner le recolte</option>
                                    <option value="sable">sable</option>
                                    <option value="limon">limon</option>
                                    <option value="argil">argil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ph_du_sol
                                </label>
                                <input type="number" class="form-control" id="exampleFormControlTextarea1"
                                    name="ph_du_sol" min="0" max="14" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">etat_de_produit_recolte
                                </label>
                                <select name="etat_de_produit_recolte" id="" class="form-control">
                                    <option selected disabled>selectioner le recolte</option>
                                    <option value="Bien">Bien</option>
                                    <option value="passable">passable</option>
                                    <option value="mauvaise">mauvaise</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">etat_sante
                                </label>
                                <select name="etat_sante" id="" class="form-control">
                                    <option selected disabled>selectioner le recolte</option>
                                    <option value="Bien">Bien</option>
                                    <option value="passable">passable</option>
                                    <option value="mauvaise">mauvaise</option>
                                </select>
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
