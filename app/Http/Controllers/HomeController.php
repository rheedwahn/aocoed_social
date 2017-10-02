<?php

namespace Mysocial\Http\Controllers;

use Auth;
use Mysocial\Models\Status;
use Mysocial\Models\Image;

class HomeController extends Controller
{
	public function index()
	{
		
		if(Auth::check()){
			$statuses = Status::notReply()->where(function($query) {
				return $query->where('user_id', Auth::user()->id)->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
			})->orderBy('created_at', 'desc')->paginate(10);

			return view('timeline.index', compact('statuses')); 
		}

		return view('home'); 
	}
}