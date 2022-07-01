<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>PROFILE</title>
@include('css.style')

</head>
<body>



@if(session()->has('updated'))
    <script> alert('Updated!')</script>
@endif




<div class="box_com">

<div class="header">

    <p>TODY</p>
    <a href="/open_home">Home</a>
</div>


<div style="height: 70%; overflow: auto; padding: 10px;">

<p class="item_stat">Profile</p>
@foreach($profile as $data)

<form action="/save_profile_update" method="get">
    
<input  class="text_profile" type="text" name="person_username" value="{{ $data->person_username}}">
<p class="label">Username</p>
<input  class="text_profile" type="text" name="person_password" value="{{ $data->person_password}}">
<p class="label">Password</p>
<input class="text_profile"  type="text" name="person_gender" value="{{ $data->person_gender}}">
<p class="label">Gender</p>
<input class="text_profile"  type="text" name="person_email" value="{{ $data->person_email}}">
<p class="label">Email</p>
<input class="text_profile"  type="text" name="person_number" value="{{ $data->person_number}}">
<p class="label">Number</p>


<input type="submit" class="spec_button" name="" value="Save">

</form>


<hr>
<div style="text-align:right;">
    <form action="/" method="get">
        <input type="submit" name="" value="Log out" class="spec_button">
    </form>
</div>
@endforeach


<p class="item_stat">History</p>

@foreach($tasks_cat as $data2)
<p class="cate">{{ $data2->task_category}}</p>
    @foreach($tasks as $data)
        @if($data->task_category == $data2->task_category)
    <div class="items">
       
          
       
            
            <p  style="display: inline;">{{ $data->task_name}} <span style="font-size: 11px; color:gray;">Date:{{ $data->created_at}} Category: {{$data->task_category}}</span></p>
      
    </div>
        @endif
    @endforeach
@endforeach
</div>


</div>




</body>

</html>