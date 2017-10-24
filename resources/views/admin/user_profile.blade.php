@extends("templates.index")
@section('content')
    <div class="container" style="margin-top:30px;">
        <div class="row">
                <div class="col m6 offset-m3">
                    <div class="card-panel white">
                            @include('admin.form_user')
                    </div>
                </div>
        </div>
              
    </div>
@stop