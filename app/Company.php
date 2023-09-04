<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Computer;
class Company extends Model
{
    use HasFactory;


    public function getUsers(){
        $users = User::where("org_id",$this->id)->get();
        return $users;
    }
    public function getComputers(){
        $computers = Computer::where("org_id",$this->id)->get();
        return $computers;
    }
}
