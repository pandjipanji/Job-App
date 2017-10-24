@foreach($userdata as $data)
    @if($data->userdetail != null)
{!! Form::open(['route' => ['admin.update', $data->id], 'method'=>'put', 'role' => 'form']) !!}
                            <div class="row">
                                <div class="input-field col m6">
                                    <input id="first_name" name="first_name" type="text" value="{!! $data->first_name !!}">
                                    <label for="first_name">First Name</label>
                                    <p class="red-text">{{$errors->first('first_name')}}</p>
                                </div>
                                <div class="input-field col m6">
                                    <input id="last_name" name="last_name" type="text" value="{!! $data->last_name !!}">
                                    <label for="last_name">Last Name</label>
                                    <p class="red-text">{{$errors->first('last_name')}}</p>                                    
                                </div> 
                            </div>
                            <div class="row">
                                <div class="input-field col m12">
                                        <input type="text" id="birthdate" name="birthdate" class="datepicker" value="{!! $data->userdetail->birthdate !!}">
                                        <label for="birthdate">Birthdate</label>
                                </div>
                            </div>
                            <div class="row col m12">
                                <label for="gender">Gender</label>
                                <p>
                                    <input class="with-gap" name="gender" type="radio" id="test1" value="Male" 
                                        @if($data->userdetail->gender == "Male")
                                            {!! "checked" !!}
                                        @endif
                                    />
                                    <label for="test1">Male</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="gender" type="radio" id="test3" value="Female" 
                                        @if($data->userdetail->gender == "Female")
                                            {!! "checked" !!}
                                        @endif
                                    />
                                    <label for="test3">Female</label>
                                </p>
                            </div>
                            <div class="row">
                                <div class="input-field col m12">
                                    <input type="text" id="phone" name="phone" class="validate" value="{!! $data->userdetail->phone !!}">
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            
                            {!! link_to(url()->previous(), "Back", ['class' => 'btn orange waves-effect waves-light']) !!}
                            
                            <button class="btn waves-effect waves-light" type="submit">Submit
                                    <i class="material-icons right">send</i>
                            </button>
                        {!! Form::close() !!}  
                @endif
@endforeach