<?php

namespace Diary\Http\Controllers;

use Illuminate\Http\Request;

use Diary\Diary;
use DB;
use Auth;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaryEntries = DB::table('diary')->orderBy('date_unix', 'DESC')->where('user_id', '=', Auth::id())->get();
        
        return view('diary.index', ['diaryEntries' => $diaryEntries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diary.create');
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
        $social = $request->input('social');
        $productive = $request->input('productive');
        $tags = $favourite . ' ' . $social . ' ' . $productive;

        $diaryEntry = new Diary;
        $diaryEntry->user_id = auth()->user()->id;
        $diaryEntry->title = $request->input('title').'';
        $diaryEntry->date = $request->input('date').'';
        $diaryEntry->tags = $tags;
        $diaryEntry->rating = $request->input('rating').'';
        $diaryEntry->people = $request->input('people').'';
        $diaryEntry->grateful = $request->input('grateful').'';
        $diaryEntry->improvements = $request->input('improvements').'';
        $diaryEntry->summary = $request->input('summary').'';
        $diaryEntry->entry = $request->input('entry').'';
        $diaryEntry->tomorrow = $request->input('tomorrow').'';

        // $dateUnix = DateTime::createFromFormat('d/m/Y', $request->input('date'));

        $dateUnix = strtotime(str_replace("/", "-", $request->input('date')));
        $diaryEntry->date_unix = $dateUnix;

        $diaryEntry->save();

        return redirect('/diary');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $diaryEntry = DB::table('diary')->where('id', '=', $id)->first();

        if ($diaryEntry->user_id == Auth::id()) {
            return view('diary.show', ['diaryEntry' => $diaryEntry]);
        }
        else {
            return redirect('/diary');
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
        $diaryEntry = DB::table('diary')->where('id', '=', $id)->first();

        if ($diaryEntry->user_id == Auth::id()) {
            return view('diary.edit', ['diaryEntry' => $diaryEntry]);
        }
        else {
            return redirect('/diary');
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

        // $diaryEntry = DB::table('diary')->where('id', '=', $id)->first();
        $diaryEntry = Diary::find($id);

        if ($diaryEntry->user_id == Auth::id()) {


            $favourite = $request->input('favourite');
            $social = $request->input('social');
            $productive = $request->input('productive');
            $tags = $favourite . ' ' . $social . ' ' . $productive;

            $diaryEntry->user_id = auth()->user()->id;
            $diaryEntry->title = $request->input('title').'';
            $diaryEntry->date = $request->input('date');
            $diaryEntry->tags = $tags;
            $diaryEntry->rating = $request->input('rating');
            $diaryEntry->people = $request->input('people').'';
            $diaryEntry->grateful = $request->input('grateful').'';
            $diaryEntry->improvements = $request->input('improvements').'';
            $diaryEntry->summary = $request->input('summary').'';
            $diaryEntry->entry = $request->input('entry').'';
            $diaryEntry->tomorrow = $request->input('tomorrow').'';

            // $dateUnix = DateTime::createFromFormat('d/m/Y', $request->input('date'));

            $dateUnix = strtotime(str_replace("/", "-", $request->input('date')));
            $diaryEntry->date_unix = $dateUnix;

            $diaryEntry->save();

            return redirect('/diary');
        }
        else {
            return redirect('/diary');
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

        $diaryEntry = DB::table('diary')->where('id', '=', $id)->first();

        if ($diaryEntry->user_id == Auth::id()) {
            $diaryEntryDelete = DB::table('diary')->where('id', $id)->delete();
            return redirect('/diary');
        }
        else {
            return redirect('/diary');
        }

    }


    public function search()
    {    
        return view('diary.search');
    }


    public function results(Request $request) {

            $title = $request->input('title');
            $date = $request->input('date');
            $favourite = $request->input('favourite');
            $social = $request->input('social');
            $rating = $request->input('rating');
            $productive = $request->input('productive');
            $people = $request->input('people');
            $people = explode(",",str_replace(' ', '', $people));
            if (empty($people[0])) { $people[0] = ''; }
            if (empty($people[1])) { $people[1] = ''; }
            if (empty($people[2])) { $people[2] = ''; }
            $entry = $request->input('entry');

        $diaryEntries = DB::table('diary')
                        ->orderBy('date_unix', 'DESC')
                        ->where('user_id', '=', Auth::id())
                        ->where('title', 'LIKE', '%'.$title.'%')
                        ->where('date', 'LIKE', '%'.$date.'%')
                        ->where('tags', 'LIKE', '%'.$favourite.'%')
                        ->where('tags', 'LIKE', '%'.$social.'%')
                        ->where('tags', 'LIKE', '%'.$productive.'%')
                        ->where('rating', 'LIKE', '%'.$rating.'%')
                        ->where('people', 'LIKE', '%'.$people[0].'%')
                        ->where('people', 'LIKE', '%'.$people[1].'%')
                        ->where('people', 'LIKE', '%'.$people[2].'%')
                        ->where('entry', 'LIKE', '%'.$entry.'%')
                        ->get();
        
        return view('diary.results', ['diaryEntries' => $diaryEntries]);
    }

}
