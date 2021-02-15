<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs =  Job::all();
        return view('home',compact('jobs'));
    }

    public function job_edit($id)
    {
     $job = Job::where('id', $id)->first(); 
     return view('job_edit',compact('job'));
     }
     
     public function job_update(Request $request, $id)
     {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required|numeric',
            'address'=>'required',
            'gender'=>'required',
            'ssc_board'=>'required',
            'ssc_year'=>'required',
            'sss_grade'=>'required',
            'location'=>'required',
            'ectc'=>'required',
            'cctc'=>'required',
            'notice_period'=>'required'
        ]);
       
        $input = $request->all();
        $experience = array();
        $languages = array();
        unset($input['_token']); 
        unset($input['_method']);
        $input['languages']  = json_encode($request->get('languages'));
        $input['technology'] = json_encode($request->get('technology'));

        $company_name = $request->get('experience')['company_name'];
        $designation = $request->get('experience')['designation'];
        $from = $request->get('experience')['from'];
        $to = $request->get('experience')['to'];

        foreach($company_name as $key=>$c_name){
            $experience[] = [
                'company_name'=>$c_name,
                'designation'=>$designation[$key],
                'from'=>$from[$key],
                'to'=>$to[$key]
            ];
        }

        $input['experience'] = json_encode($experience);
        $update =  Job::where('id',$id)->update( $input);

        if($update){          
            $request->session()->flash('success',  'Job Application updated');
        }else{
            $request->session()->flash('danger', 'Something went wrong while job update');
        } 
        return redirect()->route('home'); 
    }

    public function view($id)
    {
        $job = Job::where('id', $id)->first(); 
        return view('job_view',compact('job'));
    }

    public function delete($id)  
    { 
        $delete = Job::where('id', $id)->firstorfail()->delete(); 

        if($delete){          
            session()->flash('success',  'Job Record deleted successfully.');
        }else{
         session()->flash('danger', 'Something went wrong while job delete');
     } 
     return redirect()->back(); 
    } 

}
