@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' HIEUND')

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                       
                        Content

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
