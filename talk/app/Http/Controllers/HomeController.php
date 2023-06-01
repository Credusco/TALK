<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
		
		$messages = DB::table('messages')
            ->join('users','users.id','=','messages.users')
            ->select('messages.*', 'users.name','users.email')->orderby('messages.date','DESC')
            ->get();
		
        return view('home',compact('messages'));
    }
	
	public function messages(Request $request)
    {
        $data = request()->validate([
            'messages' => ['required']
        ]);

        $add = DB::table('messages')->insert([
            'contenu' => $data['messages'],
            'users' => auth()->id(),
            'date' => NOW()
        ]);
		
		return redirect('/home');
    }
	
}
