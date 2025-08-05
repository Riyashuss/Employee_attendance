
<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
    <div class="container-fluid py-1 px-3">
        <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.finaldownload')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                <li class="nav-item d-flex align-items-center">
                    <?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </li>
                <?php if(auth()->user()->id != 1): ?>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="#" onclick='profileSetting(<?php echo e(auth()->user()->id); ?>);'>
                        <span class=''>
                            <i class="fa fa-user me-sm-0" style="color: white;"></i>
                        </span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="card mx-1 my-1 mt-1 pt-1" id="basic-info">
    <div class="card-header mt-1 pt-1">
        <h5><?php echo app('translator')->get('words.finaldownload'); ?></h5>
    </div>
    <div class="card-body mt-1 pt-1">
        
                <form method="POST" action="<?php echo e(route('downloadZip')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row mt-4">
                    <div class="col-lg-2 pt-1 text-end">
                        <label class="form-label"><?php echo app('translator')->get('words.modelareaname'); ?></label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <select class="form-control rounded" name="modelarea_name" id="modelarea_name">
                                <option value="0">...</option>
                                <?php $__currentLoopData = $modelarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelareaname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($modelareaname->modelarea_id); ?>" <?php echo e(old('modelarea_name') == $modelareaname->modelarea_id ? 'selected' : ''); ?>>
                                        <?php echo e($modelareaname->modelarea_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button id="btnUploadIVLFile" type="submit" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.download'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="/assets/js/plugins/choices.min.js"></script>
<script src="/assets/js/core/jquery.min.js"></script>
<script>


function profileSetting(user) {
    window.location.href = "/profileView/" + user;
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/home_downloadFinal.blade.php ENDPATH**/ ?>