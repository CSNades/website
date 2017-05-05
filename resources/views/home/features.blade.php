@extends('layouts.main')

@section('content')
    <div class="features row">
        <div class="col-md-6 col-sm-12">
            <div class="item">
                <h4>Default Features &mdash; <small>October 13, 2014</small></h4>
                <p>
                    We plan to implement these basic website features in the near future:
                    <br>
                    Password Reset | User Profiles (Viewing and Editing) | Search
                </p>
            </div>
        </div>
        @foreach($features as $feature)
        <div class="col-md-6 col-sm-12">
            <div class="item">
                <h4>{{{ $feature['title'] }}} &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{{ $feature['description'] }}}</p>
            </div>
        </div>
        @endforeach
    </div>
@stop
