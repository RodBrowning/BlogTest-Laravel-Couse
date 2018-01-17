<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li id="homelink" class="nav-item">
        <a  class="nav-link {{ Request::is("/") ? 'active' : ''}}" href="/">Home<span class="sr-only">(current)</span></a>
      </li>
       <li id="blogLink" class="nav-item">
        <a class="nav-link {{ Request::is('/blog' ? 'active' : '') }}" href="/blog">Blog</a>
      </li>
      <li id="aboutLink" class="nav-item">
        <a class="nav-link {{ Request::is("about") ? 'active' : ''}}" href="/about">About</a>
      </li>     
      <li id="contactLink" class="nav-item">
        <a class="nav-link {{ Request::is("contact") ? 'active' : ''}}" href="/contact">Contact</a>
      </li>
    </ul>
      @if (Auth::check())
        <div class="dropdown">
          <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hello {{ ucfirst(Auth::user()->name)}}
          </button>
          <div style="left: -75px;" class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a href="{{ route('posts.index') }}" class="dropdown-item" >Posts</a>
            <a class="dropdown-item" href="{{ route('logout') }}" >Logout</a>
          </div>
          @else
          <div class="btn-group">
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('login') }}">Login</a>
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('get.register') }}">Register</a>
        </div>
      @endif
	</div>
  </div>
</nav>