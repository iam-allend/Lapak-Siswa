<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0
        }

        body {
            background-color: #fff
        }

        .card1 {
            height: 100vh;
            width: 100%;
            background-color: #272162;
            border: none
        }

        .card2 {
            height: 100vh;
            width: 100%;
            background-color: #f6f5fa;
            border: none
        }

        .image span {
            color: #fff;
            font-size: 28px
        }

        .hline {
            color: #a2a5d8
        }

        .btn {
            height: 40px;
            width: 100%;
            border: none;
            position: relative;
            border-radius: 5px
        }

        .btn i {
            position: absolute;
            left: 10px;
            color: #fff;
            font-weight: 500;
            font-size: 18px;
            top: 10px
        }

        .btn span {
            position: absolute;
            right: 8px;
            color: #fff;
            font-weight: 400;
            font-size: 16px;
            top: 10px
        }

        .btn:hover {
            background-color: #3ddcd1
        }

        .other {
            color: #575c93
        }

        .hello span {
            font-size: 25px;
            font-weight: bold;
            color: #3c3f61;
            right: 40px
        }

        .shape {
            background-color: #fff
        }

        .cardchild {
            height: 100px;
            width: 200px;
            border: none;
            position: relative;
            border-radius: 10px
        }

        .type {
            font-weight: 500
        }

        .number {
            font-size: 25px;
            color: #4f5366
        }

        .cardchild .logo1 {
            position: absolute;
            top: 15px;
            right: 20px
        }

        .cardchild .percentage {
            position: absolute;
            bottom: 10px;
            right: 15px;
            color: #48ddd8;
            font-weight: 500
        }

        .cardchild .logo2 {
            position: absolute;
            top: 15px;
            right: 20px
        }

        .cardchild .percentage2 {
            position: absolute;
            bottom: 10px;
            right: 15px;
            color: #bb7484;
            font-weight: 500
        }

        .cardchild .logo3 {
            position: absolute;
            top: 15px;
            color: #bb7484;
            right: 20px
        }

        .cardchild .percentage3 {
            position: absolute;
            bottom: 10px;
            right: 15px;
            color: #48ddd8;
            font-weight: 500
        }

        .cardchild .logo4 {
            position: absolute;
            top: 15px;
            right: 20px
        }

        .cardchild .percentage4 {
            position: absolute;
            bottom: 10px;
            right: 15px;
            color: #bb7484;
            font-weight: 500
        }

        .cardchildchild {
            width: 335px;
            position: relative;
            border: none;
            border-radius: 15px;
            cursor: pointer
        }


        .cardchildchild .profile1 {
            position: absolute;
            border-radius: 50%;
            top: -45px;
            display: flex;
            align-items: center;
            justify-content: center;
            right: 120px
        }

        .name {
            font-size: 18px;
            font-weight: 500
        }

        .braceletid {
            font-size: 13px;
            color: #bab9ba;
            font-family: 'Source Sans Pro', sans-serif
        }

        .btn1 {
            height: 35px;
            width: 160px;
            border: none;
            background-color: #f8c01a;
            cursor: pointer;
            color: #fff;
            font-weight: 500;
            font-size: 16px;
            border-radius: 20px
        }

        .btn1:hover {
            background-color: #c72b2b
        }

        .icons {
            font-size: 20px;
            font-weight: 500
        }

        .dummytext {
            font-size: 14px;
            font-weight: normal;
            color: #b0aeb1
        }

        .btn2 {
            height: 35px;
            width: 160px;
            border: none;
            background-color: #c72b2b;
            cursor: pointer;
            color: #fff;
            font-weight: 500;
            font-size: 16px;
            border-radius: 20px
        }

        .btn2:hover {
            background-color: #f8c01a
        }
    </style>
</head>

<body>
    <div>
        <div class="d-flex flex-row">
            <div class="col-md-3">
                <div class="card card1 p-3">
                    <div class=" image d-flex flex-row align-items-center mt-3"> <img src="https://i.imgur.com/R4afbIg.png" height="50" width="50" /> <span>Clover</span> </div>
                    <hr class="hline">
                    <div class="d-flex flex-column align-items-center"> <button class="btn"><i class="fa fa-dashboard"></i><span>Dashboard</span></button> <button class="btn mt-3"><i class="fa fa-users"></i><span>Users</span></button> <button class="btn mt-3"><i class="fa fa-inbox"></i><span>Inbox</span></button> <span class="other mt-4">Other Information</span> <button class="btn mt-3"><i class="fa fa-book"></i><span>Knowlwdge</span></button> <button class="btn mt-3"><i class="fa fa-question-circle"></i><span>Dashboard</span></button> </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card2 p-3">
                    <div class="hello d-flex justify-content-end align-items-center mt-3"> <span>Hi,Frank Jack</span> </div>
                    <div class="d-flex flex-row gap-3">
                        <div class="card cardchild mt-3 p-2 px-3 py-3">
                            <div class="d-flex p-2 mt-2 justify-content-between rounded">
                                <div class="d-flex flex-column"><span class="type">Minimal</span><span class="number">132</span></div>
                                <div class="d-flex flex-column"><img src="https://i.imgur.com/Slxu74c.png" class="logo1" height="40" width="40" /><span class="percentage">45%</span></div>
                            </div>
                        </div>
                        <div class="card cardchild mt-3 p-2 px-3 py-3">
                            <div class="d-flex p-2 mt-2 justify-content-between rounded">
                                <div class="d-flex flex-column"><span class="type">Mild</span><span class="number">120</span></div>
                                <div class="d-flex flex-column"><img src="https://i.imgur.com/7SEdq7z.png" class="logo2" height="40" width="40" /><span class="percentage2">25%</span></div>
                            </div>
                        </div>
                        <div class="card cardchild mt-3 p-2 px-3 py-3">
                            <div class="d-flex p-2 mt-2 justify-content-between rounded">
                                <div class="d-flex flex-column"><span class="type">Moderate</span><span class="number">25</span></div>
                                <div class="d-flex flex-column"><img src="https://i.imgur.com/xvUzRjK.png" class="logo3" height="40" width="40" /><span class="percentage3">17%</span></div>
                            </div>
                        </div>
                        <div class="card cardchild mt-3 p-2 px-3 py-3">
                            <div class="d-flex p-2 mt-2 justify-content-between rounded">
                                <div class="d-flex flex-column"><span class="type">Severe</span><span class="number">5</span></div>
                                <div class="d-flex flex-column"><img src=" https://i.imgur.com/iLU5F9A.png" class="logo4" height="40" width="40" /><span class="percentage4">13%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5 gap-2 p-3">
                        <div class="col-md-6">
                            <div class="card cardchildchild p-2">
                                <div class="profile1"> <img src="https://i.imgur.com/NI5b1NX.jpg" height="90" width="90" class="rounded-circle" /> </div>
                                <div class="d-flex flex-column justify-content-center align-items-center mt-5"> <span class="name">Bess Wills</span> <span class="mt-1 braceletid">Bracelet ID:SFG 38393</span> <span class="dummytext mt-3 p-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Text elit more smtit.Kimto lee. </span> </div>
                                <div class="d-flex justify-content-center align-items-center mt-3"> <button class="btn1">Next Appoinment</button> </div>
                                <div class=" icons d-flex flex-row justify-content-center gap-3 mt-4"> <span><i class="fa fa-google"></i></span> <span><i class="fa fa-facebook"></i></span> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-instagram"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card cardchildchild p-2">
                                <div class="profile1"> <img src="https://i.imgur.com/YyoCGsa.jpg" height="90" width="90" class="rounded-circle" /> </div>
                                <div class="d-flex flex-column justify-content-center align-items-center mt-5"> <span class="name">Bess Wills</span> <span class="mt-1 braceletid">Bracelet ID:SFG 38393</span> <span class="dummytext mt-3 p-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Text elit more smtit.Kimto lee. </span> </div>
                                <div class="d-flex justify-content-center align-items-center mt-3"> <button class="btn2">Next Appoinment</button> </div>
                                <div class=" icons d-flex flex-row justify-content-center gap-3 mt-4"> <span><i class="fa fa-google"></i></span> <span><i class="fa fa-facebook"></i></span> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-instagram"></i></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>