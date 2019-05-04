
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
 
 
 </head>
 
 <body>
 
 
 <div class="modal-body">
 
 
 
                 <style>
                     @import url("https://fonts.googleapis.com/css?family=Karla:400,700");
                     html {
                         box-sizing: border-box;
                         font-size: 62.5%;
                     }
 
                     *, *:before, *:after {
                         box-sizing: inherit;
                     }
 
                     html, body {
                         width: 100%;
                         height: 100%;
                     }
 
                     body {
                         font-size: 1.6rem;
                         color: #002b5d;
                         font-family: 'Karla', arial, sans-serif;
                     }
 
 
                     .list {
                         margin: 0;
                         padding: 0;
                         list-style-type: none;
                         display: flex;
                         justify-content: space-between;
                         flex-wrap: wrap;
                         width: 100%;
                     }
 
                     .list-item {
                         width: 100%;
                         max-width: 350px;
                         margin-bottom: 2rem;
                         padding: 1rem;
                         border: 1px solid #e1e4ea;
                         display: flex;
                         align-items: center;
                         position: relative;
                         color: #002b5d;
                         text-decoration: none;
                     }
                     .list-item:hover {
                         border: 1px solid #cacfd9;
                         color: #3384f3;
                         background: #f6f7f9;
                         text-decoration: none;
                     }
                     .list-item:hover .list-item__button {
                         opacity: 1;
                         transition: all 100ms ease;
                     }
                     .list-item__avatar {
                         margin-right: 1rem;
                     }
                     .list-item__avatar img {
                         border: 1px solid #cacfd9;
                         border-radius: 50%;
                         width: 40px;
                         height: 40px;
                         background-color: #e1e4ea;
                     }
                     .list-item__name {
                         display: block;
                     }
                     .list-item__info {
                         font-size: .85em;
                         color: #91a1bb;
                     }
                     .list-item__button {
                         border: none;
                         margin: 0;
                         padding: 0;
                         width: auto;
                         overflow: visible;
                         font-family: inherit;
                         position: absolute;
                         top: 7px;
                         right: 7px;
                         width: 18px;
                         height: 18px;
                         font-weight: 700;
                         background: #3384f3;
                         color: #ffffff;
                         line-height: 18px;
                         text-transform: uppercase;
                         border-radius: 999px;
                         cursor: pointer;
                         opacity: .6;
                         outline: none;
                         opacity: .2;
                     }
                     .list-item__button svg {
                         position: absolute;
                         top: 50%;
                         left: 50%;
                         -webkit-transform: translate(-50%, -50%);
                         transform: translate(-50%, -50%);
                     }
 
                     .search {
                         margin-bottom: 4rem;
                         font-size: 2.4rem;
                         position: relative;
                     }
                     .search label, .search input {
                         display: block;
                     }
                     .search label {
                         font-weight: 700;
                         margin-bottom: 1rem;
                     }
                     .search input {
                         width: 100%;
                         padding: 1rem;
                         border-radius: 5px;
                         border: 1px solid #cacfd9;
                         font-family: inherit;
                         outline: none;
                     }
                     .search input:focus {
                         box-shadow: 0px 0px 0px 3px rgba(51, 132, 243, 0.15);
                         border-color: #3384f3;
                     }
                     .search__clear {
                         position: absolute;
                         top: 15px;
                         right: 1rem;
                         cursor: pointer;
                         background: #e1e4ea;
                         width: 2rem;
                         height: 2rem;
                         line-height: 2rem;
                         color: #91a1bb;
                         border: 0;
                         padding: 0;
                         border-radius: 50%;
                         font-size: 1.4rem;
                     }
                     .search__clear:focus, .search__clear:active {
                         outline: 0;
                     }
                     .search__clear:hover {
                         background: #cacfd9;
                         color: #597191;
                     }
 
                     .recent-search {
                         width: 100%;
                         margin-top: 1.5rem;
                         display: flex;
                         align-items: center;
                     }
 
                     .search-item {
                         font-size: 1.4rem;
                         display: inline-block;
                         padding: .5rem;
                         line-height: 1;
                         color: #3384f3;
                         border-radius: 5px;
                         background: rgba(51, 132, 243, 0.15);
                         cursor: pointer;
                         margin: 0 .5rem .5rem 0;
                     }
                     .search-item:hover, .search-item:focus {
                         color: #0e69e6;
                         background: rgba(51, 132, 243, 0.2);
                     }
                     .search-item__close {
                         opacity: .5;
                         display: inline-block;
                         cursor: pointer;
                         margin-left: .5rem;
                     }
                     .search-item__close:hover {
                         color: #d63031;
                     }
                     .search-item:nth-of-type(5n + 2) {
                         color: #00b894;
                         background: rgba(0, 184, 148, 0.15);
                     }
                     .search-item:nth-of-type(5n + 2):hover, .search-item:nth-of-type(5n + 2):focus {
                         color: #00856b;
                         background: rgba(0, 184, 148, 0.2);
                     }
                     .search-item:nth-of-type(5n + 3) {
                         color: #D980FA;
                         background: rgba(217, 128, 250, 0.15);
                     }
                     .search-item:nth-of-type(5n + 3):hover, .search-item:nth-of-type(5n + 3):focus {
                         color: #ca4ff8;
                         background: rgba(217, 128, 250, 0.2);
                     }
                     .search-item:nth-of-type(5n + 4) {
                         color: #d63031;
                         background: rgba(214, 48, 49, 0.15);
                     }
                     .search-item:nth-of-type(5n + 4):hover, .search-item:nth-of-type(5n + 4):focus {
                         color: #b02324;
                         background: rgba(214, 48, 49, 0.2);
                     }
                     .search-item:nth-of-type(5n + 5) {
                         color: #fca709;
                         background: rgba(253, 203, 110, 0.2);
                     }
                     .search-item:nth-of-type(5n + 5):hover, .search-item:nth-of-type(5n + 5):focus {
                         color: #e89803;
                         background: rgba(253, 203, 110, 0.25);
                     }
 
                     .clear-btn {
                         font-family: inherit;
                         background: #91a1bb;
                         color: #ffffff;
                         border: 0;
                         cursor: pointer;
                         margin-right: 1rem;
                         border-radius: 5px;
                         font-size: 1.4rem;
                         display: inline-block;
                         padding: .5rem 1rem;
                         line-height: 1;
                     }
                     .clear-btn:hover {
                         background: #597191;
                     }
                     .clear-btn:focus, .clear-btn:active {
                         outline: 0;
                     }
                     .clear-btn:disabled {
                         background: #f6f7f9;
                         color: #91a1bb;
                         cursor: not-allowed;
                     }
 
                 </style>
 
 
                         <div class="search">
 
                             <div class="recent-search">
                                @foreach($data as $follower)
                                     <div class="list" id="list" data-searchable="data-searchable">
                                         <a class="list-item" href="#">
                                             <div class="list-item__avatar">
                                                 <img src="./images/{{ $follower->avatar}}.jpg">
                                             </div>
                                             <div class="list-item__content">
                                             <strong class="list-item__name"> {{ $follower->name}}</strong>
                                             </div>
                                            <button class="search__clear" data-id="{{ $follower->id}}" data-toggle="modal" data-target=".unfollow" onclick="unfollow(this)">&times;</button>
 
                                         </a>
                                @endforeach

 
 
                                     </div>
 
 
                             </div>
                         </div>
                         <div class="list" id="list" data-searchable="data-searchable"></div>
 
 
 
 
 
 
             </div>
 
 
 
 
 
 <div class="modal fade bd-example-modal-sm unfollow" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <form action="/unfollow" method="POST">
                @csrf
                 <input style="display: none" name="gid" id="inputunfollow">
                 Are you want unfollow?
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display: block;width: 100%">NO</button>
 
                 <button type="submit" class="btn btn-secondary" data-dismiss="modal "style="display: block;width: 100%">yes</button>
             </form>
 
 
 
         </div>
     </div>
 </div>
 
 
 <script>
   
     function unfollow(id) {
 
 
         $("#inputunfollow").val($(id).attr("data-id"));
        // console.log($("#inputunfollow").val());
     }
 
 </script>
 
 
 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
 </body>
 </html>