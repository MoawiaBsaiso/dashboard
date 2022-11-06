<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $countries = Country::orderBy('id', 'desc')->get();



        return response()->view('cms.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'country_name' => 'required|string|min:3|max:20',
            'code' => 'required|min:3|max:20',
        ], [
            'country_name.required' => 'name is required',
            'country_name.min' => 'no less than 3 characters',
            'code.required' => 'code is required',
            'code.min' => 'no less than 3 characters'
        ]);
        // dd($request->all());
        $countries = new Country();
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');
        $isSaved = $countries->save();
        session()->flash('message', $isSaved ? 'success' : 'error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.show', compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit', compact('countries'));
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
        $request->validate([
            'country_name' => 'required|string|min:3|max:20',
            'code' => 'required|min:3|max:20',
        ], [
            'country_name.required' => 'name is required',
            'country_name.min' => 'no less than 3 characters',
            'code.required' => 'code is required',
            'code.min' => 'no less than 3 characters'
        ]);
        // dd($request->all());
        $countries = Country::findOrFail($id);
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');
        $isSaved = $countries->save();
        session()->flash('message', $isSaved ? 'success' : 'error');
        return redirect()->route('countries.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $countries = Country::findOrFail($id);
        // $isDelete = $countries->delete();


        $countries = Country::destroy($id);

        return redirect()->route('countries.index');
    }
}
