

@include('dashboard1')

    <style>
    .top {
    background-color: #F0EEED;
    color:black;
    height: 180px;
}

.tp {
    display: flex;
}

.tp h3 {
    margin: 31px;
    /* color: white; */
    font-weight: bolder;
    font-size: 34px;
    margin-top: 45px;
}

.tp div {
    margin-left: 60%;
    margin-top: 34px;
}

.tp button {
    padding: 10px;
    border-radius: 5px;
    border-style: none;
}

.box-slides-main {
    background-color: #F0EEED;

    display: flex;
    margin-top: 24px;
}

.box {
    height: 150px;
    width: 300px;
    margin: 6px;
    border-radius: 9px;
    margin-right: 17px;
    border-color: white;
}

.box:nth-child(3) {
     background-color: #183A1D;
    border-radius: 10px;
    color:white;
}
.box:nth-child(2) {
     background-color: #1B9C85;
    border-radius: 10px;
}

.box:nth-child(1) {
     background-color: #B8621B;
    border-radius: 10px;
}
.box:nth-child(4) {
     background-color: #635985;
    border-radius: 10px;
}
.bottom {
    background-color: rgb(221, 233, 247);
    height: 90px;

}

.bottom div {
    margin-left: 34px;
    margin-top: 44px;

}

.internal div {
    /* color: black; */
    margin: 13px;
    font-size: 18px;
}

.internal h1 {
    /* color: black; */
    font-weight: black;
    margin-left: 14px;
    margin-top: 14px;
}

.internal div i {
    margin-left: 49%;
    color: white;
    border-radius: 6px;
    padding: 6px;
}
</style>
</head>
<body>
<div>
    <div class="top">
        <div class="tp">
            <h3>Dashboard</h3>
            <!-- <div><input type="text" placeholder="Create new project"></div> -->
            <div><button type="button">Create new project</button></div>

        </div>
        <div class="box-slides-main">
            <div class="box">
                <div class="internal">
                    <div>Projects<i class="fa-regular fa-envelope"></i></div>
                    <h1> 18</h1>
                    <div>2 completed</div>
                </div>
            </div>
            <div class="box">
                <div class="internal">
                    <div>Employee <i class="fas fa-user"></i></div>
                    <h1> 14</h1>
                    <div>6 Active</div>
                </div>
            </div>
            <div class="box">
                <div class="internal">
                    <div>Gallery<i class="fa-solid fa-photo-film"></i></div>
                    <h1> 24</h1>
                    <div>12 Active</div>
                </div>
            </div>
            <div class="box">
                <div class="internal">
                    <div>User<i class="fa-solid fa-users"></i></div>
                    <h1> 204</h1>
                    <div>129 Active</div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div></div>
    </div>
</div>
    
</body>
</html>