<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
class TicketController extends Controller
{
    const TOTAL_SPACES = 5;
    const PRICE_ONE_HR = 300;
    const PRICE_THREE_HR = 450;
    const PRICE_SIX_HR = 675;
    const PRICE_ALL_DAY= 1075;

    public function index() {
        $tickets = Ticket::all();
        $prices = [
            '1' => self::PRICE_ONE_HR,
            '3' => self::PRICE_THREE_HR,
            '6' => self::PRICE_SIX_HR,
            'ALL DAY' => self::PRICE_ALL_DAY,
        ];

        return View::make('index')
            ->with('tickets', $tickets)
            ->with('prices', $prices);
    }

    public function create() {
        $occupiedSpaces = Ticket::all();
        $availableSpaces = self::TOTAL_SPACES - $occupiedSpaces->count();

        return view(
            'enterLot',
            [
                'availableSpaces' => $availableSpaces,
                'totalSpaces' => self::TOTAL_SPACES,
            ]
        );
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:40',
            'licensePlate' => 'required|max:8',
            'rateTime' => 'required'
        ]);

        $ticket = new Ticket;
        $ticket->name = $request->name;
        $ticket->licensePlate = $request->licensePlate;
        $ticket->rateTime = $request->rateTime;
        $ticket->save();

        return redirect('/index');
    }

    public function update($id) {
        $ticket = Ticket::findOrFail($id);

        $ticket->is_valid = ! Input::get('is_valid');

        $ticket->save();
    }
    
    public function edit($id) {
        $ticket = Ticket::find($id);

        $ticket->is_valid = ! Input::get('is_valid');

        $ticket->save();

        return redirect('/index');
    }

    public function destroy($id) {
        $ticket = Ticket::find($id);

        if($ticket->is_valid){
            $ticket->delete();
            return redirect('/goodbye');
        }
        else{
            \Session::flash('flash_message',
                'You must pay for your ticket before you leave.');
            return redirect('/index');
        }



    }
}