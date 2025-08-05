
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-2 fixed-start ms-2 bg-default <?php echo e($box ?? ''); ?>"
    id="sidenav-main">
    <div id="toggleSidebar">
   
        <!-- <i class="fas fa-list" id="toggleIcon" style="font-size: 24px; color: white;"></i> -->
    </div>
    <!-- <div class="sidenav-header" style="background-color:#338E8C; position: relative;">
      
        

        <a class="navbar-brand" href=""> -->
        <!-- <span class="toggle-btn" id="toggleBtn">☰</span> -->
            <!-- <img src="<?php echo e($logo ?? '/assets/img/logo.png'); ?>" class="navbar-brand-img" alt="main_logo"> -->
            <!-- <span class="font-weight-bold text-lg" style="width: 200px; margin-left: 58px;">Nilatech</span> -->
        <!-- </a>
    </div> -->
    <div class="sidenav " id="sidenav">
  
        <ul class="navbar-nav" >
            <li class="nav-item"  id="ddd1">
           
                <a href="<?php echo e(route('home')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'dashboard' ? 'active' : ''); ?>" href=""
                    aria-controls="dashboards" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <!-- <i class="fa fa-house text-sm opacity-10" style="color: #FD1717;"></i> -->
                    </div>
                   
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>               
            </li>


            <li class="nav-item" id="ddd">
                <a href="<?php echo e(route('home_user')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'dashboard' ? 'active' : ''); ?>" href=""
                    aria-controls="dashboard" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <!-- <i class="fa fa-house text-sm opacity-10" style="color: #FD1717;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1"><?php echo app('translator')->get('words.db'); ?></span>
                </a>               
            </li>
           
            
            <li class="nav-item sidemenuitem " id="menuUsers" style="display:none;">
                <a href="<?php echo e(route('users-management')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'users' ? 'active' : ''); ?>" href=""
                    aria-controls="users" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fa fa-user text-sm opacity-10" style="color: #FFFF00;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1">Details</span>
                </a>                
            </li>
            <li class="nav-item sidemenuitem" id="menuAttendance" style="display:none;">
                <a href="<?php echo e(route('home_attendance')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'attendance' ? 'active' : ''); ?>" href=""
                    aria-controls="attendance" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fas fa-history text-sm opacity-10" style="color: #00FF13;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1">Attendance</span>
                </a>                
            </li>
            <li class="nav-item sidemenuitem" id="menuProject" style="display:none;">
                <a href="<?php echo e(route('home_Project')); ?>" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'Project' ? 'active' : ''); ?>" href=""
                    aria-controls="Project" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fa-solid fa-dice opacity-10" style="color: #00FF13;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1">Project</span>
                </a>                
            </li>
           
           
            
           
            
            
           

           
           
                     
            
            <li class="nav-item sidemenuitem" id="details" style="display:none;">
                <a data-bs-toggle="collapse" href="#workorders" 
                class="nav-link <?php echo e(Route::currentRouteName() == 'details' ? 'active' : ''); ?>" href=""
                    aria-controls="details" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                        <!-- <i class="fa fa-file-lines text-sm opacity-10" style="color: #00FFFF;"></i> -->
                    </div>
                    <span class="nav-link-text ms-1">Details</span>
                </a>
                <div class="collapse show" id="details">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'createdetails' ? 'active' : ''); ?>" href="<?php echo e(route('user_details')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                    <!-- <i class="fa fa-file-pen text-sm opacity-10" style="color: #00FFFF;"></i> -->
                                </div>
                                <span class="sidenav-normal">User Details </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="collapse show" id="details">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo e(Route::currentRouteName() == 'projectview' ? 'active' : ''); ?>" href="<?php echo e(route('projectview')); ?>">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-end justify-content-center">
                                    <!-- <i class="fa fa-file-pen text-sm opacity-10" style="color: #00FFFF;"></i> -->
                                </div>
                                <span class="sidenav-normal"> Project Details </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
                 
        </ul>
    </div>
    

</aside>

<?php $__env->startPush('css'); ?>
<style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .sidenav {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #333;
      color: white;
      padding-top: 20px;
      transition: width 0.3s;
    }

    .sidenav a {
      padding: 10px 20px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: background-color 0.2s;
    }

    .sidenav a:hover {
      background-color: #575757;
    }

    .sidenav .toggle-switch {
      display: flex;
      align-items: center;
      padding: 10px 20px;
    }

    .sidenav .toggle-switch input {
      margin-left: auto;
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      transition: margin-left 0.3s;
    }

    .toggle-btn {
      position: absolute;
      top: 10px;
      left: 260px;
      font-size: 20px;
      cursor: pointer;
      color: #333;
      transition: left 0.3s;
    }

    .collapsed {
      width: 60px;
    }

    .collapsed a {
      text-align: center;
      font-size: 14px;
      padding: 10px;
    }

    .collapsed .toggle-switch {
      justify-content: center;
    }

    .collapsed .toggle-switch span {
      display: none;
    }

    .collapsed + .main {
      margin-left: 60px;
    }

    .collapsed + .toggle-btn {
      left: 70px;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?> <script>
    const sidenav = document.getElementById("sidenav");
    const toggleBtn = document.getElementById("toggleBtn");

    toggleBtn.addEventListener("click", () => {
      sidenav.classList.toggle("collapsed");
    });
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #toggleSidebar {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 999;
            cursor: pointer;
        }

        .sidenav {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 998;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidenav.hidden {
            transform: translateX(-100%);
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navbar-nav li {
            padding: 15px;
        }

        .navbar-nav li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .nav-link-text {
            margin-left: 10px;
        }
    </style>
    <?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\Employee_attendance\resources\views/layouts/navbars/auth/sidenav_admin.blade.php ENDPATH**/ ?>