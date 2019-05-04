<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\picture;
use Illuminate\Http\Request;

class pictureController extends Controller
{
    //
    // FormController.php

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    public function store(Request $request)

    {

        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,jpg'

        ]);

        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $t=time();
                $name="$t-".$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
            }
        }

        $form= new picture();
        $form->filename=json_encode($data);
       


        $form->save();

        return redirect()->route('selectFollower', ["pName"=>$name] );
        //return back()->with('success', 'Your images has been successfully');
    }

}

