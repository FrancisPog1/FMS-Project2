<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>
    <body>
        <style>
            img{
                width: 60px;
                height: auto;
            }
            th, td {
                border: .1rem solid;
                border-color: lightgrey;

            }
            th {
                background-color: #830000 !important;
                color: white !important;
            }
        </style>
        <section class="m-4 p-4">
            <div class="container-fluid">
                <div class="containter-fluid">
                    <div class="content text-center">
                        <img src="{{ asset('img/pup.png') }}" alt="The Pup Logo - Polytechnic University Of The Philippines Logo@pngkey.com"> </div>
                        <!-- <img src="https://www.pngkey.com/png/detail/52-528919_the-pup-logo-polytechnic-university-of-the-philippines.png" alt="The Pup Logo - Polytechnic University Of The Philippines Logo@pngkey.com"> </div> -->
                    <div class="text-center">
                        <p style="margin: 0 !important;">Republic of the Philippines</p>
                    </div>
                    <div class="container text-center">
                        <h6>Polytechnic University of the Philippines - Quezon City Campus</h6>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-3 text-center">
                <h5>Report Title</h5>
                <p style="font-style: italic;">subtitle</p>
            </div>
            <div class="row mt-4">
                <div class="col">Generated By: <b>Dr. Demelyn E. Monzon, PhD.</b></div>
                <div class="col text-end">Date Generated: <b>May 05, 2024 - 3:30PM</b></div>
            </div>
            <div class="container-fluid mt-4 border p-4">
                <table class="table">
                    <thead style="background-color: red;">
            <tr>
                <th>Faculty Name</th>
                <th>Requirement Bin</th>
                <th>Category</th>
                <th>Requirement</th>
                <th>Submission Type</th>
                <th>Deadline</th>
                <th>Date Submitted</th>
                <th>Timeliness</th>
                <th>Status</th>
            </tr>
                    </thead>
                    <tbody>
                        <!-- Faculty 1  -->
                        <tr>
                            <td>Faculty 1</td>
                            <td>Mandatory Requirements</td>
                            <td>Class Record</td>
                            <td>Soft Copy</td>
                            <td>20-Dec-2024</td>
                            <td>31-Dec-2024</td>
                            <td>11 day/s late</td>
                        </tr>
                        <!-- Faculty 2  -->
                        <tr>
                            <td>Faculty 2</td>
                            <td>Mandatory Requirements</td>
                            <td>Class Record</td>
                            <td>Hard Copy</td>
                            <td>20-Dec-2024</td>
                            <td>20-Dec-2024</td>
                            <td>On-time</td>
                        </tr>
                        <!-- Faculty 3  -->
                        <tr>
                            <td>Faculty 3</td>
                            <td>Mandatory Requirements</td>
                            <td>Class Record</td>
                            <td>Hard Copy</td>
                            <td>20-Dec-2024</td>
                            <td>For compliance</td>
                            <td>11 day/s late</td>
                        </tr>
                        <!-- Faculty 4  -->
                        <tr>
                            <td>Faculty 4</td>
                            <td>Mandatory Requirements</td>
                            <td>Class Record</td>
                            <td>Soft Copy</td>
                            <td>20-Dec-2024</td>
                            <td>19-Dec-2024</td>
                            <td>1 day/s ahead</td>
                        </tr>
                        <!-- Faculty 5  -->
                        <tr>
                            <td>Faculty 4</td>
                            <td>Mandatory Requirements</td>
                            <td>Class Record</td>
                            <td>Soft Copy</td>
                            <td>20-Dec-2024</td>
                            <td>For compliance</td>
                            <td>1 day/s before deadline</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        img{
            width: 60px;
            height: auto;

        }
        thead {
            background-color: #c93535;
            align-items: center;

        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="containter-fluid">
            <div class="content text-center">
                <img src="https://www.pngkey.com/png/detail/52-528919_the-pup-logo-polytechnic-university-of-the-philippines.png" alt="The Pup Logo - Polytechnic University Of The Philippines Logo@pngkey.com">            </div>
            <div class="container text-center">
                <b>Polytechnic University of the Philippines</b>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Faculty Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Submitted</th>
                    <th scope="col">Computation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Irryne Gatchalian</td>
                    <td>Mandatory Requirements</td>
                    <td>Class Record</td>
                    <td>30-04-2024</td>
                    <td>27-04-2024</td>
                    <td class="text-center">+ 3</td>
                </tr>
            </tbody>

        </table>
    </div>


</body>
</html> -->
