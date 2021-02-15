<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{

	public function register(Request $request){

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
		$save = Job::create($input);

		if($save){          
			$request->session()->flash('success',  'Job Application submitted');
		}else{
			$request->session()->flash('danger', 'Something went wrong while job submit');
		} 
		return redirect()->route('job'); 
	}

}
