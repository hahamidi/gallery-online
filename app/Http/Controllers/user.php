<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\follow;

use App\picture;
use App\picuser;
use App\users;
use App\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class user extends Controller
{
    //

    public function select($id)
    {
        

        
        $model=new follow();
        $data=$model->getFollower();

        return view('selectFollower', ["data"=>$data,"pic"=>$id]);
    }
    public function addpicture(Request $request)
    {

        $ids=$request->input("id");
        $picture=$request->input("picture");
        $pic= new picuser();
        foreach($ids as $id)
        {
            $pic= new picuser();
            $pic->userid=$id;
            $pic->picture=$picture;
            $pic->save();
        }
       return view("success");
    }
    public function indexpage()
    {
        $model=new users();
        $data=$model->getIndexData();
 //var_dump($data);
       return view('welcome' ,["data"=>$data]);
    }
    public function edit()
    {
        $model=new users();
        $data=$model->getEditData();
  
        return view('editProfile',['data'=>$data[0]]);

    }
    public function editprofile(Request $request)
    {

        $this->validate($request, [
   

   

        ]);
        $id=Auth::id();

        if($request->hasfile('filename'))
        {
          

            foreach($request->file('filename') as $image)
            {  
                $t=time();
                $name="$t-".$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $name=str_replace(".jpg", "", $name);
                DB::table('users')->where('id', $id)->update(['avatar' => $name]);

            }
        }





        


        $email=$request->input("email");
        $name=$request->input("name");
        $text=$request->input("text");
        DB::table('users')->where('id', $id)->update(['name' => $name,'email'=>$email,'text'=>$text]);
        return redirect('/');

    }
    public function search()
    {
        $id=auth::id();
        $searchdata=$_POST['searchdata'];
        $data=DB::select("select name,avatar,id from users where name like '%".$searchdata."%' and id!=? and id not in (select idg from follow where idr=?  union select user from notification where userf=?)",[$id,$id,$id]);
        $data = json_decode(json_encode($data), true);
        return $data;
    }
    public function deletepic()
    {
        DB::table('picuser')->where('picture', $_POST['id'])->delete();
        
    }
    public function getAllfollower()
    {
        $id=auth::id();
        $data = DB::select("select name,avatar,users.id from (select * from follow where idr =? ) as fo inner join users on fo.idg = users.id ",[$id]);


        return view('followers',['data'=>$data]);


    }
    public function unfollow()
    {
          $idr=auth::id();
          $idg=(int) $_POST['gid'];
          $data = DB::table('follow')->where(["idr"=>$idr,"idg"=>$idg])->delete();
          return redirect('/getallfollower');
    }
    public function follow()
    {
        echo "1";
        $id=auth::id();
        $model=new notification;
        $model->user=(int) $_POST['id'];
        $model->state=1; //unread
        $model->kind=0;
        $model->userf=$id;
        $model->save();
        /*
        $model=new follow();
        $model->idr=$id;
        $model->idg=(int) $_POST['id'];
        $model->save();*/


    }
    public function shownotification()
    {
        $id=auth::id();
        $data=DB::select("select * from (select  id as notifid,user,kind,userf,created_at from notification where user=? and kind=0 and state=1) as notif inner join (select avatar,name,id from users) as userha on notif.userf=userha.id",[$id]);
        return view("notification",["data"=>$data]); 
    }
    public function acceptfollow()
    {
        $notification_id=$_POST["gid"];
        $idrg=DB::select("select userf,user from notification where id=?",[$notification_id]);

        $model=new follow();
        $model->idr=$idrg[0]->userf;
        $model->idg=$idrg[0]->user;
        $model->save();
        DB::table("notification")->where('id', $notification_id)->delete();

        
    }

    
}
