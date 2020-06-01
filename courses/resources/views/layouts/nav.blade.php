<nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{route('frontend.home')}}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" >
                E-leaning
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="form-inline ml-auto" href="{{route('frontend.home')}}">
                <div class="form-group has-white">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Skills
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($skills as $skill)
                        <a class="dropdown-item" href="{{url('skill/'.$skill->id)}}">{{$skill->name}}</a>
                    @endforeach
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($categories as $category)
                        <a class="dropdown-item" href="{{url('category/'.$category->id)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>

                <li class="nav-item">
                    <a href="{{route('contactUs')}}" class="nav-link">Contact us</a>
                </li>

                @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}"  class="btn btn-danger btn-round">Login</a>
                </li>
                @else
                    <div class="nav-item dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  class="btn btn-danger btn-round nav-link dropdown-toggle">{{auth()->user()->name}}</a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>

                        </div>
                    </div>
                @endguest




































            </ul>
        </div>
    </div>
</nav>
