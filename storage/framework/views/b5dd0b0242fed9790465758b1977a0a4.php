<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-2 fixed-start ms-2 bg-default
     <?php echo e($box ?? ''); ?>"
    id="sidenav-main">
    <div class="sidenav-header bg-info">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand"
            href="">
            <img src="<?php echo e($logo ?? '/assets/img/favicon.png'); ?>" class="navbar-brand-img" alt="main_logo">
            <span class="ms-2 font-weight-bold text-lg text-dark "><?php echo app('translator')->get('words.dk3app'); ?>  </span>			
        </a>
    </div>   
	<!--<div class="sidenav-header bg-primary">        
        <a class="navbar-brand" href="">            
            <span class="ms-2 font-weight-bold text-lg text-white "></span>			
        </a>
    </div>-->
	<!--<hr class="horizontal dark mt-0">-->
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
		
			<!--<li class="nav-item mt-3 ">
				<h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administrator</h6>
            </li>-->
			
            <li class="nav-item">
                <a href="<?php echo e(route('home')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'dashboard' ? 'active' : ''); ?>" href=""
                    aria-controls="dashboard" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-house text-sm opacity-10" style="color: #FD1717;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>               
            </li>
			
            <li class="nav-item sidemenuitem " id="menuCompany">
                <a href="<?php echo e(route('company-management')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'companies' ? 'active' : ''); ?>" href=""
                    aria-controls="companies" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-industry text-sm opacity-10" style="color:#00FFFF;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.companies'); ?></span>
                </a>
            </li>
			
            <li class="nav-item sidemenuitem " id="menuUsers">
                <a href="<?php echo e(route('users-management')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'users' ? 'active' : ''); ?>" href=""
                    aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-user text-sm opacity-10" style="color: #FFFF00;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.users'); ?></span>
                </a>                
            </li>
			 <li class="nav-item sidemenuitem" id="menuDatapreparation">
                <a href="<?php echo e(route('home_datapreparation')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'datapreparation' ? 'active' : ''); ?>" href=""
                    aria-controls="datapreparation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-database text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Preparation</span>
                </a>                
            </li>
			
			<li class="nav-item sidemenuitem" id="menuPreproduction">
                <a href="<?php echo e(route('home_preproduction')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'preproduction' ? 'active' : ''); ?>" href=""
                    aria-controls="preproduction" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-file-contract text-sm opacity-10" style="color: #FF7C00;"></i>
                    </div>
                    <span class="nav-link-text ms-1">PreProduction</span>
                </a>                
            </li>
			
			<li class="nav-item sidemenuitem" id="menuSurvey">
                <a href="<?php echo e(route('home_survey')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'survey' ? 'active' : ''); ?>" href=""
                    aria-controls="survey" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-compass text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Survey</span>
                </a>                
            </li>
			
			<li class="nav-item sidemenuitem" id="menuMapCreation">
                <a href="<?php echo e(route('home_mapcreation')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'mapcreation' ? 'active' : ''); ?>" href=""
                    aria-controls="mapcreation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-map text-sm opacity-10" style="color: #FF69B4;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Map Creation</span>
                </a>                
            </li>
			
			<li class="nav-item sidemenuitem" id="menuModelCreation">
                <a href="<?php echo e(route('home_modelcreation')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'modelcreation' ? 'active' : ''); ?>" href=""
                    aria-controls="modelcreation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-cube text-sm opacity-10" style="color: #C6B317;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Model Creation</span>
                </a>                
            </li>			
			
			<li class="nav-item sidemenuitem" id="menuWorkOrder">
                <a data-bs-toggle="collapse" href="#workorders" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'workorders' ? 'active' : ''); ?>" href=""
                    aria-controls="workorders" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-file-lines text-sm opacity-10" style="color: #00FFFF;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.workorders'); ?></span>
                </a>
                <div class="collapse show" id="workorders">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createworkorder' ? 'active' : ''); ?>" href="<?php echo e(route('wo_create')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-file-pen text-sm opacity-10" style="color: #00FFFF;"></i>
								</div>
                                <span class="sidenav-normal"> Create Work Order </span>
                            </a>
                        </li>
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'workorderstatus' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-file-circle-question text-sm opacity-10" style="color: #00FFFF;"></i>
								</div>
                                <span class="sidenav-normal"> Work Order Status </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item sidemenuitem" id="menuConfiguration">
                <a data-bs-toggle="collapse" href="#configurations" class="nav-link <?php echo e(Route::currentRouteName() == 'configurations' ? 'active' : ''); ?>" href=""
                    aria-controls="configurations" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-gear text-sm opacity-10" style="color: #FF7C00;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.configurations'); ?></span>
                </a>
                <div class="collapse show" id="configurations">
                    <ul class="nav ms-4">
                        
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'objectdatamanagement' ? 'active' : ''); ?>" href="<?php echo e(route('object_table')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-database text-sm opacity-10" style="color: #FF7C00;"></i>
								</div>
                                <span class="sidenav-normal"> Object Data Management </span>
                            </a>
                        </li>
						
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'lov' ? 'active' : ''); ?>" href="<?php echo e(route('listofvalues')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-rectangle-list text-sm opacity-10" style="color: #FF7C00;"></i>
								</div>
                                <span class="sidenav-normal"> LOV </span>
                            </a>
                        </li>
						
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'settings' ? 'active' : ''); ?>" href="#">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-rectangle-list text-sm opacity-10" style="color: #FF7C00;"></i>
								</div>
                                <span class="sidenav-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item sidemenuitem" id="qc" >
                <a data-bs-toggle="collapse" href="#preproductionqc" class="nav-link <?php echo e(Route::currentRouteName() == 'qc' ? 'active' : ''); ?>" href=""
                    aria-controls="queries" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                    <i class="fa-solid fa-q" style="color: #00FFFF;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('QC'); ?></span>
                </a>
                <div class="collapse show" id="preproductionqc">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createqc' ? 'active' : ''); ?>" href="<?php echo e(route('home_qcassign')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                <i class="fa-solid fa-check"style="color: #00FFFF;"></i>
								</div>
                                <span class="sidenav-normal"> Preproduction QC </span>
                            </a>
                        </li>
						
						<!-- <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'viewquery' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-eye text-sm opacity-10" style="color: #00FF13;"></i>
								</div>
                                <span class="sidenav-normal"> View Query </span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </li>
			 <li class="nav-item sidemenuitem" id="menuQueries" >
                <a data-bs-toggle="collapse" href="#queries" class="nav-link <?php echo e(Route::currentRouteName() == 'queries' ? 'active' : ''); ?>" href=""
                    aria-controls="queries" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-clipboard-question text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.queries'); ?></span>
                </a>
                <div class="collapse show" id="queries">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createquery' ? 'active' : ''); ?>" href="<?php echo e(route('query')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-pen text-sm opacity-10" style="color: #00FF13;"></i>
								</div>
                                <span class="sidenav-normal"> Create Query </span>
                            </a>
                        </li>
						
						<li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'viewquery' ? 'active' : ''); ?>" href="">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
									<i class="fa fa-eye text-sm opacity-10" style="color: #00FF13;"></i>
								</div>
                                <span class="sidenav-normal"> View Query </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item sidemenuitem" id="menuDownloadCADApp">
                <a href="<?php echo e(route('home_downloadCADApp')); ?>" 
				class="nav-link <?php echo e(Route::currentRouteName() == 'zipFile' ? 'active' : ''); ?>" href=""
                    aria-controls="downloadCADApp" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-bold-down text-sm opacity-10" style="color: #d4d4d4;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Download CAD App</span>
                </a>                
            </li>		
        </ul>
    </div>
</aside>
<?php /**PATH D:\Ramesh\Projectstart\dk3app-04-05\dk3app\resources\views/layouts/navbars/auth/sidenav_admin.blade.php ENDPATH**/ ?>