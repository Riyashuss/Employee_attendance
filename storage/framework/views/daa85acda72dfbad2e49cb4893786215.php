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
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav" >
            <li class="nav-item">
                <a href="<?php echo e(route('home')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'dashboard' ? 'active' : ''); ?>" href=""
                    aria-controls="dashboard" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-house text-sm opacity-10" style="color: #FD1717;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.db'); ?></span>
                </a>               
            </li>
           
            
            <li class="nav-item sidemenuitem " id="menuUsers" style="display:none;">
                <a href="<?php echo e(route('users-management')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'users' ? 'active' : ''); ?>" href=""
                    aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-user text-sm opacity-10" style="color: #FFFF00;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.users'); ?></span>
                </a>                
            </li>
            <li class="nav-item sidemenuitem" id="menuWorkOrderHistory" style="display:none;">
                <a href="<?php echo e(route('home_workorderhistory')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'workorderhistory' ? 'active' : ''); ?>" href=""
                    aria-controls="workorderhistory" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fas fa-history text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.wohistory'); ?></span>
                </a>                
            </li>
            <li class="nav-item sidemenuitem" id="menuWorkFlowChange" style="display:none;">
                <a href="<?php echo e(route('home_workflowchange')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'workflowchange' ? 'active' : ''); ?>" href=""
                    aria-controls="workflowchange" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa-solid fa-dice opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.wfchange'); ?></span>
                </a>                
            </li>
            <!-- <li class="nav-item sidemenuitem" id="menuelementManage" style="display:none;">
                <a href="<?php echo e(route('home_element')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'element_management' ? 'active' : ''); ?>" href=""
                    aria-controls="element_management" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fas fa-history text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.elementmanagement'); ?></span>
                </a>                
            </li> -->
            
             <li class="nav-item sidemenuitem" id="menuDatapreparation" style="display:none;">
                <a href="<?php echo e(route('home_datapreparation')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'datapreparation' ? 'active' : ''); ?>" href=""
                    aria-controls="datapreparation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-database text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.dp'); ?></span>
                    <sup id="menudatacount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color: #00FF13;color: white; font-weight: 700;font-size:12px "></sup>
                </a>                
            </li>
            
            <li class="nav-item sidemenuitem" id="menuPreproduction" style="display:none;">
                <a href="<?php echo e(route('home_preproduction')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'preproduction' ? 'active' : ''); ?>" href=""
                    aria-controls="preproduction" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-file-contract text-sm opacity-10" style="color: #FF7C00;"></i>
                    </div>
                    
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.pp'); ?></span>
                    <sup id="menuPreproductioncount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color: #FF7C00;color: white;font-weight: 700; font-size:12px "></sup>
                </a>                
            </li>
            
            <li class="nav-item sidemenuitem" id="menuSurvey" style="display:none;">
                <a href="<?php echo e(route('home_survey')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'survey' ? 'active' : ''); ?>" href=""
                    aria-controls="survey" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-compass text-sm opacity-10" style="color: #00FF13;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.survey'); ?></span>
                    <sup id="menuSurveycount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:#00FF13;color: white;font-weight: 700; font-size:12px "></sup>
                </a>                
            </li>
            
            <li class="nav-item sidemenuitem" id="menuMapCreation" style="display:none;">
                <a href="<?php echo e(route('home_mapcreation')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'mapcreation' ? 'active' : ''); ?>" href=""
                    aria-controls="mapcreation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-map text-sm opacity-10" style="color: #FF69B4;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.mapcreation'); ?></span>
                    <sup id="menuMapcount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #FF69B4;color: white;font-weight: 700; font-size:12px "></sup>
                </a>                
            </li>
            <li class="nav-item sidemenuitem" id="menumapattribute" style="display:none;">
                <a href="<?php echo e(route('home_mapattribute')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'menumapattribute' ? 'active' : ''); ?>" href=""
                    aria-controls="menumapattribute" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                    <i class="fa-solid fa-map-location-dot" style="color: #25f500;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.modelcreationattribute'); ?></span>
                     </a>                
            </li>

            <li class="nav-item sidemenuitem" id="menumodelstatus" style="display:none;">
                <a href="<?php echo e(route('home_mapattribute')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'menumodelstatus' ? 'active' : ''); ?>" href=""
                    aria-controls="menumodelstatus" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                    <i class="fa-brands fa-usps" style="color: #25f500;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.modelstatus'); ?></span>
                     </a>                
            </li>
            <!-- <li class="nav-item sidemenuitem" id="menumodelareaattribute" style="display:none;">
                <a href="<?php echo e(route('home_modelareaattribute')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'menumodelareaattribute' ? 'active' : ''); ?>" href=""
                    aria-controls="menumodelareaattribute" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                    <i class="fa-solid fa-map-location-dot" style="color: #25f500;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Model Area Attribute</span>
                    <sup id="menumodelareaattributecount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #FF69B4;color: white;font-weight: 700; font-size:12px "></sup>
                </a>                
            </li> -->
            
            <li class="nav-item sidemenuitem" id="menuModelCreation" style="display:none;">
                <a href="<?php echo e(route('home_modelcreation')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'modelcreation' ? 'active' : ''); ?>" href=""
                    aria-controls="modelcreation" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-cube text-sm opacity-10" style="color: #C6B317;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.modelcreation'); ?></span>
                    <sup id="menuModelcount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #C6B317;color: white;font-weight: 700; font-size:12px "></sup>
                   
                </a>                
            </li> 

            <li class="nav-item sidemenuitem" id="menuFinalDownload" style="display:none;">
                <a href="<?php echo e(route('home_downloadFinal')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'downloadCADApp' ? 'active' : ''); ?>" href=""
                    aria-controls="downloadCADApp" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa-solid fa-file-arrow-down text-sm opacity-10" style="color: #d4d4d4;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.finaldownload'); ?></span>
                    <!-- <sup id="menuModelcount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #C6B317;color: white;font-weight: 700; font-size:12px "></sup> -->
                   
                </a>                
            </li> 

            <li class="nav-item sidemenuitem" id="menuDownloadDispatch" style="display:none;">
                <a href="<?php echo e(route('home_dispatch_side')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'dispatch' ? 'active' : ''); ?>" href=""
                    aria-controls="dispatch" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa-solid fa-arrow-up-right-from-square text-sm opacity-10" style="color: #C6B317;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.dispatch'); ?></span>
                    <!-- <sup id="menuModelcount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #C6B317;color: white;font-weight: 700; font-size:12px "></sup> -->
                   
                </a>                
            </li>       

            <li class="nav-item sidemenuitem" id="menuDownloadCADApp" style="display:none;">
                <a href="<?php echo e(route('home_downloadCADApp')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'downloadCADApp' ? 'active' : ''); ?>" href=""
                    aria-controls="downloadCADApp" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="fa fa-download text-sm opacity-10" style="color: #C6B317;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.downloadCADApp'); ?></span>
                    <!-- <sup id="menuModelcount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #C6B317;color: white;font-weight: 700; font-size:12px "></sup> -->
                   
                </a>                
            </li>           
            
            <li class="nav-item sidemenuitem" id="menuWorkOrder" style="display:none;">
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
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.createworkorder'); ?> </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item sidemenuitem" id="menuConfiguration" style="display:none;">
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
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.objectDM'); ?> </span>
                            </a>
                        </li>
                        
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'lov' ? 'active' : ''); ?>" href="<?php echo e(route('listofvalues')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                    <i class="fa fa-rectangle-list text-sm opacity-10" style="color: #FF7C00;"></i>
                                </div>
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.lov'); ?> </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item sidemenuitem" id="qc" style="display:none;">
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
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.ppqc'); ?> </span>
                                <sup id="menuPreqccount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #FF69B4;color: white;font-weight: 700; font-size:12px "></sup>
                            </a>
                        </li>
                        
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createqc' ? 'active' : ''); ?>" href="<?php echo e(route('home_mapqcassign')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                    <i class="fa-solid fa-check text-sm opacity-10" style="color: #00FFFF;"></i>
                                </div>
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.mcqc'); ?> </span>

                                <sup id="menuMapqccount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #FF69B4;color: white;font-weight: 700; font-size:12px "></sup>
                            </a>
                        </li> 
                        <!-- <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createqc' ? 'active' : ''); ?>" href="<?php echo e(route('home_modelareaqcassign')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                    <i class="fa-solid fa-check text-sm opacity-10" style="color: #00FFFF;"></i>
                                </div>
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.modelareaqc'); ?> </span>
                                <sup id="menuModelareaqccount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #FF69B4;color: white;font-weight: 700; font-size:12px "></sup>
                            </a>
                        </li> -->
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createqc' ? 'active' : ''); ?>" href="<?php echo e(route('home_modelqcassign')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                    <i class="fa-solid fa-check text-sm opacity-10" style="color: #00FFFF;"></i>
                                </div>
                                <span class="sidenav-normal"> <?php echo app('translator')->get('words.moqc'); ?> </span>
                                <sup id="menuModelqccount" class="nav-link-text ms-1 round" style="display: inline-block;width: 20px;height: 20px;line-height: 20px; text-align: center;border-radius: 50%; background-color:  #FF69B4;color: white;font-weight: 700; font-size:12px "></sup>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- <li class="nav-item sidemenuitem" id="menuDownloaddata">
                <a href="<?php echo e(route('home_downloaddata')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'zipFile' ? 'active' : ''); ?>" href=""
                    aria-controls="downloaddata" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <i class="ni ni-bold-down text-sm opacity-10" style="color: #d4d4d4;"></i>
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.data'); ?></span>
                </a>                
            </li> 
            -->
                 
        </ul>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\Dk3app_Final\Dk3app_Final\dk3app\resources\views/layouts/navbars/auth/sidenav_admin.blade.php ENDPATH**/ ?>