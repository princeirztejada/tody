<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
@include('css.style')


<title>HOME</title>
</head>
<body>



@if(session()->has('login'))
    <script> alert('Welcome!')</script>
@endif




<div class="box_com">

<div class="header">

    <p>TODY</p>
    <a href="/open_profile">{{session()->get('person_username_sessions')}}</a>
</div>


<div style="height: 70%; overflow: auto; padding: 10px;">
    

<p class="item_stat">Task Ongoing</p>


    @foreach($tasks as $data)
       
    <div class="items" >
        <form action="/task_done" method="get" >
            {{csrf_field()}}
            <input style="display: inline;" type="hidden" name="id" value="{{ $data->task_id}}">
            <input style="display: inline;" type="checkbox" name="" onchange="this.form.submit()">
            <p  style="display: inline;">{{ $data->task_name}} <span style="font-size: 11px; color:gray;">{{substr( $data->created_at, 0,11)}} {{ $data->task_category}}</span></p>
        </form>
    </div>
    
    @endforeach


 <hr style="margin-bottom: 40px; margin-top:40px;">

<p class="item_stat">Task Done</p>


    @foreach($tasks_done as $data)
       
    <div class="items">
        <form action="/task_undone" method="get" >
            {{csrf_field()}}
            <input style="display: inline;" type="hidden" name="id" value="{{ $data->task_id}}">
            <input style="display: inline;" type="checkbox" name="" onchange="this.form.submit()" checked="true">
            <p  style="display: inline;">{{ $data->task_name}} <span style="font-size: 11px; color:gray;">{{substr( $data->created_at, 0,11)}} {{ $data->task_category}}</span></p>
        </form>
    </div>
      
    @endforeach




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

