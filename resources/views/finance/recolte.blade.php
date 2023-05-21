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
                                <th>recolte_id</th>
                                <th>coût_récolte</th>
                                <th>prix_de_vente</th>
                                <th>revenu_net</th>
                                <th>revenu_brut</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($finance_recolte as $finance_recolte)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $finance_recolte->recolte_id }}</td>
                                    <td>{{ $finance_recolte->coût_récolte }}</td>
                                    <td>{{ $finance_recolte->prix_de_vente }}</td>
                                    <td>{{ $finance_recolte->revenu_net }}</td>
                                    <td>{{ $finance_recolte->revenu_brut }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $finance_recolte->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $finance_recolte->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit{{ $finance_recolte->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('finance_recolte.edit') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $finance_recolte->id }}">


                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            recolte_id
                                                        </label>
                                                        <select name="recolte_id" id="" class="form-control">
                                                            <option value="selectioner le parcelle">selectioner le
                                                                culture</option>
                                                            @foreach ($recolte as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->id }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">coût_récolte
                                                        </label>
                                                        <input type="text" class="form-control" name="coût_récolte"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">prix_de_vente
                                                        </label>
                                                        <input type="text" class="form-control" name="prix_de_vente"
                                                            required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">revenu_net
                                                        </label>
                                                        <input type="text" class="form-control" name="revenu_net"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">revenu_brut
                                                        </label>
                                                        <input type="text" class="form-control" name="revenu_brut"
                                                            required>
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
                                <div class="modal fade" id="delete{{ $finance_recolte->id }}" tabindex="-1"
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
                                                <form action="{{route('finance_recolte.delete') }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effacer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $finance_recolte->id }}">
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
                    <form action="{{ route('finance_recolte.add') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                recolte_id
                            </label>
                            <select name="recolte_id" id="" class="form-control">
                                <option value="selectioner le parcelle">selectioner le
                                    culture</option>
                                @foreach ($recolte as $recolte)
                                    <option value="{{ $recolte->id }}">{{ $recolte->id }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">coût_récolte
                            </label>
                            <input type="text" class="form-control" name="coût_récolte" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">prix_de_vente
                            </label>
                            <input type="text" class="form-control" name="prix_de_vente" required>
                        </div>

                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">revenu_net
                            </label>
                            <input type="text" class="form-control" name="revenu_net" required>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">revenu_brut
                            </label>
                            <input type="text" class="form-control" name="revenu_brut" required>
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
