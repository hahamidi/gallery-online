<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class users extends Model
{

    public function getIndexData()
    {
        $id=auth::id();
        $data1=DB::select("select avatar,name,id,text from users where id=?",[$id]);
        $data1 = json_decode(json_encode($data1), true);
        $data2=DB::select("select count(*) as followernumber from follow where idr=?",[$id]);
        $data2 = json_decode(json_encode($data2), true);
        $data3=DB::select("select count(*) as picnumber from picuser where userid=?",[$id]);
        $data3 = json_decode(json_encode($data3), true);
        $data4=DB::select("select * from picuser where userid=?",[$id]);
        $data4 = json_decode(json_encode($data4), true);
        $data5=DB::select("select * from notification where user=?",[$id]);
        $data5 = json_decode(json_encode($data5), true);
        $data=["user"=>$data1[0],"followernumber"=>$data2[0],"picnumber"=>$data3[0],"picture"=>$data4,"notification"=>$data5];

       return $data;


    }
    public function getEditData()
    {
        $id=auth::id();
        $data1=DB::select("select avatar,name,id,text,email from users where id=?",[$id]);
        $data1 = json_decode(json_encode($data1), true);
        return $data1;


    }


}
