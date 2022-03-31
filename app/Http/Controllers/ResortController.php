<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Redirector;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resorts = Resort::latest()->paginate(10);
        return view('resort.index', compact('resorts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resort = Resort::find($id);
        return view('resort.show', compact('resort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('login');
       
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
        return redirect()->route('login');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $resort = Resort::find($id);
        // $resort->delete();
        // return redirect()->route('admin.index')->with('message', 'Deleted Successfully');

    }

    public function listProperty()
    {
        // $resorts = Resort::with('resort')->get();
        // $resorts = Resort::latest()->paginate(6);
        $resorts = Resort::all()->take(6);
        return view('resort.list', compact('resorts'));
    }

    public function dashboard()
    {
        // $resorts = Resort::with('resort')->get();
        // $resorts = Resort::latest()->paginate(6);
        $resorts = Resort::all()->take(6);
        return view('home', compact('resorts'));
    }

    public function about()
    {
        
        return view('resort.about');
    }

    public function offers()
    {
        $resorts = Resort::latest()->paginate(9);
        return view('resort.offers', compact('resorts'));
    }


}
