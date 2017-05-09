@extends('layouts.main')

@section('content')
    <div class="features row">
        <div class="col-md-6 col-sm-12">
            <div class="item">
                <h4>Default Features &mdash; <small>October 13, 2014</small></h4>
                <p>
                    We plan to implement these basic website features in the near future:
                    <br>
                    <ul>
                        <li>Password Reset</li>
                        <li>User Profiles (Viewing and Editing)</li>
                        <li>Search</li>
                    </ul>
                </p>
            </div>
        </div>
        @foreach($features as $feature)
        <div class="col-md-6 col-sm-12">
            <div class="item">
                <h4><a href="{{{ $feature['url'] }}}">{{{ $feature['title'] }}}</a> &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{{ $feature['body'] }}}</p>
            </div>
        </div>
        @endforeach
    </div>
@stop
