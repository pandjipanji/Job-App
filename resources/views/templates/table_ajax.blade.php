<table class="centered responsive-table">
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
                    <td>{!! $val->userdetail->birthdate !!}</td>
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
                    <td>
                        <a href="/download/{!! $file_name['1'] !!}">Download</a>
                    </td>
                    <td>
                        <a href="#modal{{!! $val->userdetail->id !!}}" class="btn btn-small {!! $color !!} waves-effect waves-light modal-trigger">
                            {!! $val->userdetail->status !!}
                        </a>
                    </td>
                    <td>
                        <a href="#modal{{!! $val->userdetail->id !!}}" class="btn-floating btn-small waves-effect waves-light modal-trigger">
                            <i class="large material-icons">mode_edit</i>
                        </a>   |
                        <a href="#" class="btn-floating red btn-small waves-effect waves-light">
                            <i class="large material-icons">delete_forever</i>
                        </a>
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
        {!! Form::hidden("status", null, ['id' => 'status_value']) !!}                                         
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn-flat waves-effect waves-light" type="submit" name="action">Submit</button>
                                                    
        {!! link_to("#", 'Close', ['class' => 'modal-action modal-close waves-effect waves-light btn-flat']) !!}
                                            
    </div>
{!! Form::close() !!}
</div>
            @endif
        @endforeach
    </tbody>
</table>