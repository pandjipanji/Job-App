
@extends('templates.index')

@section('content')
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel brown white-text">
                            <p style="font-size: 120%;">Welcome {{ Sentinel::getUser()->first_name }}</p>
                        </div>
                        <div class="card grey lighten-4">
                        <div class="collection">
                            <a href="#!" class="collection-item brown-text"><span class="new badge red" data-badge-caption="New unread Application">{!! $count !!}</span>Attention!!</a> 
                        </div>
                            <div class="input-field col m4" style="margin-top:40px;">
                            <select autofocus id="select_stats">
                                    <option value="all">All </option>
                                    <option value="unread">Unread </option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                <label>Choose Options</label>
                            </div>
                        <table class="centered responsive-table striped" id="table_ajax">
                                    <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>File</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($applications as $val)
                                            @if ($val['first_name'] != 'admin' && $val->userdetail['file'] != null)
                                                <tr>
                                                    <td>{!! $val->first_name." ".$val->last_name !!}</td>
                                                    <td>{!! $val->email !!}</td>
                                                    @php
                                                        $file_name = explode("/",$val->userdetail->file );
                                                        if($val->userdetail->status == "approved"){
                                                            $color = "green";
                                                        } elseif($val->userdetail->status == "rejected"){
                                                            $color = "red";
                                                        } else {
                                                            $color = "teal";
                                                        }
                                                    @endphp
                                                    {!! Form::open(array('route' => array('admin.destroy', $val->id), 'method' => 'delete')) !!}

                                                    <td>
                                                        <a href="/download/{!! $file_name['1'] !!}" class="grey-text"><i class="small material-icons">file_download</i></a>
                                                    </td>
                                                    <td>
                                                        <a href="#modal{{!! $val->userdetail->id !!}}" class="btn btn-small {!! $color !!} waves-effect waves-light modal-trigger">
                                                            {!! $val->userdetail->status !!}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="show/{!! $val->id !!}" class="btn-floating btn-small waves-effect waves-light modal-trigger">
                                                            <i class="large material-icons">mode_edit</i>
                                                        </a>   |
                                                        <button type ="submit" class="btn-floating red btn-small waves-effect waves-light" onclick="return confirm('Sure want to delete this data?')">
                                                                <i class="large material-icons">delete_forever</i>
                                                            </button>
                                                        {!! Form::close() !!}
                                                        
                                                    </td>
                                                </tr>
                                                <!--Materialize Modal-->
                                            <div id="modal{{!! $val->userdetail->id !!}}" class="modal modal-fixed-footer">
                                            {!! Form::open() !!}
                                                    <div class="modal-content">                                                    
                                                    <h5>Change Status</h5>
                                                        <div class="input-field col s12" style="padding-top: 30px;">
                                                                <select id="select_status" onchange="status_ajax($(this).val(),{!! $val->userdetail->id !!})">
                                                                    <option value="" disabled>Choose your option</option>
                                                                    <option value="approved"
                                                                        @if ($val->userdetail->status == "approved")
                                                                            {!! "selected" !!}
                                                                        @endif>Approved
                                                                    </option>

                                                                    <option value="rejected"
                                                                        @if ($val->userdetail->status == "rejected")
                                                                            {!! "selected" !!}
                                                                        @endif>Rejected
                                                                    </option>
                                                                </select>
                                                                <label>Options</label>
                                                        {!! Form::hidden("detail_id", $val->userdetail->id, ['id' => 'detail_id']) !!}

                                                        {!! Form::hidden("status", null, ['id' => 'status_value']) !!}
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    {!! link_to("#", 'Close', ['class' => 'modal-action modal-close waves-effect waves-light btn-flat']) !!}
                                            
                                                    </div>
                                            {!! Form::close() !!}
                                            </div>
                                            @endif
                                        @endforeach
                                    </tbody>
                            </table>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div> 
    
@stop

