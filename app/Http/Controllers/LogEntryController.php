<?php

namespace App\Http\Controllers;

use App\Models\LogEntry;
use Illuminate\Http\Request;

class LogEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logEntries = LogEntry::all();
        return view('log-entries.index', ['logEntries' => $logEntries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('log-entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LogEntry::create([
            'text' => $request->get('text'),
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('log-entries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogEntry  $logEntry
     * @return \Illuminate\Http\Response
     */
    public function show(LogEntry $logEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogEntry  $logEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(LogEntry $logEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogEntry  $logEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogEntry $logEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogEntry  $logEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogEntry $logEntry)
    {
        //
    }
}
