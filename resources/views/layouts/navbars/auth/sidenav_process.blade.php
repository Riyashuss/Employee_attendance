<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-2 fixed-start ms-2 bg-default
     {{ $box ?? ''}}"
    id="sidenav-main">
    <div class="sidenav-header bg-info">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand"
            href="">
            <img src="{{ $logo ?? '/assets/img/favicon.png'}}" class="navbar-brand-img" alt="main_logo">
            <span class="ms-2 font-weight-bold text-lg text-dark">@lang('words.dk3app')  </span>			
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
        @if(isset($roleId))
         @if($roleId == 1)
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#preproduction" class="nav-link {{ Route::currentRouteName() == 'preproduction' ? 'active' : '' }}" href=""
                    aria-controls="preproduction" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-books text-sm opacity-10" style="color: #a481f7; font-size: large; font-weight: 500 "></i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('words.preproduction')</span>
                </a>
                <div class="collapse show" id="preproduction">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{ Route::currentRouteName() == 'preproduction' ? 'active' : '' }}" href="{{ route('home_preproduction') }}">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ruler-pencil text-sm opacity-10" style="color: #a481f7; font-size: large; font-weight: 500 "></i>
								</div>
                                <span class="sidenav-normal"> View </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @elseif($roleId == 2)
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#survey" class="nav-link {{ Route::currentRouteName() == 'survey' ? 'active' : '' }}" href=""
                    aria-controls="survey" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-books text-sm opacity-10" ></i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('words.survey')</span>
                </a>
                <div class="collapse show" id="survey">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{ Route::currentRouteName() == 'survey' ? 'active' : '' }}" href="{{ route('home_survey') }}">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ruler-pencil text-sm opacity-10"></i>
								</div>
                                <span class="sidenav-normal"> View </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
			@elseif($roleId == 3)
			<li class="nav-item">
                <a data-bs-toggle="collapse" href="#mapcreation" class="nav-link {{ Route::currentRouteName() == 'mapcreation' ? 'active' : '' }}" href=""
                    aria-controls="mapcreation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-books text-sm opacity-10" style="color: #cc70cc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('words.mapcreation')</span>
                </a>
                <div class="collapse show" id="mapcreation">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{ Route::currentRouteName() == 'mapcreation' ? 'active' : '' }}" href="{{ route('home_mapcreation') }}">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ruler-pencil text-info text-sm opacity-10" style="color: #cc70cc;"></i>
								</div>
                                <span class="sidenav-normal"> View </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        @endif
        </ul>
    </div>
</aside>
