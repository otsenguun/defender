<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dinfo;
use App\fwinfo;
use App\Sysinfo;
use App\Rawdata;
use App\treport;
use App\Company;
use App\SysinfoLast;
use App\dinfoLast;
use App\fwinfoLast;
use App\Computer;   
use DB;
use Auth;

class MainController extends Controller
{

    public function updatedata($start,$end,$type){


                $start_i = strtotime($start);
                $end_i = strtotime($end);
                $s_dates = [];
                
                if($type == "day"){
                    $sek = 86400;
                }elseif($type == "week"){
                    $sek = 86400*7;
                }elseif($type == "month"){
                    $sek = 86400*30;
                }

                for ($i = $start_i; $i <= $end_i; $i += $sek) {
                    $s_dates[] = date("Y-m-d",$i);
                }
                
                // dd($s_dates);
                $chart_datas = [];

                $chart_datas["chart"]["low"][] = "low";
                $chart_datas["chart"]["medium"][] ="medium";
                $chart_datas["chart"]["high"][] = "high";
                $chart_datas["chart"]["total"][] = "total";
                
                foreach($s_dates as $s_date){
                 
                    if(Auth::user()->type == 1 && Auth::user()->org_id > 0){
                        $org_id = Auth::user()->org_id;
                        $low_th =  DB::table('treports')
                        ->select(DB::raw('count(id) as count'))
                        ->where('SeverityID',">=",7)
                        ->where('org_id',$org_id)
                        ->whereDate("created_at",$s_date)
                        ->orderBy('count',"desc")
                        ->get();

                        $medium_th =  DB::table('treports')
                        ->select(DB::raw('count(id) as count'))
                        ->where('SeverityID',">=",5)
                        ->where('SeverityID',"<=",6)
                        ->where('org_id',$org_id)
                        ->whereDate("created_at",$s_date)
                        ->orderBy('count',"desc")
                        ->get();

                        $high_th =  DB::table('treports')
                        ->select(DB::raw('count(id) as count'))
                        ->where('org_id',$org_id)
                        ->where('SeverityID',">=",1)
                        ->where('SeverityID',"<=",4)
                        ->whereDate("created_at",$s_date)
                        ->orderBy('count',"desc")
                        ->get();
                    }else{
                        $low_th =  DB::table('treports')
                        ->select(DB::raw('count(id) as count'))
                        ->where('SeverityID',">=",7)
                        ->whereDate("created_at",$s_date)
                        ->orderBy('count',"desc")
                        ->get();
            
                        $medium_th =  DB::table('treports')
                        ->select(DB::raw('count(id) as count'))
                        ->where('SeverityID',">=",5)
                        ->where('SeverityID',"<=",6)
                        ->whereDate("created_at",$s_date)
                        ->orderBy('count',"desc")
                        ->get();
            
                        $high_th =  DB::table('treports')
                        ->select(DB::raw('count(id) as count'))
                        ->where('SeverityID',">=",1)
                        ->where('SeverityID',"<=",4)
                        ->whereDate("created_at",$s_date)
                        ->orderBy('count',"desc")
                        ->get();
                    }
                    
                    
                    $obj = new \stdclass();
                    $obj->date = $s_date;
                    $obj->high = $high_th[0]->count;
                    $obj->medium = $medium_th[0]->count;
                    $obj->low = $low_th[0]->count;
                    $obj->total = $low_th[0]->count + $medium_th[0]->count + $high_th[0]->count;

                    $chart_datas["chart"]["high"][] = $high_th[0]->count;
                    $chart_datas["chart"]["medium"][] = $medium_th[0]->count;
                    $chart_datas["chart"]["low"][] = $low_th[0]->count;
                    $chart_datas["chart"]["total"][] = $obj->total;
                }

                // 'data1': '#b8428c',
                // 'data2': '#f19b9c',
                // 'data3': '#f9cdac',
                // $chart_datas["names"] = [
                //     "low","medium","high","total"
                // ];
                $chart_datas["dates"] = $s_dates;
                // dd($chart_datas);


                return json_encode($chart_datas);



    }
    public function Clients(Request $request){


        $s = $request->s;
		// $ankets = Anket::search($s)->paginate(30);
        $sys_infos = SysinfoLast::search($s)->orderBy("created_at","desc")->paginate(100);

        $all_clients = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->get();

        $not_registered_clients = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("org_id",0)
        ->get();

        $registered_clients = DB::table('sysinfo_lasts')
        ->select(DB::raw('count(id) as count'))
        ->where("org_id","!=",0)
        ->orderBy('count',"desc")
        ->get();

        $totals = [
            "all_clients" => $all_clients[0]->count,
            "not_registered_clients" => $not_registered_clients[0]->count,
            "registered_clients" => $registered_clients[0]->count
        ];

        // dd($totals);

        return view("log.clients",["sys_infos"=>$sys_infos,"totals"=>$totals,"s"=>$s]);

    }

    public function Client($uuid){

        
        $computer = Computer::where("uuid",$uuid)->get();
        if(count($computer) > 0){
            // return redirect("computer.show",$computer[0]->id);
            return redirect()->route('computer.show',$computer[0]->id);
        }
        $other_info = [];
        $sysinfo = SysinfoLast::where("uuid",$uuid)->get();
        if(count($sysinfo) > 0){
            $other_info["sysinfo"] = $sysinfo[0];
        }
        $dinfo = dinfoLast::where("uuid",$uuid)->get();
        if(count($dinfo) > 0){
            $other_info["dinfo"] = $dinfo[0];
        }
        $fwinfo = fwinfoLast::where("uuid",$uuid)->get();
        if(count($fwinfo) > 0){
            $other_info["fwinfo"] = $fwinfo[0];
        }
        $treport = treport::where("uuid",$uuid)->paginate(20);

        $other_info["treport"] = $treport;
        $button_info = [
            1 => '<span class="badge badge-success">True</span>',
            0 => '<span class="badge badge-warning">False</span>',
            "Enabled" => '<span class="badge badge-success">Enabled</span>',
            "Disabled" => '<span class="badge badge-warning">Disabled</span>'
        ];
        // dump($other_info["dinfo"]);
        return view("mainpages.not_registered",[
            "info" =>$other_info,
            "button_info" =>$button_info
        ]);

    }

    public function Threats(Request $request){

        $s = $request->s;
		// $ankets = Anket::search($s)->paginate(30);

        
        if(Auth::user()->type == 1 && Auth::user()->org_id > 0){
            $org_id = Auth::user()->org_id;
            $threats = treport::search($s)
            ->where("org_id",$org_id)
            ->orderBy("created_at","desc")
            ->paginate(100);

            $all_threats = DB::table('treports')
            ->select(DB::raw('count(id) as count'))
            ->where("org_id",$org_id)
            ->get();

            $failed_threats = DB::table('treports')
            ->select(DB::raw('count(id) as count'))
            ->where("org_id",$org_id)
            ->where("ActionSuccess",0)
            ->get();

            $success_threats = DB::table('treports')
            ->select(DB::raw('count(id) as count'))
            ->where("org_id",$org_id)
            ->where("ActionSuccess",1)
            ->get();
        }else{
           

            $threats = treport::search($s)->orderBy("created_at","desc")->paginate(100);

            $all_threats = DB::table('treports')
            ->select(DB::raw('count(id) as count'))
            ->get();

            $failed_threats = DB::table('treports')
            ->select(DB::raw('count(id) as count'))
            ->where("ActionSuccess",0)
            ->get();

            $success_threats = DB::table('treports')
            ->select(DB::raw('count(id) as count'))
            ->where("ActionSuccess",1)
            ->get();
        }
        $totals = [
            "all_threats" => $all_threats[0]->count,
            "failed_threats" => $failed_threats[0]->count,
            "success_threats" => $success_threats[0]->count
        ];
        return view("log.threats",["threats"=>$threats,"totals"=>$totals,"s"=>$s]);

    }
}
