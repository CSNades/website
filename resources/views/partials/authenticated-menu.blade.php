                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{{ Auth::user()->username}}}! <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  {{--
                  <!-- <li>
                    <a href="{{{ route('get.users.profile') }}}" title="Profile">Profile</a>
                  </li> -->
                  @if ($user->is_admin)
                  <!-- <li>
                      <a href="{{{ route('get.maps.add') }}}">Add Map</a>
                  </li> -->
                  @endif
                  --}}
                  @if ($user->is_mod)
                  <li>
                      <a href="{{{ route('get.nades.unapproved') }}}">Unapproved Nades</a>
                  </li>
                  @endif
                  <li class="hidden-xs">
                      <a href="{{{ route('get.users.logout') }}}">Logout</a>
                  </li>
                </ul>
