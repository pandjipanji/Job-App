
@extends('templates.index')

@section('content')
    <div class="container" style="margin-top:30px;">
        <div class="row">
                <div class="col m6 offset-m3">
                    <div class="card-panel white">
                        {!! Form::open(['route' => 'signup.store', 'role' => 'form']) !!}
                            @include('templates.form')
                        {!! Form::close() !!}   
                    </div>
                </div>
        </div>
              
    </div>
@stop

