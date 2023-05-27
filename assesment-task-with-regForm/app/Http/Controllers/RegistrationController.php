<?php

namespace App\Http\Controllers;

use App\Models\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //_get country data from country table
    public function index(Request $request)
    {  
        $divisions=DB::table('divisions')->orderBy('division_name','ASC')->get();
        return view('index', compact('divisions'));
    }

    //_get division data from division table
     public function getDistrict(Request $request)
    {        
        $did = $request->post('did');
        $districts = DB::table('districts')->where('division_id', $did)->orderBy('district_name','ASC')->get();
        // print_r($division);
        $html = '<option value="" selected disabled>Select One</option>';
        foreach($districts as $list){
            $html .= '<option value="'.$list->id.'">'.$list->district_name.'</option>';
        }
        echo $html;
    }

            //_get cities data from city table
       public function getUpozilla(Request $request)
    {
        $uid = $request->post('uid');
        $upozillas = DB::table('upozillas')->where('district_id', $uid)->orderBy('upozilla_name','ASC')->get();
        // print_r($division);
        $rs = '<option value="" selected disabled>Select One</option>';
        foreach($upozillas as $upozilla){
            $rs .= '<option value="'.$upozilla->id.'">'.$upozilla->upozilla_name.'</option>';
        }
        echo $rs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "Hello";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(registration $registration)
    {
        //
    }
}
