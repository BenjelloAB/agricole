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
            <h4 class="mb-0">culture</h4>
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
                <form action="{{ route('index9.finance_culture') }}" method="get">
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
                                <th>cultur_id</th>
                                <th>ressourceculture_id</th>
                                <th>coût_semences</th>
                                <th>coût_engrais</th>
                                <th>coût_pesticides</th>
                                <th>coût_machines_culture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finance_culture as $finance_culture)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $finance_culture->cultur_id }}</td>
                                    <td>{{ $finance_culture->ressourceculture_id }}</td>
                                    <td>{{ $finance_culture->coût_semences }}</td>
                                    <td>{{ $finance_culture->coût_engrais }}</td>
                                    <td>{{ $finance_culture->coût_pesticides }}</td>
                                    <td>{{ $finance_culture->coût_machines_culture }}</td>
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
