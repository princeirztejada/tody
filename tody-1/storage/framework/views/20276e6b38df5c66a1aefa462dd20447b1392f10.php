<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>PROFILE</title>
<?php echo $__env->make('css.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>



<?php if(session()->has('updated')): ?>
    <script> alert('Updated!')</script>
<?php endif; ?>




<div class="box_com">

<div class="header">

    <p>TODY</p>
    <a href="/open_home">Home</a>
</div>


<div style="height: 70%; overflow: auto; padding: 10px;">

<p class="item_stat">Profile</p>
<?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<form action="/save_profile_update" method="get">
    
<input  class="text_profile" type="text" name="person_username" value="<?php echo e($data->person_username); ?>">
<p class="label">Username</p>
<input  class="text_profile" type="text" name="person_password" value="<?php echo e($data->person_password); ?>">
<p class="label">Password</p>
<input class="text_profile"  type="text" name="person_gender" value="<?php echo e($data->person_gender); ?>">
<p class="label">Gender</p>
<input class="text_profile"  type="text" name="person_email" value="<?php echo e($data->person_email); ?>">
<p class="label">Email</p>
<input class="text_profile"  type="text" name="person_number" value="<?php echo e($data->person_number); ?>">
<p class="label">Number</p>


<input type="submit" class="spec_button" name="" value="Save">

</form>


<hr>
<div style="text-align:right;">
    <form action="/" method="get">
        <input type="submit" name="" value="Log out" class="spec_button">
    </form>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<p class="item_stat">History</p>

<?php $__currentLoopData = $tasks_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p class="cate"><?php echo e($data2->task_category); ?></p>
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($data->task_category == $data2->task_category): ?>
    <div class="items">
       
          
       
            
            <p  style="display: inline;"><?php echo e($data->task_name); ?> <span style="font-size: 11px; color:gray;">Date:<?php echo e($data->created_at); ?> Category: <?php echo e($data->task_category); ?></span></p>
      
    </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


</div>




</body>

</html><?php /**PATH C:\Users\Marvin Coralde\tody\resources\views/profile.blade.php ENDPATH**/ ?>