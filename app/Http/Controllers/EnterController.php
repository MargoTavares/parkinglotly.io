<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EnterController extends Controller
{
    const TOTAL_SPACES = 5;

    public function index() {
        $tickets = Ticket::all();

        return View::make('index')
            ->with('tickets', $tickets);
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

    public function update() {
        dd('high');
    }
    
    public function edit($id) {
        $ticket = Ticket::find($id);

        return View::make('edit')
            ->with('ticket', $ticket);

    }

    public function destroy($id) {

    }
}