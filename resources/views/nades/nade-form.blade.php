@extends('layouts.main')

@section('content')
        <form method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-xs-12">Nade Title</label>
                        <div class="col-sm-12">
                            <input type="text" name="title" class="form-control" placeholder="Nade Title" value="{{ $nade->title }}">
                            {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                         <label for="map" class="col-sm-12">Map</label>
                        <div class="col-sm-12">
                            <select name="map" class="form-control">
                                @foreach($mapList as $map)
                                    @if(isset($nade->map->slug) && $nade->map->slug == $map)
                                        <option name="{{ $map }}" selected>{{ $map }}</option>
                                    @else
                                        <option name="{{ $map }}">{{ $map }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{ $errors->first('map', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{{ $errors->has('pop_spot') ? 'has-error' : '' }}}">
                        <label for="pop_spot" class="col-xs-12">Pop Spot</label>
                        <div class="col-sm-12">
                            <select name="pop_spot" class="form-control">
                                @foreach($popSpots as $key => $spot)
                                    @if(isset($nade->map->pop_spot) && $nade->map->pop_spot == $key)
                                         <option name="{{ $key }}" value="{{ $key }}" selected>{{ $spot }}</option>
                                    @else
                                         <option name="{{ $key }}" value="{{ $key }}">{{ $spot }}</option>
                                    @endif                               
                                @endforeach
                            </select>
                            {{ $errors->first('pop_spot', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('imgur_album') ? 'has-error' : '' }}}">
                        <label for="imgur_album" class="col-xs-12">Imgur Album</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="http://imgur.com/a/album" name="imgur_album" value="{{ $nade->imgur_album }}"> 
                            {{ $errors->first('imgur_album', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('youtube') ? 'has-error' : '' }}}">
                        <label for="youtube" class="col-xs-12">YouTube link</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=video" name="youtube" value="{{ $nade->youtube }}">                        
                            {{ $errors->first('youtube', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}}">
                        <!-- <label class="col-sm-12">Nade Type</label> -->
                        <label for="type" class="col-xs-12">Nade Type</label>
                        <div class="col-xs-12">
                            @foreach ($nade->getNadeTypes() as $nadeTypeKey => $nadeType)
                            <div class="radio">
                                <label>
                                    @if($nade->type == $nadeTypeKey)
                                        <input type="radio" name="type" value="{{ $nadeTypeKey }}" name="{{ $nadeTypeKey }}" checked>     
                                    @else
                                        <input type="radio" name="type" value="{{ $nadeTypeKey }}" name="{{ $nadeTypeKey }}">                        
                                    @endif         
                                        <i class="{{{ $nadeType['class'] }}}" title="{{{ $nadeType['label'] }}}"></i> {{{ $nadeType['label'] }}}
                                </label>
                            </div>
                            @endforeach
                            {{ $errors->first('type', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="col-xs-12">Tags</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" placeholder="double stack, car, garage" rows="2" name="tags">{{ $nade->tags }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{{ $errors->has('is_working') ? 'has-error' : '' }}}">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_working" checked>
                                        Nade is currently working
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('is_approved') ? 'has-error' : '' }}}">
                        @if($user->is_mod)
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_approved" checked>
                                    Nade is approved
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary">Submit Nade</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@stop
