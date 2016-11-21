<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use App\College;
use App\Branch;
use App\Degree;
use App\Skills;
use App\Student_Skill;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user_controller extends Controller{
	public $restful = true;

	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show_user_info($username)
	{
		if(Auth::user()->username == $username)
		{
			$user = User::where('username',$username)->get();
			if($user[0]->type != '')
			{
				$student = Student::where('username',$username)->get();
				$college = College::select('name','location')->get();
				$branch = Branch::select('name')->get();
				$degree = Degree::select('name')->get();
				return View('user.user_page')->with('student',$student)
											->with('user',$user)
											->with('branch',$branch)
											->with('degree',$degree)
											->with('college',$college);
			}
			else{
				return view('user.user_page')->with('user',$user);
			}
		}
		else{

			return redirect()->route('home');
		}
	}

	public function student_entry(Request $request)
	{
		$username = $request['username'];
		$type = $request['type_select'];
		User::where('username', $username)->update(['type' => $type]);
		Student::insert(['username' => $username ]);
		//return View('user.user_page')->with('user',$user)->with('student',$student);
		return redirect(url('/user/'.$username));
	}

	public function student_details_entry(Request $request)
	{
		$college = $request['college_select'];
		$degree = $request['degree_select'];
		$branch = $request['branch_select'];
		$username = $request['username'];
		
		Student::where('username',$username)->update(['college' => $college ,
													 	'degree' => $degree, 
													 	'branch' => $branch]);

		$student = Student::where('username',$username)->get();
		$user = User::where('username',$username)->get();
		return redirect(url('/user/'.$username));
	}

	public function show_user_profile($username)
	{
		$user = User::where('username',$username)->get();
		$college = College::all();
		$branch = Branch::all();
		$degree = Degree::all();
		$skills = Skills::all();
		if($user[0]->type=='student')
		{
			$student = Student::where('username',$username)->get();
			return view('user.user_profile')->with('user',$user)
											->with('skills',$skills)
											->with('branch',$branch)
											->with('degree',$degree)
											->with('college',$college)
											->with('student',$student);
		}
	}

	public function show_user_profile_edit($username)
	{
		$user = User::where('username',$username)->get();
		$college = College::all();
		$branch = Branch::all();
		$degree = Degree::all();
		$skills = Skills::all();
		if($user[0]->type=='student')
		{
			$student = Student::where('username',$username)->get();
			
			$student_skills_major = Student_Skill::where('student_id',$student[0]->username)->get();
			
			$student_skills = array();
			foreach ($student_skills_major as $skill)
			{
				array_push($student_skills,Skills::where('id',$skill->skill_id)->get()[0]->name);
			} 
			return view('user.user_profile_edit')->with('user',$user)
											->with('skills',$skills)
											->with('branch',$branch)
											->with('degree',$degree)
											->with('college',$college)
											->with('student',$student)
											->with('student_skills',$student_skills);
		}
	}
}