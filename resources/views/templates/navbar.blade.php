<div class="navbar-fixed">
    <nav class="white z-depth-3">
        <div class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo brown-text text-darken-3" style="padding-left: 15px;">JOB APP</a>
            <ul class="right hide-on-med-and-down">
                
                
                <@if (Sentinel::check())
                
                    @if (Sentinel::getUser()->first_name == 'admin')
                        <li>
                            {!! link_to(route('admin.index'), 'HOME', ['class' => 'waves-effect waves-light brown-text text-darken-3']) !!}
                        </li>
                        <ul id="dropdown1" class="dropdown-content">
                            <li>
                                {!! link_to("#admin", "Profile", ['class' => 'waves-effect waves-light']) !!}
                            </li>
                                <li class="divider"></li>
                            <li>
                                {!! link_to("/logout", "Logout", ['class' => 'waves-effect waves-light']) !!}
                            </li>
                        </ul>
                    @else
                        <li>
                            {!! link_to(route('users.index'), 'HOME', ['class' => 'waves-effect waves-light brown-text text-darken-3']) !!}
                        </li>
                        <ul id="dropdown1" class="dropdown-content">
                        <li>
                            {!! link_to(route('users.show', Sentinel::getUser()->id), "Profile", ['class' => 'waves-effect waves-light']) !!}
                        </li>
                        <li class="divider"></li>
                        <li>
                            {!! link_to("/logout", "Logout", ['class' => 'waves-effect waves-light']) !!}
                        </li>
                    </ul>
                    @endif
                    
                    
                <li><a class="dropdown-button grey-text text-darken-3" href="#!" data-activates="dropdown1">{!! strToUpper(Sentinel::getUser()->first_name) !!} <i class="material-icons right">arrow_drop_down</i> </a></li>
                @else
                    <li>
                        {!! link_to(route('login'), 'LOGIN', ['class' => 'waves-effect waves-light brown-text text-darken-3']) !!}
                    </li>
                    <li>
                        {!! link_to(route('signup'), 'REGISTER', ['class' => 'waves-effect waves-light brown-text text-darken-3']) !!}
                    </li>
                @endif
                
                
            </ul>
        </div>
        </div>
    </nav>
</div>