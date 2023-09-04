<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alert = new \stdclass();
        $check_dup = User::where("email",$request->email)->get();

        if(count($check_dup)  ==  0){

            $new_user = new User;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->password =  Hash::make($request->password);
            $new_user->org_id = $request->org_id;
            $new_user->type = 1;
            $new_user->save();

            $alert->status = 1;
            $alert->msj = "User Created ! ( ".$new_user->name." )";

            return back()->with('success',"User Created ! ( ".$new_user->name." )");

        }else{
            $alert->status = 0;
            $alert->msj = "User Create Failed ( ".$request->email." is already registered !)";
            return back()->with('failed',"User Create Failed ( ".$request->email." is already registered !)");
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != ""){
            $user->password = $request->password;
        }
       
        $user->save();

        return redirect()->back()->with('success',"User Updated!)");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success',"User Deleted!");
    }
}
