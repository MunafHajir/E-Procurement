<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Landing Page
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/material-dashboard.css') }}" />
</head>
<body>

<!-- {{var_dump($work_details)}} -->
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    
            Tip 2: you can also add an image using data-image tag
        -->
          <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
              Dashboard
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="nav-item  active ">
                <a class="nav-link" href="/apply">
                  <i class="material-icons">dashboard</i>
                  <p>Home</p>
                </a>
              </li>
              
            </ul>
          </div>

        </div>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                <div class="navbar-wrapper">
                  <a class="navbar-brand" href="#pablo">E-Procurement</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                  <form class="navbar-form">
                    <div class="input-group no-border">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </form>
                  <ul class="navbar-nav">
                    
                    <li class="nav-item">
                      <a class="nav-link" href="#pablo">
                        <i class="material-icons">person</i>
                        
                        <p class="d-lg-none d-md-block">
                          Account
                        </p>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title ">Freelancing Work</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class=" text-primary">
                              <th>
                                ID
                              </th>
                              <th>
                                Work
                              </th>
                              <th>
                                Company Name
                              </th>
                              <th>
                                Deadline
                              </th>
                              <th>
                                Budget
                              </th>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ($work_details as $details)
                            <form method = 'post' action = "{{route('applied')}}">
                            @csrf
                              <tr>
                                <td>
                                  {{$i}}
                                  <input name="work_id" type="hidden" value="{{$details->id}}">
                                  <input name = "description" type="hidden" value="{{$details->description}}">
                                </td>
                                <td>
                                  {{$details->work}}
                                  <input name="work" type="hidden" value="{{$details->work}}">

                                </td>
                                <td>
                                  {{$details->company_name}}
                                  <input name="company_name" type="hidden" value="{{$details->company_name}}">

                                </td>
                                <td>
                                  {{$details->deadline}}
                                  <input name="deadline" type="hidden" value="{{$details->deadline}}">

                                </td>
                                <td class="text-primary">
                                  {{$details->budget}}
                                  <input name="budget" type="hidden" value="{{$details->budget}}">

                                </td>
                                <td >
                                    <button class="btn btn-primary pull-right" type="submit">Apply</button>
                                  </td>
                                @php($i++)
                              </tr>
                              </form>
                              @endforeach

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  </div>
                  </div>
</body>
</html>