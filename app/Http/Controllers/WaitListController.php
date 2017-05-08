<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\WaitList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WaitListController extends Controller
{
    const TOTAL_SPACES = 5;

    public function index() {
        $waitList = WaitList::all();

        return View::make('waitList')
            ->with('waitList', $waitList);
    }

    public function create() {

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

        return redirect('/waitList');
    }

    public function update($id) {
    }

    public function edit($id) {
    }

    public function destroy($id) {
    }
}