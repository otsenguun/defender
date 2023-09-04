<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Computer;

class treport extends Model
{
    use HasFactory;


    public function scopeSearch($query, $s){
        return $query->where('uuid','like','%'.$s.'%')
        ->orWhere('ThreatName','like','%'.$s.'%');
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
