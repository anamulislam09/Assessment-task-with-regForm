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
    public function index( )
    {  
        $data=registration::orderBy('id','desc')->get();
        // dd($data);
        return view('index', compact('data'));
    }

     //_get country data from country table
    public function getDivision(Request $request)
    {  
        $divisions=DB::table('divisions')->orderBy('division_name','ASC')->get();
        return view('index', compact('divisions'));
    }

    //_get division data from division table
     public function getDistrict(Request $request)
    {        
        $did = $request->post('did');
        $districts = DB::table('districts')->where('division_id', $did)->orderBy('district_name','ASC')->get();
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
        $request->validate([
            'name' => 'required ',
            'email' => 'required',
            // 'division_id' => 'required',
            // 'district_id' => 'required ',
            // 'upozilla_id' => 'required',
            'address_details' => 'required',
            'image' => 'required | image| mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'required | file| mimes:pdf',
            'skills'=>'required',
            

        ]);

        // dd($request->all());
        // checkbox upload
        // $input = $request->all();
        // $input['skills'] = $request->input('skills');

        // Image upload start here
        $image = $request->file('image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        // CV upload start here
        $cv = $request->file('cv');
        $cv_name = hexdec(uniqid()) . '.' . $cv->getClientOriginalExtension();
        $request->cv->move(public_path('upload'), $cv_name);
        $cv_url = 'upload/' . $cv_name;


        registration::insert([
            'name' => $request->name,
            'email' => $request->email,
            // 'division_id' => $request->id,
            // 'district_id' => $request->did,
            // 'upozilla_id' => $request->uid,
            'address_details' => $request->address_details,
            'image' => $img_url,
            'cv' => $cv_url,
            'langague'=>json_encode($request->skills),
        ]);
        return redirect()->route('/')->with('msg', 'Product Added successfully');
        echo "hello";
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
        return view('pages.edit');
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
    public function destroy($id)
    {
        // dd($id);
        $register = registration::findOrFail($id);
        $register->delete();

        return redirect('/');
        
    }
}
