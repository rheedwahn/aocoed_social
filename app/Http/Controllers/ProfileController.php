<?php

namespace Mysocial\Http\Controllers;

use Auth;
use Mysocial\Models\User;
use Mysocial\Models\Profile; 
use Illuminate\Http\Request;
use Storage;
use Cloudder;

class ProfileController extends Controller
{
	public function getProfile($username)
	{
		$user = User::where('username', $username)->first();

		if(!$user){
			abort(404);
		}

		$statuses = $user->statuses()->notReply()->get();

		return view('profile.index')
		->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::user()->isFriendWith($user));
	}

	public function getEdit()
	{
		return view('profile.edit');
	}

	public function postEdit(Request $request)
	{
		$profile = Profile::where('user_id', Auth::user()->id)->first();

		$this->validate($request, [
			'first_name'=>'alpha|max:50',
			'last_name'=>'alpha|max:50',
			'location'=>'max:20',
			'profile_image' => 'image',
			'department' => 'max:50',
			'phone_number' => 'numeric|phone',
			]);

		Auth::user()->update([
			'first_name'=>$request->input('first_name'),
			'last_name'=>$request->input('last_name'),
			'location'=>$request->input('location'),
			]);

		if($request->hasFile('profile_picture'))
		{ 
			//$destinationPath = realpath(base_path()."/../images/pictures/");
// 			dd($destinationPath);

			$profile_image = $request->profile_picture;
			
// 			dd($profile_image);
			Cloudder::upload($profile_image, null);
			list($width, $height) = getimagesize($profile_image);
			$file_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

			// $profile_new_name = time().$profile_image->getClientOriginalName();

			// $profile_image->move($destinationPath, $profile_new_name);

			//Storage::disk('uploads')->put('profile_image', $profile_new_name);

			$profile->profile_image = $file_url;

			$profile->save();
		}

			$profile->department = $request->department;
			$profile->phone_number = $request->phone_number;
			$profile->level = $request->level;
			$profile->address = $request->address;

			$profile->save();


		return redirect()->route('profile.edit')->with('info', 'Your profile has been updated successfully');
	}
}