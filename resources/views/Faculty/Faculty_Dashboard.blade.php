@extends('layouts.Faculty_master')


{{-- CONTENTS --}}
@section('content')

            <!-- Content Wrapper. Outer Container -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row-col-sm-6 mb-2">
                            <div class="col-md-6 ml-4">
                                <br>
                                <h1 class="m-0">{{$greeting}} {{$name}}!</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <!-- Summary Cards -->
                <div class="pl-5 pr-5 pt-2">
                    <div class="col-md-12 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="container-fluid">
                                    <div class="info-box">
                                        <span class="info-box-icon  pal-1 pal-1 text-col-2 elevation-1"><i class="fas fa-user-shield"></i></span>

                                        <div class="info-box-content">
                                        <span class="info-box-text">Total Bin Submitted</span>
                                        <span class="info-box-number">
                                            0
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="container-fluid">
                                    <div class="info-box">
                                        <span class="info-box-icon pal-1 text-col-2 elevation-1"><i class="fas fa-folder"></i></span>

                                        <div class="info-box-content">
                                        <span class="info-box-text">Activities</span>
                                        <span class="info-box-number">
                                            0
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="container-fluid">
                                    <div class="info-box">
                                        <span class="info-box-icon pal-1 text-col-2 pal-1 elevation-1"><i class="fas fa-user-graduate"></i></span>

                                        <div class="info-box-content">
                                        <span class="info-box-text">Meetings</span>
                                        <span class="info-box-number">
                                            0
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Graphs -->
                    <div class="col-md-12 m-auto">
                        <div class="row justify-content-between">
                            <div class="col-7 pl-5 pr-5">

                                <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                                    <div class="card-header">
                                        <label>Requirement Stats</label>
                                    </div>
                                    <div>
                                        <canvas id="" width="324" height="269" style="display: block; box-sizing: border-box; height: 150px; width: 360px;"></canvas>
                                    </div>
                                </div>


                                <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                                    <div class="card-header">
                                        <label>Activity Status</label>
                                    </div>
                                    <div>
                                        <canvas id="" width="324" height="269" style="display: block; box-sizing: border-box; height: 150px; width: 360px;"></canvas>
                                    </div>
                                </div>

                            </div>

                            <div class="col-5 pt-0">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title  text-pal-1">
                                            <i class="ion ion-clipboard mr-1"></i>
                                            <b>To Do List</b>
                                        </h3>

                                        <div class="card-tools">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item"><a href="#" class="page-link text-pal-1">&laquo;</a></li>
                                                <li class="page-item pal-1"><a href="#" class="page-link text-pal-1">1</a></li>
                                                <li class="page-item pal-1"><a href="#" class="page-link text-pal-1">2</a></li>
                                                <li class="page-item pal-1"><a href="#" class="page-link text-pal-1">3</a></li>
                                                <li class="page-item"><a href="#" class="page-link text-pal-1">&raquo;</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <ul class="todo-list" data-widget="todo-list">

                                            <li>
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                                    <label for="todoCheck1"></label>
                                                </div>
                                                <span class="text">Eat lunch</span>
                                                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                                <!-- General tools such as edit or delete-->
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash-o"></i>
                                                </div>
                                            </li>

                                            <li>
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div  class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                                    <label for="todoCheck2"></label>
                                                </div>
                                                <span class="text">Make a class plan</span>
                                                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash-o"></i>
                                                </div>
                                            </li>

                                            <li>
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div  class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                                    <label for="todoCheck3"></label>
                                                </div>
                                                <span class="text">Go to Sydney, Australia</span>
                                                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash-o"></i>
                                                </div>
                                            </li>

                                            <li>
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div  class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                                    <label for="todoCheck4"></label>
                                                </div>
                                                <span class="text">Find my crush when i was in college</span>
                                                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash-o"></i>
                                                </div>
                                            </li>

                                            <li>
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div  class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                                    <label for="todoCheck5"></label>
                                                </div>
                                                <span class="text">Check my meeting scheds</span>
                                                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash-o"></i>
                                                </div>
                                            </li>

                                            <li>
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <div  class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                                    <label for="todoCheck6"></label>
                                                </div>
                                                <span class="text">Get a fight with my boss</span>
                                                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                                <div class="tools">
                                                    <i class="fas fa-edit"></i>
                                                    <i class="fas fa-trash-o"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card-footer clearfix">
                                        <button type="button" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>

            </div>

            <!-- Footer Container -->
            <footer class="main-footer">
                <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
                    All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
                </div>
            </footer>
 @endsection
