<!DOCTYPE html>

<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>gallery online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylesearch.css">
<style>
.itemse{
    width: 100%;
    height: 75px;
    padding: 10px;
    border: 1px solid #ccc
}

.seimg{
    width: 50px;
    height: 50px;
    margin-top: 7px;
    margin-left: 5%;
    border-radius: 50%;
    display: inline;
    margin-right: 25px;
   
}
.sename{
    display: inline;
    color: black;
    margin-right: 50px;
}
.btnse{
    display: inline;
    float: right;
    margin-right: 50px;
    margin-top: 10px;
}

</style>

</head>

<body>

<header>
    <div class="container">
            <div id="wrap" style="position: relative">

                    <input id="search" name="search" type="text" placeholder="who are you looking for ?"><input id="search_submit" value="Rechercher" type="submit">
                    <div id="searchitems" style="background: white; position: absolute; right:0; top: 60px; width: 80%; z-index: 100;">



                    </div>
            </div>
            
            <a class="btn profile-edit-btn" style="background: #761b18; color: white;" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form> 
            

        <div class="profile">

            <div class="profile-image">

            <img style="width:150px;height:150px;" src="images/{{$data["user"]["avatar"]}}.jpg" alt="">

            </div>

            <div class="profile-user-settings">

            <h1 class="profile-user-name" >{{$data["user"]["name"]}}</h1>

                <button class="btn profile-edit-btn"><a style="" href="/editprofile">Edit Profile</a></button>

{{--
                <button class="btn profile-edit-btn" style="background: #1b4b72; color: white" ><a style="text-decoration: none;color:white;" href="#" onClick="window.open('/upload','pagename','resizable,height=600,width=700'); return false;">Upload image</a></button>
--}}
                <button class="btn profile-edit-btn" style="background: #1b4b72; color: white" ><a style="text-decoration: none;color:white;" href="/upload">Upload image</a></button>

  



            </div>

            <div class="profile-stats">

                <ul>
                    <li><span class="profile-stat-count">{{$data["picnumber"]["picnumber"]}}</span> pictures</li>
                <li id="friends"><span class="profile-stat-count">{{$data["followernumber"]["followernumber"]}}</span> friends</li>
            <li id="notification"><i style="margin-right:5px;color:<?php if(!sizeof($data["notification"])){echo "black";}else{echo "red";}   ?>;" class='fas fa-bell'></i><span class="profile-stat-count"><?php  echo sizeof($data["notification"]);  ?></span> notification</li>
                  <!--  <li><span class="profile-stat-count">1</span> notification</li>-->
                </ul>

            </div>

            <div class="profile-bio">

                <p>{{$data["user"]["text"]}}</p>

            </div>

        </div>
        <!-- End of profile section -->

    </div>
    <!-- End of container -->

</header>

<main>

    <div class="container">

        <div class="gallery">
        @forEach($data["picture"] as $pic)

            <div class="gallery-item" tabindex="0">

                <img src="images/{{$pic["picture"]}}" id="{{$pic["picture"]}}" class="gallery-image" alt="" onclick="showImage(this)" data-toggle="modal" data-target="#exampleModalCenter">


            </div>


        @endforeach


        </div>
        <!-- End of gallery -->
    </div>
    <!-- End of container -->

</main>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script  src="js/index.js"></script>
<script  src="js/jsseacrch.js"></script>



<div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">your picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="pic" src="" style="width: 100%; height: auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">delete</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            Are you want delete this picture?
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display: block;width: 100%">NO</button>

                <button id="deletepic" type="button" class="btn btn-secondary" data-dismiss="modal "style="display: block;width: 100%">yes</button>




        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var picid="";
    function showImage(e) {
        document.getElementById("pic").src = e.src;
        picid=e.id;

        
    }


$('#deletepic').click(function()
{
       

        $.ajax({
        method: "POST",
        url: "deletepicture",
        data: { id: picid ,_token:'{{csrf_token()}}' }
        })
        .done(function( msg ) {
            location.reload();

               
        });
    
  
});
$('#friends').click(function()
{
       

window.open("/getallfollower", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=500,width=400,height=600");

    
  
});


$('#notification').click(function()
{
       


<?php

 if(sizeof($data["notification"]))
 {
     echo 'window.open("/shownotification", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=500,width=400,height=600");';
 }
 
 
 
 
?>
    
  
});


$("#search").keyup(function(){
    var data=$(this).val();
    $("#searchitems").html("");

    $.ajax({
        method: "POST",
        url: "/getsearch",
        data: {searchdata: data,_token:'{{csrf_token()}}' }
        })
        .done(function( msg ) {
            console.log(msg);
            msg.forEach(element => {
                var item='<div class="itemse"><img src="./images/'+element.avatar+'.jpg" class="seimg"><h2 class="sename">'+element.name+'</h2><button onclick="follow(this)" class="followbtn btnse btn profile-edit-btn" data-id="'+element.id+'">follow</button></div>';
                $("#searchitems").append(item);
                
            });

               
        });

});


//$("button").click(function(){
  //  var item=$(this).attr('data-id');
function follow(item){
    var it=$(item).attr('data-id');

    $.ajax({
        method: "POST",
        url: "/userfollow",
        data: {id: it,_token:'{{csrf_token()}}' }
        })
        .done(function( msg ) {
 

               
        });

}


$("#search").focusout(function(){
    setTimeout(() => {
        $("#searchitems").html("");
    }, 100);

});


 </script>
</body>

</html>
