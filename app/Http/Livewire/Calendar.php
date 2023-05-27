<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Event;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event::where('user_id',auth()->user()->id)->select('id','title','start','end')->get();

        return  json_encode($events);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        $input['user_id'] = auth()->user()->id;
        Event::create($input);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {
      $eventdata = Event::find($oldEvent['id']);
      $eventdata->start = $event['start'];
        $eventdata->user_id = auth()->user()->id;
      $eventdata->save();
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function render()
    {
        $events = Event::where('user_id',auth()->user()->id)->select('id','title','start')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}