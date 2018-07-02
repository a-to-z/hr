@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Used Leaves Details</div>

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
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Leave Count</th>
                                <th>Entry Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{$types[$detail['leave_tp']]}}</td>
                                        <td>{{date('jS M y',strtotime($detail['start_dt']))}}</td>
                                        <td>{{date('jS M y',strtotime($detail['end_dt']))}}</td>
                                        <td>{{$detail['leave_ct']}}</td>
                                        <td>{{date('jS M y',strtotime($detail['ent_dt']))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
