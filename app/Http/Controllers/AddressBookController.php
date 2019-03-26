<?php

namespace Diary\Http\Controllers;

use Illuminate\Http\Request;

use Diary\AddressBook;
use DB;
use Auth;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addressBookEntries = DB::table('address_book')->orderBy('first_name', 'DESC')->where('user_id', '=', Auth::id())->get();
        
        return view('addressbook.index', ['addressBookEntries' => $addressBookEntries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addressbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favourite = $request->input('favourite');
        $tags = $favourite.'';

        $addressBookEntry = new AddressBook;
        $addressBookEntry->user_id = auth()->user()->id;
        $addressBookEntry->first_name = $request->input('firstName').'';
        $addressBookEntry->last_name = $request->input('lastName').'';
        $addressBookEntry->tags = $tags;
        $addressBookEntry->image = $request->input('image').'';
        $addressBookEntry->number = $request->input('number').'';
        $addressBookEntry->email = $request->input('email').'';
        $addressBookEntry->occupation = $request->input('occupation').'';
        $addressBookEntry->birthday = $request->input('birthday').'';
        $addressBookEntry->facebook = $request->input('facebook').'';
        $addressBookEntry->instagram = $request->input('instagram').'';
        $addressBookEntry->twitter = $request->input('twitter').'';
        $addressBookEntry->linkedin = $request->input('linkedin').'';
        $addressBookEntry->address1 = $request->input('address1').'';
        $addressBookEntry->address2 = $request->input('address2').'';
        $addressBookEntry->city = $request->input('city').'';
        $addressBookEntry->postcode = $request->input('postcode').'';

        $birthdayUnix = strtotime(str_replace("/", "-", $request->input('birthday')));
        $addressBookEntry->birthday_unix = $birthdayUnix;

        $addressBookEntry->save();

        return redirect('/addressbook');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $addressBookEntry = DB::table('address_book')->where('id', '=', $id)->first();

        if ($addressBookEntry->user_id == Auth::id()) {
            return view('addressbook.show', ['addressBookEntry' => $addressBookEntry]);
        }
        else {
            return redirect('/addressbook');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $addressBookEntry = DB::table('address_book')->where('id', '=', $id)->first();

        if ($addressBookEntry->user_id == Auth::id()) {
            return view('addressbook.edit', ['addressBookEntry' => $addressBookEntry]);
        }
        else {
            return redirect('/addressbook');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $addressBookEntry = AddressBook::find($id);

        if ($addressBookEntry->user_id == Auth::id() ) {

            $favourite = $request->input('favourite');
            $tags = $favourite.'';

            $addressBookEntry->user_id = auth()->user()->id;
            $addressBookEntry->first_name = $request->input('firstName').'';
            $addressBookEntry->last_name = $request->input('lastName').'';
            $addressBookEntry->tags = $tags;
            $addressBookEntry->image = $request->input('image').'';
            $addressBookEntry->number = $request->input('number').'';
            $addressBookEntry->email = $request->input('email').'';
            $addressBookEntry->occupation = $request->input('occupation').'';
            $addressBookEntry->birthday = $request->input('birthday').'';
            $addressBookEntry->facebook = $request->input('facebook').'';
            $addressBookEntry->instagram = $request->input('instagram').'';
            $addressBookEntry->twitter = $request->input('twitter').'';
            $addressBookEntry->linkedin = $request->input('linkedin').'';
            $addressBookEntry->address1 = $request->input('address1').'';
            $addressBookEntry->address2 = $request->input('address2').'';
            $addressBookEntry->city = $request->input('city').'';
            $addressBookEntry->postcode = $request->input('postcode').'';

            $birthdayUnix = strtotime(str_replace("/", "-", $request->input('birthday')));
            $addressBookEntry->birthday_unix = $birthdayUnix;

            $addressBookEntry->save();

            return redirect('/addressbook');

        }
        else {
            return redirect('/addressbook');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addressBookEntry = DB::table('address_book')->where('id', '=', $id)->first();

        if ($addressBookEntry->user_id == Auth::id()) {
            $addressBookEntryDelete = DB::table('address_book')->where('id', $id)->delete();
            return redirect('/addressbook');
        }
        else {
            return redirect('/addressbook');
        }
    }
}
