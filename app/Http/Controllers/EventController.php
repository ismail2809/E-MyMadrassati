<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Calendar;
use App\Event;
use App\Classe;
use App\Année;
use App\Matiere;

class EventController extends Controller{
    
    public function index(){

       $events = [];

       $data = Event::all();

       if($data->count()){

          foreach ($data as $key => $value) {

            $events[] = Calendar::event(
                $value->title,
                true,
                $value->start_date,
                $value->end_date
            );

          }

       }

      $calendar = Calendar::addEvents($events); 

        $années = Année::all();
        $matieres = Matiere::all(); 
        $classes = Classe::all();
      return view('mycalender', compact('calendar','années','classes','matieres'));

    }
    public function store(Request $request){
            //dd($request);
            $event              = new Event();
            $event->title       = $request->title;                         
            $event->start_date  = $request->start_date;
            $event->end_date    = $request->end_date;
            $event->save();

            return back();
    }

}