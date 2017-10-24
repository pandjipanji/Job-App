
@extends('templates.index')


@section('content')
    <div class="containter" style="margin-top:30px;">
        <div class="row">
            <div class="col m4 offset-m4">
                <div class="card-panel white">
                    {!! Form::open(['route' => 'login.store', 'role' => 'form']) !!}
                        <div class="row">
                            <div class="input-field col m12">
                                <input id="email" type="email" name="email" class="validate">
                                <label for="email">Email</label>
                                <p class="red-text">{{$errors->first('email')}}</p>                                      
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <input type="password" id="password"  name="password" class="validate">
                                <label for="password">Password</label>
                                <p class="red-text">{{$errors->first('password')}}</p>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
@stop

