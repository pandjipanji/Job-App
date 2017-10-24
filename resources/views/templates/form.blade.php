<div class="row">
                                <div class="input-field col m6">
                                    <input id="first_name" name="first_name" type="text">
                                    <label for="first_name">First Name</label>
                                    <p class="red-text">{{$errors->first('first_name')}}</p>
                                </div>
                                <div class="input-field col m6">
                                    <input id="last_name" name="last_name" type="text">
                                    <label for="last_name">Last Name</label>
                                    <p class="red-text">{{$errors->first('last_name')}}</p>                                    
                                </div> 
                            </div>
                            <div class="row">
                                <div class="input-field col m12">
                                        <input type="text" id="birthdate" name="birthdate" class="datepicker">
                                        <label for="birthdate">Birthdate</label>
                                </div>
                            </div>
                            <div class="row col m12">
                                <label for="gender">Gender</label>
                                <p>
                                    <input class="with-gap" name="gender" type="radio" id="test1" value="Male" />
                                    <label for="test1">Male</label>
                                </p>
                                <p>
                                    <input class="with-gap" name="gender" type="radio" id="test3" value="Female"  />
                                    <label for="test3">Female</label>
                                </p>
                            </div>
                            <div class="row">
                                    <div class="input-field col m12">
                                      <input id="email" type="email" name="email" class="validate">
                                      <label for="email">Email</label>
                                      <p class="red-text">{{$errors->first('email')}}</p>                                      
                                    </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m12">
                                    <input type="text" id="phone" name="phone" class="validate">
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="input-field col m12">
                                        <input type="password" id="password" name="password" class="validate">
                                        <label for="password">Password</label>
                                        <p class="red-text">{{$errors->first('password')}}</p>                                                                              
                                    </div>
                                </div>
                            <div class="row">
                                        <div class="input-field col m12">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="validate">
                                            <label for="password_confirmation">Password Confirmation</label>
                                        </div>
                                    </div>
                            <button class="btn waves-effect waves-light" type="submit">Submit
                                    <i class="material-icons right">send</i>
                            </button>