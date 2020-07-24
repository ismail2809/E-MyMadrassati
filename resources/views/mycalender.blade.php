@extends('back.master')
@section('title','Profile')

@section('content')  
<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>

 
<div class="container">

    <div class="panel">

      <div class="row justify-content-center">

        <form method="post" action="{{url('/event')}}">
          {{ csrf_field() }} 

          <div class="col-md-3">
            <input type="text" class="form-control" name="title">
          </div>

          <div class="col-md-3">
            <input type="date" class="form-control" name="date">
          </div>

          <div class="col-md-2">
            <input type="time" class="form-control" name="start_date">
          </div>

          <div class="col-md-2">
            <input type="time" class="form-control" name="end_date">
          </div>
          
          <div class="col-md-2">
            <button type="submit" class="btn btn-info">Save</button> 
          </div>
        
        </form>

      </div>            

 
      <div class="panel-body" >

          {!! $calendar->calendar() !!}

          {!! $calendar->script() !!}

      </div>

    </div>

</div>
 
 
@endsection