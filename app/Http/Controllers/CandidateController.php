<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::paginate(1);
        return view('candidate/index',compact('candidates')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('candidate/add');

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
          'name' => 'required',
          'email' => 'required|email|unique:candidates',
          'address' => 'required',
          'dob' => 'required',
          'phone' => 'required',
          'file' => 'required',
        ]);
        $data=$request->all();
        if($request->file()) {
          $fileName = time().'_'.$request->file->getClientOriginalName();
          $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
          $data['file'] = $fileName;
          // dd($fileName);
        
        }
        Candidate::create($data);
     
        return redirect()->route('candidate.index') ->with('success','Candidate add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
       
      $data = Candidate::find($id);
        return view('candidate.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:candidates,email,'.$id,
          'address' => 'required',
          'dob' => 'required',
          'phone' => 'required'
        ]);
        $data = Candidate::find($id);
        if($request->file()) {
          $fileName = time().'_'.$request->file->getClientOriginalName();
          $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
          unlink(public_path('storage/uploads/'.$data->file));
          $data->file = $fileName;
        }
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->dob=$request->dob;
        $data->address=$request->address;
        $data->save();
        return redirect('candidate')->with('success','Record Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data= Candidate::find($id);
        $data->delete();
        return redirect('candidate')->with('success','Record Deleted');
    }
}
