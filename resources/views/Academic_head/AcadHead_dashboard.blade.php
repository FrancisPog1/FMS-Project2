@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PUPQC-FMS</title>

    </head>
    <body>
        
        <!-- TOP NAVIGATION BAR -->
        <nav class="fixed top-0 z-50 w-full border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700" style="background-image: url({{URL('images/navbar_red.png')}});">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
              <div class="flex items-center justify-between">
                <!-- LEFT SIDE -->
                <div class="flex items-center justify-start">
                  <a href="#" class="flex ml-2 md:mr-24">
                    <img src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png" class="h-11 mr-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">PUPQCFMS</span>
                  </a>
                </div>
                <!-- RIGHT SIDE -->

                <!-- <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown hover <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button> -->
                <div class="row" style="width: 190px;">
                    <div class="col-3 p-0">
                      <img id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="rounded-full w-10 h-10" src="https://lh3.googleusercontent.com/a-/ACB-R5SPNI6x5R3YO5R7LcdJlXMQGtn6kMwaDgvvu2S6=s75-c" alt="image description" type="button">
                    </div>
                    <div class="col-9 pl-0 text-white">
                      <span style="font-size: .9rem;">Demelyn Monzon</span><br>
                      <h5 style="font-size: .7rem;">Academic Head</h5>
                    </div>
                </div>                
                  
                  
                <!-- Dropdown menu -->
                <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <a href="links/user_profile/profile.html" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                      </li>
                      <li>
        
                       <a id="show-modal" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><button type="submit">Logout</button></a>
                      </li>
                    </ul>
                </div>
                
              </div>
            </div>
        </nav>

        <!-- SIDE BAR MENU -->
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
             <div class="h-full px-2 pb-4 overflow-y-auto">
                <div class="side-bar">
                    <div class="row-cols-2 b">
                        <div class="col">
                            <h4>PUPQC<b>FMS</b></h4>
                        </div>
                        <!-- <div class="col">
                            <div class="close-btn">
                                <i
                                    class="fas fa-times"
                                    style="color: var(--text-color-1)"
                                ></i>
                            </div>
                        </div> -->
                </div>
                <div class="menu">
                        <div class="item">
                            <a href="/testing/acadhead_dashboard.html">Dashboard</a>
                        </div>
                        
                        <div class="item">
                            <a class="sub-btn">
                              Account Setup
                                <i class="fas fa-angle-right dropdown"></i>
                            </a>

                            <div class="sub-menu">
                                <a href="/testing/links/accounts_setup/users.html" class="sub-item">User</a>
                                <a href="/testing/links/accounts_setup/role.html" class="sub-item">Roles</a>
                                <a href="/testing/links/accounts_setup/designation.html" class="sub-item">Designation</a>
                                <a href="/testing/links/accounts_setup/specialization.html" class="sub-item">Specialization</a>
                                <a href="/testing/links/accounts_setup/program.html" class="sub-item">Program</a>
                                <a href="/testing/links/accounts_setup/acad_role.html" class="sub-item">Academic Role</a>
                                <a href="/testing/links/accounts_setup/faculty_type.html" class="sub-item">Faculty Type</a>
                            </div>
                        </div>

                        <div class="item">
                            <a class="sub-btn"
                                >Classes<i class="fas fa-angle-right dropdown"></i
                            ></a>
                            <div class="sub-menu">
                                <a href="/testing/links/class_schedule/class_sched.html" class="sub-item">Class Schedule</a>
                                <a href="/testing/links/class_schedule/class_observe.html" class="sub-item">Observation</a>
                            </div>
                        </div>

                        <div class="item">
                            <a class="sub-btn"
                                >Documents<i class="fas fa-angle-right dropdown"></i
                            ></a>
                            <div class="sub-menu">
                                <a href="/testing/links/requirement_docs/req_types.html" class="sub-item">Requirement Types</a>
                                <a href="/testing/links/requirement_docs/req_bin.html" class="sub-item">Requirement Bin</a>
                            </div>
                        </div>

                        <div class="item">
                            <a class="sub-btn">Activities<i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="/testing/links/activities/activity_list.html" class="sub-item">Lists</a>
                                <a href="/testing/links/activities/activity_type.html" class="sub-item">Types</a>
                            </div>
                        </div>

                        <div class="item">
                            <a class="sub-btn">Reports<i class="fas fa-angle-right dropdown"></i></a>
                            <div class="sub-menu">
                                <a href="/testing/links/reports/attendance_report.html" class="sub-item">Attendance</a>
                                <a href="/testing/links/reports/observation_report.html" class="sub-item">Observation</a>
                                <a href="/testing/links/reports/submission_report.html" class="sub-item">Submission</a>
                                <a href="/testing/links/reports/activities_report.html" class="sub-item">Activities</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
             </div>
        </aside>

        <!-- DASHBOARD GRIDS -->
        <div class="p-4 sm:ml-64">
             <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                <div class="grid grid-cols-3 gap-4 mb-4">
                   <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">this is Dashboard</p>
                  </div>
                   <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                </div>
                <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                </div>
                <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                   <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                   <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                      <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                   </div>
                </div>
             </div>
        </div>

        <!-- SCRIPT FOR SIDEBAR -->
        <script type="text/javascript">
            $(document).ready(function () {
                //jquery for toggle sub menus
                $(".sub-btn").click(function () {
                    $(this).next(".sub-menu").slideToggle();
                    $(this).find(".dropdown").toggleClass("rotate");
                });

                //jquery for expand and collapse the sidebar
                $(".menu-btn").click(function () {
                    $(".side-bar").addClass("active");
                    $(".menu-btn").css("visibility", "hidden");
                });

                $(".close-btn").click(function () {
                    $(".side-bar").removeClass("active");
                    $(".menu-btn").css("visibility", "visible");
                });
            });
        </script>        
        

    <script>
        document.getElementById('show-modal').addEventListener('click', function() {       
            Swal.fire({
                title: 'Are you sure?',
                icon: 'info',
                html:
                'Do you want to <b>Log out</b>?', 
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                '<a href= "logout" >Yes</a>',
                confirmButtonColor: '#3085d6',
                confirmButtonAriaLabel: '...',

                cancelButtonColor: '#d33',
                cancelButtonAriaLabel: '...'
            });

            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //     if (result.isConfirmed) {
            //         Swal.fire(
            //         'Deleted!',
            //         'Your file has been deleted.',
            //         'success'
            //         )
            //     }
            // });
        });        
    </script>

    

    </body>
</html>