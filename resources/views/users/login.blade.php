@extends('layouts.main')

@section('content')
    <div class="row">
      <div class="col-lg-4 col-md-5 col-sm-7 center-block">
        <form method="POST">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="username" class="col-sm-12">Username</label>
            <div class="col-sm-12">
              <input id="username" type="text" name="username" placeholder="Username" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-12">Password</label>
            <div class="col-sm-12">
              <input id="password" type="password" name="password" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" value="1">
                    Remember Me
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary">Login</button>
              <a class="pull-right" href="{{{ route('get.users.register') }}}">Don't have an account? Register Now!</a>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">

            </div>
          </div>
        </form>
      </div>
    </div>
@stop
