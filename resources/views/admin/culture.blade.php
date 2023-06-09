@extends('layot.master')
@section('css')
<style>
        .he {
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            border: none;
            transform: translate(9px, -5px);
            width: 82px;
            height: 32px;
            cursor:pointer;
        }
        .card-body{
        position:relative;
    }
.he.he2{
    position: absolute;
    width: 92px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    gap: 12px;
    top: 24px;
    right: 25px;
}
    </style>
@section('title')
    culture
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Gestion Cultivation</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                <li class="breadcrumb-item active">Gestion Cultivation</li>
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

                <form action="{{ route('index4.culture') }}" method="get">
                    @csrf
                    @method('get')
                    <select class="custom-select custom-select-lg mb-3 " style="width: 20%;" name="nom_parcelle">
                        <option>Sélectionner Responsable</option>
                        @foreach ($user as $user)
                            @if ($user->role == 0)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select @required(true)>
                    <button type="submit" class="he">Filtrer</button>
                </form>
               <a href="{{ route('pdf2') }}"> <button type="submit" class="he he2"><i class="fa-solid fa-download"></i>Exporter</button></a>
                <br><br>
                <?php $i = 0; ?>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                 <th>id</th>
                                <th>Nom Parcelle</th>
                                <th>Employé(s)</th>
                                <th>Type plante</th>
                                <th>Date début cultivation</th>
                                <th>Date fin cultivation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($culture as $culture)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $culture->parcelle->nom }}</td>
                                    <td>
                                        @foreach ($culture->employes as $employe)
                                            {{ $employe->nom }} {{ $employe->prenom }}
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $culture->nom }}</td>
                                    <td>{{ $culture->debut_culture }}</td>
                                    <td>{{ $culture->fin_culture }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- add_modal_Grade -->
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
