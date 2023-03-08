<?php

namespace App\Http\Controllers;

use App\Booked;
use App\Seats;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $seats=Seats::get();
        $data=compact('seats');
        $html= view('home')->with($data);
        return $html;
    }
    public function selected(Request $request){
      
        $userid=$request->userid;
        if($request->selectedseats ==null){
            return redirect()->back()->with('success', 'Please select seats !!!');   
        }
        $string =$request->selectedseats;
        $arr = explode(",",$string);
        foreach ($arr as $a) {
            $book=new Booked;
            $book->userid=$userid;
            $book->seatno=$a;
            $book->save();

        } 
        foreach ($arr as $a) {
            $seat=Seats::find($a);
            $seat->status=1;
            $seat->save();

        } 
            
        return view('conform'); 

    }

 
}
