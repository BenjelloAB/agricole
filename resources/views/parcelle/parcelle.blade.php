@extends('layouts.master')
@section('css')

@section('title')
    parcelle
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Parcelle de terrain</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                <li class="breadcrumb-item active">Parcelle</li>
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
                                <li style="list-style: none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    Parcelle de terrain
                </button>
                <br><br>
                <?php $i = 0; ?>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nom</th>
                                <th>emplacement</th>
                                <th>taille</th>
                                <th>type_de_sol</th>
                                <th>niveau_dirrigation</th>
                                <th>état_de_santé</th>
                                <th>status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($parcelle as $parcelles)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $parcelles->nom }}</td>
                                    <td>{{ $parcelles->emplacement }}</td>
                                    <td>{{ $parcelles->taille }}</td>
                                    <td>{{ $parcelles->type_de_sol }}</td>
                                    <td>{{ $parcelles->niveau_dirrigation }}</td>
                                    <td>{{ $parcelles->état_de_santé }}</td>
                                    <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $parcelles->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $parcelles->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit{{ $parcelles->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('parcelle.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label for="Name" class="mr-sm-2">
                                                            Nom
                                                        </label>
                                                        <input id="Name" type="text" name="nom"
                                                            class="form-control">
                                                    </div>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $parcelles->id }}">
                                                    <div class="form-group">
                                                        <label for="Name_en" class="mr-sm-2">emplacement
                                                        </label>
                                                        <input type="text" class="form-control" name="emplacement"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Name" class="mr-sm-2">
                                                            taille
                                                        </label>
                                                        <input id="Name" type="text" name="taille"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Name_en" class="mr-sm-2">type_de_sol
                                                        </label>
                                                        <input type="text" class="form-control" name="type_de_sol"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Name_en" class="mr-sm-2">niveau_dirrigation
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="niveau_dirrigation" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">état_de_santé
                                                        </label>
                                                        <textarea class="form-control" name="état_de_santé" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                                    </div>
                                                    <br><br>
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
                                <div class="modal fade" id="delete{{ $parcelles->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color: rgb(0, 0, 0)"> Supprimer le parcelle de
                                                        terrain</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('parcelle.delete') }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effacer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $parcelles->id }}">
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
    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        hhhhh
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('parcelle.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="Name" class="mr-sm-2">
                                Nom
                            </label>
                            <input id="Name" type="text" name="nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Name_en" class="mr-sm-2">emplacement
                            </label>
                            <input type="text" class="form-control" name="emplacement" required>
                        </div>
                        <div class="form-group">
                            <label for="Name" class="mr-sm-2">
                                taille
                            </label>
                            <input id="Name" type="text" name="taille" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Name_en" class="mr-sm-2">niveau_dirrigation
                            </label>
                            <input type="text" class="form-control" name="niveau_dirrigation" required>
                        </div>
                        <div class="form-group">
                            <label for="Name_en" class="mr-sm-2">type_de_sol
                            </label>
                            <input type="text" class="form-control" name="type_de_sol" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">état_de_santé
                            </label>
                            <textarea class="form-control" name="état_de_santé" id="exampleFormControlTextarea1" rows="3" required></textarea>
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
