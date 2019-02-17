<?php

namespace App\Http\Controllers;

use app\Habit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HabitsController extends Controller
{
    public function postNewHabit(Request $request)
    {
        $this->validate($request, [
        'newhabit' => 'required|max:140'
            
        ]);
        $habit = new Habit();
        $habit-> habit = $request['newhabit'];
        $message = 'Somethings aint correct';
        if ($request->user()->habits()->save($habit)) {
            $message = 'Post created!';
        }
        return redirect()->route('habits')->with(['message' => $message]);
    }
}