<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Student;
use App\Person;
use DB;

class UserRegController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest() == true){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        if(auth()->user()->id !== 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $auth = User::orderBy('created_at','asc'/*asc*/)->paginate(10);
        return view('auth.index')->with('users',$auth);
    }
    public function show($id)
    {
        if(auth()->guest() == true){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        if(auth()->user()->id !== 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $auth = User::find($id);
        return view('auth.show')->with('user',$auth);
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        if(auth()->guest() == true){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        if(auth()->user()->id !== 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $auth = User::find($id);
        return view('auth.edit')->with('user',$auth);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->guest() == true){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        if(auth()->user()->id !== 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/users')->with('success', 'Хэрэглэгч шинэчлэгдлээ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->guest() == true){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        else if(auth()->user()->id !== 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $user = User::find($id);
        if (is_null(Person::find($user->id)) == false) {
            $person = Person::find($user->id);
            if(is_null(Student::find($person->user_id)) == false){
                $student = Student::find($person->user_id);
                $student->delete();
            }
            $person->delete();
        }
        $user->delete();
        return redirect('/users')->with('success', 'user Устгагдлаа');
    }
}
