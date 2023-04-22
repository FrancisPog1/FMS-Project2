@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUPQCFMS</title>
    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--CSS FOR FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,100&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body>

    <style>

        *
        {
            font-family:'Poppins', sans-serif;
        } 

        h4
        {
            font-size: 1rem;
        }

    </style>

    <section class="container-fluid ">
        <div class="row">

            <!--RIGHT PANEL-->
            <div class="col-md-9 text-center">
                <br><br><br><br><br><br>
                <br><br><br><br><br><br>
                Dashboard overview
            </div>

            <!--LEFT PANEL-->
            <div class="col-md-3 text-center border-start">
                <div class="card-body">

                    <!--CARD HEADER-->  
                    <div class="card-header" style="background-color: #fff;">
                        <div class="text-center">
                            <img alt="PUP" class="img-circle mt-5 mb-4" src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png">
                        </div>
                    </div>

                    <!--CARD BODY-->
                
                    <div class="card-body mt-3">
                        <h5 class="text-center">Welcome to!</h5>
                        <h1 class="text-body text-center text" style="font-size: 2.5rem; font-display: fl;">
                            <b>FAMOS</b><span style="font-size: 12px;">   v2</span>
                        </h1> 
                        
                        <form action="{{route('login_user')}}" method="post">
                            <span class=""><p class="" style="font-size: .8rem;">PUPQC-Faculty Monitoring System</p></span>
                            @csrf 
                            <span class="" ><p class="m-4" style="font-size: 1rem;">Login</p></span>
                            <div class="">
                                <input type="email" class="form-control mb-2" name="email" placeholder="Email">
                                <span class="text-danger">@error('email') {{$message}} @enderror </span>
                                <input type="password" class="form-control mb-4" name="Password" placeholder="Password">
                                <span class="text-danger">@error('Password') {{$message}} @enderror </span>
                            </div>

                            <span class="" > <p class=""><a href="" class="m-0" style="font-size: .8rem;">I forgot my password</a></span></p>
                            
                            <div class="row btn-group">
                                <div class="col-6">
                                <button class="btn btn-primary d-inline-block m-0" type="submit">Login</button>
                                </div>                           
                            </div>
                        </form>
                    </div>

                    <!-- CARD FOOTER -->
                    <div class="card-footer" style="background-color: #fff;">
                        <p class="" style="font-size: .6rem;">
                            PUP QUEZON CITY - FACULTY MONITORING SYSTEM @2023
                        </p>
                    </div>
                </div>
            </div>
        </div>        
    </section>
    <script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>