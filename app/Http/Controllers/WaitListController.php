<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WaitListController extends Controller
{
    const TOTAL_SPACES = 5;

    public function index() {
        $waitList = WaitList::all();

        return View::make('waitList')
            ->with('waitListMembers', $waitList);
    }

    public function create() {
        $occupiedSpaces = Ticket::all();
        $availableSpaces = self::TOTAL_SPACES - $occupiedSpaces->count();

        return view(
            'enterWait',
            [
                'availableSpaces' => $availableSpaces,
                'totalSpaces' => self::TOTAL_SPACES,
            ]
        );
    }

    public function store(Request $request) {
        $this->validate($request, [
            'firstName' => 'required|max:40',
            'lastName' => 'required|max:40',
        ]);

        $waitList = new WaitList;
        $waitList->firstName = $request->firstName;
        $waitList->lastName = $request->lastName;
        $waitList->save();

        return redirect('/waitList');
    }

    public function update($id) {
    }

    public function edit($id) {
    }

    public function destroy($id) {
    }
}