<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $__env->make('css.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<title>HOME</title>
</head>
<body>



<?php if(session()->has('login')): ?>
    <script> alert('Welcome!')</script>
<?php endif; ?>




<div class="box_com">

<div class="header">

    <p>TODY</p>
    <a href="/open_profile"><?php echo e(session()->get('person_username_sessions')); ?></a>
</div>


<div style="height: 70%; overflow: auto; padding: 10px;">
    

<p class="item_stat">Task Ongoing</p>


    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       
    <div class="items" >
        <form action="/task_done" method="get" >
            <?php echo e(csrf_field()); ?>

            <input style="display: inline;" type="hidden" name="id" value="<?php echo e($data->task_id); ?>">
            <input style="display: inline;" type="checkbox" name="" onchange="this.form.submit()">
            <p  style="display: inline;"><?php echo e($data->task_name); ?> <span style="font-size: 11px; color:gray;"><?php echo e(substr( $data->created_at, 0,11)); ?> <?php echo e($data->task_category); ?></span></p>
        </form>
    </div>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


 <hr style="margin-bottom: 40px; margin-top:40px;">

<p class="item_stat">Task Done</p>


    <?php $__currentLoopData = $tasks_done; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       
    <div class="items">
        <form action="/task_undone" method="get" >
            <?php echo e(csrf_field()); ?>

            <input style="display: inline;" type="hidden" name="id" value="<?php echo e($data->task_id); ?>">
            <input style="display: inline;" type="checkbox" name="" onchange="this.form.submit()" checked="true">
            <p  style="display: inline;"><?php echo e($data->task_name); ?> <span style="font-size: 11px; color:gray;"><?php echo e(substr( $data->created_at, 0,11)); ?> <?php echo e($data->task_category); ?></span></p>
        </form>
    </div>
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




</div>










<div class="footer">

<div style="text-align: right; margin-top: 20px;">
    
<form method="get" action="/hide" >
    <input type="submit" name="" class="" style="border-style: none; padding: 10px; background-color: white; color: black; " value="Remove all finished tasks?" >
</form>
    
</div>


<form method="get" action="/add_task" class="line_form">
    <input class="task_entry" type="text" name="task_name" required="" placeholder="Task here">
    <input type="submit" name="" value="Create" class="spec_button">
    <select name="task_category" class="select_" style="">
        <option>
        Random
        </option>
        <option>
        Deep Work
        </option>
        <option>
        Shallow Work
        </option>
        <option>
        Learning
        </option>
        <option>
        Chores
        </option>
        <option>
        Mind Care
        </option>
        <option>
        Body Care
        </option>
        <option>
        People
        </option>
        <option>
        Next Week
        </option>
    </select>
    
</form>




</div>

</div>

</body>

</html>

<?php /**PATH C:\Users\Marvin Coralde\tody\resources\views/home.blade.php ENDPATH**/ ?>