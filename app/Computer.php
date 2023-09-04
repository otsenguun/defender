<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Company;

class Computer extends Model
{
    use HasFactory;

    public function GetCompanyName(){
        
        $computer = Company::where("id",$this->org_id)->get();

        $name = "No Company";
        if(count($computer) > 0){
            $name = $computer[0]->name;
        }
        return $name;
    }
}
