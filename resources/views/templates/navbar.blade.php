<div class="navbar-fixed">
    <nav class="white">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo grey-text text-darken-3" style="padding-left: 15px;">JobApp</a>
            <ul class="right hide-on-med-and-down">
                
                
                <@if (Sentinel::check())
                
                    @if (Sentinel::getUser()->first_name == 'admin')
                        <li>
                            {!! link_to(route('admin.index'), 'Home', ['class' => 'waves-effect waves-light grey-text text-darken-3']) !!}
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
                            {!! link_to(route('users.index'), 'Home', ['class' => 'waves-effect waves-light grey-text text-darken-3']) !!}
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
                    
                    
                <li><a class="dropdown-button grey-text text-darken-3" href="#!" data-activates="dropdown1">{!! Sentinel::getUser()->first_name !!} <i class="material-icons right">arrow_drop_down</i> </a></li>
                @else
                    <li>
                        {!! link_to(route('login'), 'Login', ['class' => 'waves-effect waves-light grey-text text-darken-3']) !!}
                    </li>
                    <li>
                        {!! link_to(route('signup'), 'Register', ['class' => 'waves-effect waves-light grey-text text-darken-3']) !!}
                    </li>
                @endif
                
                
            </ul>
        </div>
    </nav>
</div>