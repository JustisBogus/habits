<?php

namespace App\Http\Controllers;

use App\Post;
use App\Complete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function getHabits( Request $request)
    {
       
        $uid = Auth::id();
        $habits = Post::whereIn('user_id', function($query) use($uid) {
            $query->select('user_id')->from('posts')->where('user_id', $uid);
            })->orderBy('created_at', 'desc')->get();
            return view('habits', ['habits' => $habits]);

         
        /*
        $habits = Post::orderBy('created_at', 'desc')->get();
        
       */
    }

    public function getCalendar()
    {
        $uid = Auth::id();
        $completes = Complete::whereIn('user_id', function($query) use($uid) {
            $query->select('user_id')->from('completes')->where('user_id', $uid);
            })->orderBy('created_at', 'desc')->get();
            return view('calendar', ['completes' => $completes]);

    }


    public function postNewHabit(Request $request)
    {
        
        $this->validate($request, [
        'newhabit' => 'required|max:140'
            
        ]);
        
        $habit = new Post();
        $habit-> habit = $request['newhabit'];
        $habit-> updated_at = null;
        $message = 'Somethings aint correct';
        if ($request->user()->post()->save($habit)) {
            $message = 'Post created!';
        }
        return redirect()->route('habits')->with(['message' => $message]);
    }

    public function getDeletePost($habit_id)
    {
        $habit = Post::where('id', $habit_id)->first();
        if (Auth::user() != $habit->user) {
            return redirect()->back();
        }
        $habit->delete();
        return redirect()->route('habits');
    }

    


    public function getCompleteHabit($habit_id, Request $request)
    {
        $habit = Post::where(['id' => $habit_id])->first();
        $habit ->touch();
        $habit -> update();
        $complete = new Complete();
        $complete-> complete_habit = $habit['habit'];
        
        $request->user()->complete()->save($complete);
        return redirect()->route('habits');
    

    }

}


