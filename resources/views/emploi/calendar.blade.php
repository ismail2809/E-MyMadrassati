 @extends('back.master')
@section('content') 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>



 <div class="content">
    <div class="container-fluid">
      <div class="header text-center">
        <h3 class="title">FullCalendar.io</h3>
        <p class="category">Handcrafted by our friends from
          <a target="_blank" href="https://fullcalendar.io/" rel="nofollow">FullCalendar.io</a>. Please checkout their
          <a href="https://fullcalendar.io/docs/" target="_blank" rel="nofollow">full documentation.</a>
        </p>
      </div>
      <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-calendar">
            <div class="card-body ">
                  {!! $calendar->calendar() !!}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    {!! $calendar->script() !!}
@endsection  