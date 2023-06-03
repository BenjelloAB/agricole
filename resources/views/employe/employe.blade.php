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
            <h4 class="mb-0"> Employé</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">dashboard</a></li>
                <li class="breadcrumb-item active">Employé</li>
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
                <a href="{{ route('employe.store') }}"> <button type="button" class="button x-small">
                        Ajouter un employé
                    </button>
                </a>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date naissance</th>
                                <th>Lieu naissance</th>
                                <th>Situation Familiale</th>
                                <th>Adresse</th>
                                <th>CIN</th>
                                <th>Télé</th>
                                <th>Email</th>
                                <th>Niveau Scolaire</th>
                                <th>Experience(Ans)</th>
                                <th>Dernier Emploie</th>
                                <th>Status</th>


                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($employes as $employes)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $employes->nom }}</td>
                                    <td>{{ $employes->prenom }}</td>
                                    <td>{{ $employes->date }}</td>
                                    <td>{{ $employes->lieu }}</td>
                                    <td>{{ $employes->situation }}</td>
                                    <td>{{ $employes->adress }}</td>
                                    <td>{{ $employes->cin }}</td>
                                    <td>{{ $employes->tele }}</td>
                                    @if (empty($employes->mail))
                                        <td style="color: red">NULL</td>
                                    @else
                                        <td>{{ $employes->mail }}</td>
                                    @endif
                                    @if (empty($employes->scolaire))
                                        <td style="color: red">NULL</td>
                                    @else
                                        <td>{{ $employes->scolaire }}</td>
                                    @endif

                                    <td>{{ $employes->experiance }}</td>
                                    @if (empty($employes->employe))
                                        <td style="color: red">NULL</td>
                                    @else
                                        <td>{{ $employes->employe }}</td>
                                    @endif

                                    <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $employes->id }}" title="mise à jour"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $employes->id }}" title="supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_parcelle -->
                                <div class="modal fade" id="edit{{ $employes->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color:rgb(0, 0, 0)"> Changer les informations de l'employé</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('employe.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $employes->id }}">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Nom
                                                        </label>
                                                        <input id="nom" type="text" name="nom"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Prénom
                                                        </label>
                                                        <input type="text" class="form-control" name="prenom"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Date de naissance
                                                        </label>
                                                        <input id="date" type="date" name="date"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Lieu de naissance
                                                        </label>
                                                        <input type="text" class="form-control" name="lieu"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Situation Familiale
                                                        </label>
                                                        <select id="Name_en" style="background-color: #f6f7f8"
                                                            class="custom-select custom-select-lg mb-3" name="situation"
                                                            required>
                                                            <option selected disabled>Selectionner la situation
                                                                familiale</option>
                                                            <option value="Célibataire">Célibataire</option>
                                                            <option value="Marié(e)">Marié(e)</option>
                                                            <option value="Divorcé(e)">Divorcé(e)</option>
                                                            <option value="Veuf/Veuve">Veuf/Veuve</option>
                                                            <option value="En couple">En couple</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            adresse postale
                                                        </label>
                                                        <input id="Name" type="text" name="adress"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">CIN
                                                        </label>
                                                        <input type="text" class="form-control" name="cin"
                                                            required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            Téléphone
                                                        </label>
                                                        <input id="Name" type="text" name="tele"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Adresse mail
                                                        </label>
                                                        <input type="text" class="form-control" name="mail">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Niveau Scolaire
                                                        </label>
                                                        <select id="Name_en" style="background-color: #f6f7f8"
                                                            class="custom-select custom-select-lg mb-3"
                                                            name="scolaire" required>
                                                            <option selected disabled>Selectionner le niveau de scolarité
                                                            </option>
                                                            <option value="Primaire">Primaire</option>
                                                            <option value="Secondaire">Secondaire</option>
                                                            <option value="Collégial">Collégial</option>
                                                            <option value="Universitaire">Universitaire</option>
                                                            <option value="Formation professionnelle">Formation
                                                                professionnelle</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">
                                                            experience
                                                        </label>
                                                        <input id="Name" type="number" name="experiance"
                                                            class="form-control" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Dernier emploie
                                                        </label>
                                                        <input type="text" class="form-control" name="employe">
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
                                <div class="modal fade" id="delete{{ $employes->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    <span style="color: rgb(0, 0, 0)"> Supprimer l'employé</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('employe.delete') }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="color: red">Voullez-vous effectuer cette
                                                        operation</span>
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $employes->id }}">
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
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
