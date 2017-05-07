@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="csnews">
                <div class="csnews-item">
                    <div class="csnews-title">Public Beta Launch</div>
                    <div class="csnews-date">
                        <div class="csnews-month">nov</div>
                        <div class="csnews-day">08</div>
                    </div>
                    <div class="csnews-content">
                        We made it, the public beta is finally here! Feel free to start browsing, or create an account and add some nades. Since the site is still in beta, you will likely notice some features that do not work. This is normal, but rest assured that the website is being worked on daily with the intention of getting all the core parts of the site finished first. You can find a full list of requested features <a href="{{ route('get.features') }}">here</a>, or on the page footer.
                    </div>
                    <div class="csnews-footer">
                        Posted By <a>admin</a>
                    </div>
                </div>
                <div class="csnews-item">
                    <div class="csnews-title">New Website Design and Private Beta</div>
                    <div class="csnews-date">
                        <div class="csnews-month">nov</div>
                        <div class="csnews-day">01</div>
                    </div>
                    <div class="csnews-content">
                        The development team worked hard in the previous weeks to get CSNades to a usable beta. The primary goal was to allow limited users to sign up and add some nades to get  head start on the data. While the other developers were working on the back end, <a href="http://www.reddit.com/user/jung3o/">/u/jung3o</a> gave the front end a much needed facelift. With moderators and dedicated "nade adders" in place, this project was on the final steps toward a public beta.
                    </div>
                    <div class="csnews-footer">
                        Posted By <a>admin</a>
                    </div>
                </div>
                <div class="csnews-item">
                    <div class="csnews-title">Proof of Concept</div>
                    <div class="csnews-date">
                        <div class="csnews-month">oct</div>
                        <div class="csnews-day">15</div>
                    </div>
                    <div class="csnews-content">
                        An inspired user from the thread that started this project, <a href="http://www.reddit.com/user/NowNewStart">/u/NowNewStart</a>, decided to mock up a proof of concept functional design. He posted this thread to Reddit, and again, it received quite a warm welcome. A new steam group is created and the collaborators from the previous thread had come together to take from a concept to a fully functional project.
                    </div>
                    <div class="csnews-footer">
                        Posted By <a>admin</a>
                    </div>
                </div>
                <div class="csnews-item">
                    <div class="csnews-title">What Started It All</div>
                    <div class="csnews-date">
                        <div class="csnews-month">oct</div>
                        <div class="csnews-day">13</div>
                    </div>
                    <div class="csnews-content">
                        On October 13th, 2014 <a href="http://www.reddit.com/user/gas4u">/u/gas4u</a> created a thread asking for a website with searchable grenades for CS:GO. The thread was well received, and a few different users teamed up to collaborate on the project. There were several features suggested in the thread by users, and even great alternative websites to look at for inspiration. For a more complete read, see the <a href="http://www.reddit.com/r/GlobalOffensive/comments/2j4xvr/site_developers_out_there_would_it_be_possible_to/">thread on Reddit</a>.
                    </div>
                    <div class="csnews-footer">
                        Posted By <a>admin</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="csnade">
                <h4>Recent Nades</h4>
                <ul class="csnade-list">
                    @foreach($nades as $nade)
                    <li>
                        <a href="#">
                            <i class="{{ \App\Models\Nade::getNadeIcon($nade->type) }}" title="{{ App\Models\Nade::getNadeTypeLabel($nade->type) }}"></i>
                            {{{ $nade->title }}}
                            <span>{{{ $nade->map->name }}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
