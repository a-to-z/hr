@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Available / Total Leaves</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Available</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sick Leaves</td>
                                    <td>{{$final[0]['sl']}}</td>
                                    <td>{{$final[1]['sl']}}</td>
                                </tr>
                                <tr>
                                    <td>Casual Leaves</td>
                                    <td>{{$final[0]['cl']}}</td>
                                    <td>{{$final[1]['cl']}}</td>
                                </tr>
                                <tr>
                                    <td>Hajj Leaves</td>
                                    <td>{{$final[0]['hj']}}</td>
                                    <td>{{$final[1]['hj']}}</td>
                                </tr>
                                <tr>
                                    <td>Accidental Disability Leaves</td>
                                    <td>{{$final[0]['ad']}}</td>
                                    <td>{{$final[1]['ad']}}</td>
                                </tr>
                                <tr>
                                    <td>Umrah Leaves</td>
                                    <td>{{$final[0]['uh']}}</td>
                                    <td>{{$final[1]['uh']}}</td>
                                </tr>
                                <tr>
                                    <td>Religious Leaves</td>
                                    <td>{{$final[0]['re']}}</td>
                                    <td>{{$final[1]['re']}}</td>
                                </tr>
                                <tr>
                                    <td>Wedding Leaves</td>
                                    <td>{{$final[0]['we']}}</td>
                                    <td>{{$final[1]['we']}}</td>
                                </tr>
                                <tr>
                                    <td>Annual Leaves</td>
                                    <td>{{$final[0]['al']}}</td>
                                    <td>{{$final[1]['al']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
