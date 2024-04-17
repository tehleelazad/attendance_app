<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .maindiv {
        width: 100%;
         height: 550px;
        display: flex;
    }

    .admin-left  {
        width: 20%;
        background-color:black;
        /* background-image: linear-gradient(#2D9596, #57837B	); */
        height:700px;
        color: white;
        overflow:scroll;         
    }
    .admin-left div{
        margin: 10px;
        font-size: 20px;
    }
    .admin-left i {
        margin: 12px;
        font-size: 20px;
    }
  .admin-left a{
    color: white;
    text-decoration:none;
    font-style:bold;
    font-size: 14px;
    margin:12px;

  }
  a:hover {
  background-color: #808080;
  padding:9px;
}
    .admin-right {
        width: 80%; 
    }
    .admin-right-top{
       display:flex;
    }
    .title1 h2{
      margin-left:26px;
      font-family:cursive;
      color:rgb(240, 170, 18);

    }
    .admin-right-top-left i{
        margin:17px;
        font-size:15px;
        color:grey;
    }
    .admin-right-top-middle input{
        padding:9px;
        margin:5px;
        padding-right:18px;
        border-radius:8px;
        border-color:#ffff;
        border-style:groove;
        width:112%;
    }
   .admin-right-top-right{
    margin-left:65%;
    margin-top:14px;
    background-color:rgb(243, 248, 250);
    border-radius:86px;
   }
   .admin-right-top-right i{
    margin:9px;
   }

   .admin-right-top-right2{
    margin-left:7px;
    margin-top:14px;
    background-color:rgb(243, 248, 250);
    border-radius:86px;
   }
   .admin-right-top-right2 i{
    margin:9px;
   }
    </style>
</head>

<body>
    <div class="maindiv">
        <div class="admin-left">
             <div class="title1"> <h2>Admin Panel</h2></div>
            <div><a href="#"><i class="fa-solid fa-house"></i>DashBoard</a></div>
            <div><a href="#"><i class="fa-solid fa-bars"></i>Home</a></div>
            <div><a href="#"><i class="fa-solid fa-address-card"></i>About </a></div>
            <div><a href='/dashboard2'><i class="fa-solid fa-user"></i>Employee Profiles</a></div>
            <div><a href="#"><i class="fa-solid fa-magnifying-glass"></i> Search </a></div>
            <div><a href="/role/create"><i class="fa-solid fa-address-book"></i> Contact us</a></div>
            <div><a href="#"><i class="fa-solid fa-gear"></i>Settings</a></div>
           <div> <a href="#"><i class="fa-solid fa-photo-film"></i>  Gallery</a></div>
           <div> <a href="logout"><i class="fa-solid fa-right-from-bracket"></i>  logout</a></div>




        </div>
        <div class="admin-right">
            
            <div class="admin-right-top">
               <div class="admin-right-top-left"><i class="fa-solid fa-bars"></i> </div>
               <div class="admin-right-top-middle"><input type="text"placeholder="Search"></div>
               <div class="admin-right-top-right"><i class="fa-regular fa-bell"></i></div>
               <div class="admin-right-top-right2"><i class="fa-solid fa-user"></i></div>
               <div class="admin-right-top-right2"><i class="fas fa-search"></i></div>
               <div class="admin-right-top-right2"><i class="fas fa-qrcode"></i></div>



            </div>








   @php
    $records=Session::get('uid');
     echo $records->username."<br>"; 
     echo "<a href='logout'>logout</a>";
         
  @endphp  
</body>
</html>