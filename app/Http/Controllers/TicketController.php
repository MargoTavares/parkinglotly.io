<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
class TicketController extends Controller
{
    const TOTAL_SPACES   = 5;
    const PRICE_ONE_HR   = 300;
    const PRICE_THREE_HR = 450;
    const PRICE_SIX_HR   = 675;
    const PRICE_ALL_DAY  = 1075;

    public function index() {
        $tickets = Ticket::all();
        $prices = [
            '1' => self::PRICE_ONE_HR,
            '3' => self::PRICE_THREE_HR,
            '6' => self::PRICE_SIX_HR,
            'ALL DAY' => self::PRICE_ALL_DAY,
        ];
        return View::make('Page.index')
            ->with('tickets', $tickets)
            ->with('prices', $prices);
    }

    public function create() {
        $occupiedSpaces  = Ticket::all();
        $availableSpaces = self::TOTAL_SPACES - $occupiedSpaces->count();

        return view(
            'Page.enterLot',
            [
                'availableSpaces' => $availableSpaces,
                'totalSpaces'     => self::TOTAL_SPACES,
            ]
        );
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'          => 'required|max:40',
            'licensePlate'  => 'required|max:8',
            'rateTime'      => 'required'
        ]);

        $ticket               = new Ticket;
        $ticket->name         = $request->name;
        $ticket->licensePlate = $request->licensePlate;
        $ticket->rateTime     = $request->rateTime;
        $ticket->save();

        return \Redirect::to('/index')
            ->withMessage('Thank you, ' . $ticket->name .
                '. You have successfully created a ticket.');
    }

    public function markPaid($id) {
        $ticket             = Ticket::findOrFail($id);
        $ticket->is_valid   = ! Input::get('is_valid');
        $ticket->save();

        return \Redirect::to('/index');
    }

    public function update($id) {
        $rules = [
            'name'          => 'required',
            'licensePlate'  => 'required'
        ];
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('tickets/' . $id . '/edit')
                ->withErrors($validator);
        }

        $ticket = Ticket::find($id);
        $ticket->name           = Input::get('name');
        $ticket->licensePlate   = Input::get('licensePlate');
        $ticket->rateTime       = Input::get('rateTime');
        $ticket->save();

        return \Redirect::to('/index')
            ->withMessage('Successfully updated ticket.');
    }
    
    public function edit($id) {
        $occupiedSpaces     = Ticket::all();
        $availableSpaces    = self::TOTAL_SPACES - $occupiedSpaces->count();
        $ticket             = Ticket::findOrFail($id);

        return View::make('Page.enterLot')
            ->with('ticket', $ticket)
            ->with('availableSpaces', $availableSpaces)
            ->with('totalSpaces', self::TOTAL_SPACES);
    }

    public function destroy($id) {
        $ticket = Ticket::find($id);

        if($ticket->is_valid){
            $ticket->delete();

            return \Redirect::to('/goodbye');
        }
        else{
            \Session::flash('flash_message',
                'You must pay for your ticket before you leave.');

            return \Redirect::to('/index');
        }
    }

    public function welcome() {
        $occupiedSpaces  = Ticket::all();
        $availableSpaces = self::TOTAL_SPACES - $occupiedSpaces->count();

        return view(
            'Page.welcome',
            [
                'availableSpaces' => $availableSpaces,
                'totalSpaces'     => self::TOTAL_SPACES,
                'occupiedSpaces'  => $occupiedSpaces->count()
            ]
        );
    }
}