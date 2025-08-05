<form role="form" method="post" action="{{ route('logout') }}" id="logout-form" class="d-inline-block">
    @csrf
	
    <label class="nav-link text-white font-weight-bold px-0 d-inline-block">
        <span class="d-sm-inline d-none me-3"> @lang('words.welcome') {{ auth()->user()->username }}</span>
    </label>
    
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-inline-block text-white">
        <span class="d-sm-inline d-none"> @lang('words.logout')</span>
    </a>
</form>