<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\WaitList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WaitListController extends Controller
{
    const TOTAL_SPACES = 15;

    public function index() {
        $waitList = WaitList::all();
        $tickets = Ticket::all();

        return View::make('waitList')
            ->with('waitList', $waitList)
            ->with('tickets', $tickets);
    }

    public function create() {
        $tickets = Ticket::all();

        return view(
            'Page.enterWait',
            [
                'tickets' => $tickets
            ]
        );
    }

    public function store(Request $request) {
        $this->validate($request, [
            'firstName' => 'required|max:40',
            'lastName' => 'required|max:40',
            'email' => 'required|email'
        ]);

        $waitList = new WaitList;
        $waitList->firstName = $request->firstName;
        $waitList->lastName = $request->lastName;
        $waitList->email = $request->email;
        $waitList->save();

        return \Redirect::to('/waitList')
            ->withMessage('Thank you, ' . $waitList->firstName .
                '. You will receive an email once a spot becomes available.');
    }
}