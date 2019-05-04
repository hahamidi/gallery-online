<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class follow extends Model
{
    //

    protected $table = 'follow';
    public function getFollower()
    {

        $id = Auth::id();
        $datar = DB::select("select name,avatar,users.id from (select * from follow where idr =? ) as fo inner join users on fo.idg = users.id ",[$id]);
        $you=DB::select("select id,name,avatar from users where id=?",[$id]);
        $you = json_decode(json_encode($you), true);
        $array = json_decode(json_encode($datar), true);
        array_unshift($array,$you[0]);
        
        //$datag = DB::table('follow')->where('idg',$id)->get();

        return $array;
    }

}
