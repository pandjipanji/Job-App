
@extends('templates.index')

@section('content')

@if ($detail->file == null)
    {!! Form::open(['route' => ['app_submission',$detail->id], 'method' => 'put', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                    <span class="card-title">
                        <h5>Application</h5>
                    </span>
                    <p>You havent sent your job application, sent your application including your <i>Curicullum Vitae</i> to us</p>
                    <p>Note : </p>
                    <ul class="browser-default">
                        <li>Must be a type of file .pdf</li>
                        <li>Maximum size of 1000kb</li>
                    </ul>
                    <p>Once it's submitted, you cant undo your CV, so make sure you have everything's okay before submit it to us</p>
                    </div>
                    {!! Form::hidden('user_id', Sentinel::getUser()->id) !!}
                    {!! Form::hidden('user_name', Sentinel::getUser()->first_name) !!}
                    <div class="card-action">
                            <div class="file-field input-field">
                                <div class="btn brown waves-effect waves-light">
                                    <span>Browse</span>
                                    <input type="file" name="app_file">
                                </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                                <p class="red-text">{!! $errors->first('app_file') !!}</p>
                            </div>
                            </div>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit <i class="material-icons right">send</i> </button>

            </div>
        </div>
    </div>
    {!! Form::open() !!}
@elseif ($detail->status == "unread")
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel brown white-text">
                            <p style="font-size: 150%;">Waiting for approval..</p>
                        </div>
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="large material-icons">hourglass_empty</i></h2>
                                <h5 class="center">You have submitted the application</h5>
                    
                                <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                              </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($detail->status == "approved")
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel green white-text">
                            <p style="font-size: 150%;">Approved!!..</p>
                        </div>
                        <div class="icon-block">
                            <h2 class="center green-text"><i class="large material-icons">check_circle</i></h2>
                                <h5 class="center">Congratulations, your application has been approved!!</h5>
                    
                                <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                              </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($detail->status == "rejected")
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel red white-text">
                            <p style="font-size: 150%;">Your application has been rejected!!..</p>
                        </div>
                        <div class="icon-block">
                            <h2 class="center red-text"><i class="large material-icons">highlight_off</i></h2>
                                <h5 class="center">We are so sorry, try again next time ^^</h5>
                    
                                <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                              </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

    
@stop

