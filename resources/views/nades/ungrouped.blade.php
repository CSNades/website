@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="map-display ungrouped">
            @foreach($nades as $nade)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-wrap">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="{{{ ($nade->is_working) ? "glyphicon glyphicon-ok text-success" : "" }}}"></i>
                                <i class="{{{ $nade->getNadeIcon($nade->type) }}}" title="{{{ $nade->getNadeTypeLabel($nade->type) }}}"></i>
                                {{{ $nade->title }}}
                            </h3>
                            <div class="author">
                                By <a href="#">{{{ $nade->user->username }}}</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tutorial row text-center">
                                @if(!empty($nade->imgur_album))
                                <a class="col-xs-{{{ empty($nade->youtube) ? 12:6 }}}" href="{{{ $nade->imgur_album }}}" target="_blank">
                                    <img src="/img/imgur.png">
                                </a>
                                @endif

                                @if(!empty($nade->youtube))
                                <a class="col-xs-{{{ empty($nade->imgur_album) ? 12:6 }}}" href="{{{ $nade->youtube }}}" target="_blank">
                                    <img src="/img/youtube.png">
                                </a>
                                @endif
                            </div>
                            <div class="tags">
                                @foreach(explode(',', $nade->tags) as $tag)
                                @if(!empty($tag))
                                <span class="label">
                                    {{{ $tag }}}
                                </span>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <small>
                            @if (Auth::user() && Auth::user()->is_mod)
                            <div class="pull-right">
                                <a href="{{ route('get.nades.edit', array('id' => $nade->id)) }}">Edit</a>
                            </div>
                            @endif
                            {{{ $nade->updated_at }}}
                        </small>
                    </div>
                </div>
            </div>
            {{--
            <div class="col-sm-4">
                Title: {{ $nade->title }}
                <br>
                Tutorial:
                <br>
                <a href="{{{ $nade->imgur_album }}}" target="_blank"><img src="/img/imgur.png"></a>
                <a href="{{{ $nade->youtube }}}" target="_blank"><img src="/img/youtube.png"></a>
                <br>
                Type: <i class="{{ Nade::getNadeIcon($nade->type) }}" title="{{ Nade::getNadeTypeLabel($nade->type) }}"></i>
                <br>
                Working: {{ ($nade->is_working) ? "Yes" : "No" }}
                <br>
                Tags: {{ $nade->tags }}
                <br>
                Submited By: {{ $nade->user->username }}
                <br>
                Last Updated: {{ $nade->updated_at }}
            </div>
            --}}
            @endforeach
        </div>
    </div>
@stop
