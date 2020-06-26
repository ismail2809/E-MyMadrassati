<!doctype html>

<html lang="en">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>

<body>

<div class="container">

    <div class="panel">

        <div class="panel-heading">

            <div class="row justify-content-center">

              <form method="post" action="{{url('/event')}}">
              {{ csrf_field() }} 
              <input type="text" class="form-control" name="title">
              <input type="time" class="form-control" name="start_date">
              <input type="time" class="form-control" name="end_date">
              <button type="submit" class="btn btn-info">Finish</button> 
              </form>

            </div>            

        </div>

        <div class="panel-body" >

            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}

        </div>

    </div>

</div>

</body>

</html>