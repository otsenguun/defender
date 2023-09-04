<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Computer;
class SysinfoLast extends Model
{
    use HasFactory;

    public function scopeSearch($query, $s){
        return $query->where('uuid','like','%'.$s.'%')
        ->orWhere('os_name','like','%'.$s.'%')
        ->orWhere('os_version','like','%'.$s.'%')
        ->orWhere('system_model','like','%'.$s.'%')
        ->orWhere('host_name','like','%'.$s.'%')
        ->orWhere('system_manufacturer','like','%'.$s.'%');
    }

    public function getComp(){
        $name = "Not Registered";
        $company = Computer::where("uuid", $this->uuid)->get();
       
        if(count($company) > 0){
            $name = $company[0]->name;
        }
        return $name;
    }
    public function getCompId(){
        $id = 0;
        $company = Computer::where("uuid", $this->uuid)->get();
       
        if(count($company) > 0){
            $id = $company[0]->id;
        }
        return $id;
    }
}
