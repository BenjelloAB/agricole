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
        }
    </style>
@section('title')
    parcelle
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Parcelle de employe</h4>
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
                <form action="{{ route('index3.show') }}" method="get">
                    @csrf
                    @method('get')
                    <select class="custom-select custom-select-lg mb-3 " style="width: 20%;" name="nom_parcelle">
                        <option>selectioner le parcelle</option>
                        @foreach ($user as $user)
                            @if ($user->role == 0)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select @required(true)>
                    <button type="submit" class="he">send</button>
                </form>
                <br><br>
                <?php $i = 0; ?>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">


                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>date</th>
                                <th>lieu</th>
                                <th>situation</th>
                                <th>adress</th>
                                <th>cin</th>
                                <th>tele</th>
                                <th>mail</th>
                                <th>scolaire</th>
                                <th>experiance</th>
                                <th>employe</th>


                            </tr>
                        </thead>
                        <tbody>
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
