@extends('common.layout')
@section('Home') @endsection


@section('content')
    <h2>Part #1</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Upload CSV/JSON</div>
                <div class="panel-body">
                    @include('forms/upload_form')
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>
                <div class="panel-body">
                    <div id="api-result"></div>
                </div>
            </div>

        </div>
    </div>
    <h2>Part #2</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>
                <div class="panel-body">
                    @include('forms/show_map_form')
                </div>
            </div>
        </div>
    </div>
    @include('popups/map')
@endsection

@section('js')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{config('app.googleMapsApiKey')}}">
    </script>
@endsection