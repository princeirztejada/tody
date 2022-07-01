<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $__env->make('css.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<title>WELCOME</title>

<style>
    
    input[type="text"],input[type="password"]{
        width: 100%;
        height: 30px;
        margin-top: 5px;
        padding-left: 4px;
    }
    .spec_button{
        margin-top: 10px;
    }
    
    @media  screen and (max-width: 500px) {
        .box_com{
            height: 130vh;
        }  
    }
</style>
</head>
<body>




<?php if(session()->has('login_not')): ?>
    <script> alert('Wrong usernam or password!')</script>
<?php endif; ?>
<?php if(session()->has('signup')): ?>
    <script> alert('Signup success proceed now to login!')</script>
<?php endif; ?>


<?php if(session()->has('username_use')): ?>
    <script> alert('Username already used!')</script>
<?php endif; ?>
<?php if(session()->has('password')): ?>
    <script> alert('Password did not match!')</script>
<?php endif; ?>
<?php if(session()->has('exp')): ?>
    <script> alert('Session Expired Please login!')</script>
<?php endif; ?>





<div class="box_com">

<div class="header">

    <p>TODY</p>
    <a href="">Welcome</a>
</div>


<div class="face">
            <form action="/signup_user" method="get" >
        <?php echo e(csrf_field()); ?>



<h3>Register</h3>
        
                <!-- <input type="file" name="image"> -->
        
                <input type="text" name="username" placeholder="Username" required=""> 
                <p class="label">Username</p>
                <input type="text" name="password" placeholder="Password" required=""> 
                <p class="label">Password</p>
                <input type="text" name="confirmpass" placeholder="Password" required=""> 
                <p class="label">Confirm-password</p>

                <input type="text" name="gender" placeholder="Gender" required=""> 
                <p class="label">Gender</p>
                <input type="text" name="email" placeholder="Email" required=""> 
                <p class="label">Email</p>
                <input type="text" name="number" placeholder="Contact Number" required=""> 
                <p class="label">Contact Number</p>
                
                
                <input class="spec_button" type="submit" name="" value="SIGN UP" >
        </form>

</div>

<div class="face"> 

    <h3>Login</h3>
        <form action="/login_user" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="text" name="username" placeholder="username"> 
            <p class="label">Username</p>
            <input type="password" name="password" placeholder="password"> 
            <p class="label">Password</p>
            <input type="submit" name="" value="LOGIN" class="spec_button">
        </form>
</div>

</div>

</body>
</html><?php /**PATH C:\Users\Marvin Coralde\tody\resources\views/welcome.blade.php ENDPATH**/ ?>