<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;
use App\Company;
use App\User;

use App\SysinfoLast;
use App\dinfoLast;
use App\fwinfoLast;
use App\treport;

class ComputerController extends Controller
{


    public function updatedata($id,$table){

        if($table == "computer"){

            $computer = Computer::find($id);
     
            return view("company.edit_computer",["computer"=>$computer])->render();

        }elseif($table == "user"){
            $user = User::find($id);

            return view("company.edit_user",["user"=>$user])->render();
        }

    }
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
        $check_dup = Computer::where("uuid",$request->uuid)->get();


        // dd($request);

        if(count($check_dup)  ==  0){

            $new_computer = new Computer;
            $new_computer->name = $request->name;
            $new_computer->uuid = $request->uuid;
            $new_computer->token =  $request->token;
            $new_computer->org_id = $request->org_id;
            $new_computer->save();

            $SysinfoLast = SysinfoLast::where("uuid",$new_computer->uuid)->get();
            if(count($SysinfoLast) > 0){
                $SysinfoLast[0]->org_id = $new_computer->org_id;
                $SysinfoLast[0]->save();
            }
            $dinfoLast = dinfoLast::where("uuid",$new_computer->uuid)->get();
            if(count($dinfoLast) > 0){
                $dinfoLast[0]->org_id = $new_computer->org_id;
                $dinfoLast[0]->save();
            }
            $fwinfoLast = fwinfoLast::where("uuid",$new_computer->uuid)->get();
            if(count($fwinfoLast) > 0){
                $fwinfoLast[0]->org_id = $new_computer->org_id;
                $fwinfoLast[0]->save();
            }
            $alert->status = 1;
            $alert->msj = "Computer Created ! ( ".$new_computer->name." )";
            return back()->with('success',"Computer Created ! ( ".$new_computer->name." )");
        }else{
            $alert->status = 0;
            $alert->msj = "Computer Create Failed ( ".$request->uuid." is already registered !)";
            return back()->with('failed',"Computer Create Failed ( ".$request->uuid." is already registered !)");
     
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
        $computer = Computer::find($id);
        $other_info = [];
        $sysinfo = SysinfoLast::where("uuid",$computer->uuid)->get();
        if(count($sysinfo) > 0){
            $other_info["sysinfo"] = $sysinfo[0];
        }
        $dinfo = dinfoLast::where("uuid",$computer->uuid)->get();
        if(count($dinfo) > 0){
            $other_info["dinfo"] = $dinfo[0];
        }
        $fwinfo = fwinfoLast::where("uuid",$computer->uuid)->get();
        if(count($fwinfo) > 0){
            $other_info["fwinfo"] = $fwinfo[0];
        }
        $treport = treport::where("uuid",$computer->uuid)->paginate(20);

  
        $other_info["treport"] = $treport;
     
        // dump($other_info["treport"]);

        $button_info = [
            1 => '<span class="badge badge-success">True</span>',
            0 => '<span class="badge badge-warning">False</span>',
            "Enabled" => '<span class="badge badge-success">Enabled</span>',
            "Disabled" => '<span class="badge badge-warning">Disabled</span>'
        ];
        // dump($other_info["dinfo"]);
        return view("mainpages.registered",[
            "computer" => $computer,
            "info" =>$other_info,
            "button_info" =>$button_info
        ]);
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
        $comp = Computer::find($id);
        $comp->name = $request->name;
        $comp->uuid = $request->uuid;
        $comp->token = $request->token;
        $comp->save();

        $SysinfoLast = SysinfoLast::where("uuid",$comp->uuid)->get();
        if(count($SysinfoLast) > 0){
            $SysinfoLast[0]->org_id = $comp->org_id;
            // dd($SysinfoLast);
            $SysinfoLast[0]->save();
        }
        $dinfoLast = dinfoLast::where("uuid",$comp->uuid)->get();
        if(count($dinfoLast) > 0){
            $dinfoLast[0]->org_id = $comp->org_id;
            $dinfoLast[0]->save();
        }
        $fwinfoLast = fwinfoLast::where("uuid",$comp->uuid)->get();
        if(count($fwinfoLast) > 0){
            $fwinfoLast[0]->org_id = $comp->org_id;
            $fwinfoLast[0]->save();
        }

        return redirect()->back()->with('success',"Computer Updated !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comp = Computer::find($id);
        $comp->delete();
        return redirect()->back()->with('success',"Computer Deleted !");
    }
}
