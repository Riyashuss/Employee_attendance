<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-2 bg-default
     <?php echo e($box ?? ''); ?>"
    id="sidenav-main">
    <div class="sidenav-header ">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 "
            href="<?php echo e(route('dashboards', ['page' => 'default'])); ?>">
            <img src="<?php echo e($logo ?? '/assets/img/logo-ct.png'); ?>" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold "><?php echo app('translator')->get('words.dk3app'); ?>  </span>			
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
		
			<li class="nav-item mt-3">
					<h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administrator</h6>
            </li>
			
            <li class="nav-item">
                <a href="#dashboard" class="nav-link active href=""
                    aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>               
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#users" class="nav-link <?php echo e(Route::currentRouteName() == 'users' ? 'active' : ''); ?>" href=""
                    aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-single-02 text-info text-sm opacity-10" style="color: #f4645f; font-size: large; font-weight: 500 "></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.users'); ?></span>
                </a>
                <div class="collapse show" id="users">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createuser' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ruler-pencil text-info text-sm opacity-10"></i>
								</div>
                                <span class="sidenav-normal"> Create User </span>
                            </a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'viewuser' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-paper-diploma text-info text-sm opacity-10" style="color: #f4645f; font-size: large; font-weight: 500 "></i>
								</div>
                                <span class="sidenav-normal"> View User </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
			
			<li class="nav-item">
                <a data-bs-toggle="collapse" href="#companies" class="nav-link <?php echo e(Route::currentRouteName() == 'companies' ? 'active' : ''); ?>" href=""
                    aria-controls="companies" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-building text-success text-sm opacity-10" ></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.companies'); ?></span>
                </a>
                <div class="collapse show" id="companies">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createcompany' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ruler-pencil text-success text-sm opacity-10"></i>
								</div>
                                <span class="sidenav-normal"> Create Company </span>
                            </a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'viewcompany' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ungroup text-success text-sm opacity-10"></i>
								</div>
                                <span class="sidenav-normal"> View Company </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
			
			<li class="nav-item">
                <a data-bs-toggle="collapse" href="#workorders" class="nav-link <?php echo e(Route::currentRouteName() == 'workorders' ? 'active' : ''); ?>" href=""
                    aria-controls="workorders" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-books text-danger text-sm opacity-10" ></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.workorders'); ?></span>
                </a>
                <div class="collapse show" id="workorders">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createworkorders' ? 'active' : ''); ?>" href="<?php echo e(route('wotest')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-ruler-pencil text-danger text-sm opacity-10"></i>
								</div>
                                <span class="sidenav-normal"> Create Work Order </span>
                            </a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'viewworkorders' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-box-2 text-danger text-sm opacity-10"></i>
								</div>
                                <span class="sidenav-normal"> View Work Order </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#configurations" class="nav-link <?php echo e(Route::currentRouteName() == 'configurations' ? 'active' : ''); ?>" href=""
                    aria-controls="configurations" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-settings text-sm opacity-10" style="color: #C6B317;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.configurations'); ?></span>
                </a>
                <div class="collapse show" id="configurations">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'lov' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-bullet-list-67 text-sm opacity-10" style="color: #C6B317;"></i>
								</div>
                                <span class="sidenav-normal"> LOV </span>
                            </a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'filemanagement' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-book-bookmark text-sm opacity-10" style="color: #C6B317;"></i>
								</div>
                                <span class="sidenav-normal"> File Management </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
			
			 <li class="nav-item">
                <a data-bs-toggle="collapse" href="#queries" class="nav-link <?php echo e(Route::currentRouteName() == 'queries' ? 'active' : ''); ?>" href=""
                    aria-controls="queries" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-settings text-sm opacity-10" style="color: #AB18CF;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.queries'); ?></span>
                </a>
                <div class="collapse show" id="queries">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createquery' ? 'active' : ''); ?>" href="<?php echo e(route('query')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="ni ni-bullet-list-67 text-sm opacity-10" style="color: #AB18CF;"></i>
								</div>
                                <span class="sidenav-normal"> Create Query </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
        </ul>
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\Dk3\resources\views/layouts/navbars/auth/sidenav_admin.blade.php ENDPATH**/ ?>