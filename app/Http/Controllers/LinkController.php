<?php

namespace App\Http\Controllers;

use App\Models\link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;




class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'URL cannot be empty',
            ];
        $this->validate($request, [
            'source' => ['required', 'active_url'],
        ],$messages);

        $alias = Str::random(6);
        $source = $request->input('source');
        $destination = url($alias);
        $link = Link::create([
                'source' => $source,
                'destination' => $destination,
                'alias' => $alias,
            ]);
        return to_route('index')->with('result' , $destination)->with('request',$source)->with(['success' => 'Shortlink created successfully']);
    }

    public function redirect(string $alias)
    {
        $link = Link::where('alias', $alias)->first();
        if(!$link) abort(404);
        return Redirect::away($link->source);
        // return redirect()->away($link->destination);
    }

    /**
     * Display the specified resource.
     */
    public function show(link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(link $link)
    {
        //
    }
}
