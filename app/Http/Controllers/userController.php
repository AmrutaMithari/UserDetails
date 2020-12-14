<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
	public function index()
	{
		$posts = DB::table('user_details')->get();
		//echo $posts->fname;
		return view('welcome')->with('posts', $posts);
	}
    public function save(Request $request)
	{
		$fname = $request->fname;
		$lname = $request->lname;
		$dob = $request->dob;
		$city = $request->city;
		$mobile = $request->mobile;
		
		$data = array(
					'fname' => $fname, 
					'lname' => $lname, 
					'dob' => $dob,
					'city' => $city,
					'mobileno' => $mobile
				);
		
        //echo $select;
		DB::table('user_details')->insert($data);
		$posts = DB::table('user_details')->get();
		return view('welcome',['posts' => $posts]);
	}
	
    public function update(Request $request)
	{
		$fname = $request->fname;
		$id = $request->id;
		$lname = $request->lname;
		$dob = $request->dob;
		$city = $request->city;
		$mobile = $request->mobile;
		
		DB::table('user_details')->where('id', $id)->update(array(
					'fname' => $fname, 
					'lname' => $lname, 
					'dob' => $dob,
					'city' => $city,
					'mobileno' => $mobile
				));
		$posts = DB::table('user_details')->get();
		return view('welcome',['posts' => $posts]);
	}
	
    public function deleteuser(Request $request)
	{
		$id = $request->id;
		DB::table('user_details')->where('id', $id)->delete();
		$posts = DB::table('user_details')->get();
		return view('welcome',['posts' => $posts]);
	}

}
