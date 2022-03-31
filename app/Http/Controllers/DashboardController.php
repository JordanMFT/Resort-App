<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resort;
use App\Models\Role;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $resorts = Resort::all()->take(20); //view only 10 from the database
        // return view('welcome', compact('resorts'));

        // $resorts = Resort::latest()->get();
        $resorts = Resort::latest()->paginate(10);
        return view('admin.index', compact('resorts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'city' => 'required',
            'price' => 'required|integer',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        Resort::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'city' => $request->get('city'),
            'price' => $request->get('price'),
            'image' => $name,
        ]);

        return redirect()->back()->with('message', 'Created Successfully');
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
        return view('admin.show', compact('resort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resort = Resort::find($id);
        return view('admin.edit', compact('resort'));
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
        $this->validate($request, [
            'name' => 'required_if:type,individual',
            'description' => 'required_if:type,individual,nullable',
            'city' => 'required_if:type,individual',
            'price' => 'required|integer',
            'image' => 'mimes:png,jpeg,jpg'
        ]);
        $resort = Resort::find($id);
        $name = $resort->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        $resort->name = $request->get('name');
        $resort->description = $request->get('description');
        $resort->city = $request->get('city');
        $resort->price = $request->get('price');
        $resort->image = $name;
        $resort->save();
        return redirect()->route('admin.index')->with('message', 'Property Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resort = Resort::find($id);
        $resort->delete();
        return redirect()->route('admin.index')->with('message', 'Deleted Successfully');
    }

    // public function listProperty()
    // {
    //     // $resorts = Resort::with('resort')->get();
    //     // $resorts = Resort::latest()->paginate(6);
    //     $resorts = Resort::latest()->paginate(10);
    //     return view('admin.list', compact('resorts'));
    // }

    // public function dashboard()
    // {
    //     // $resorts = Resort::with('resort')->get();
    //     // $resorts = Resort::latest()->paginate(6);
    //     $resorts = Resort::all()->take(6);
    //     return view('home', compact('resorts'));
    // }
}
