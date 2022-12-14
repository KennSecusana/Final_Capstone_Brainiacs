@extends('layouts.layoutsidebar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    
    @if (session('status'))
    <h6 class="alert alert-success"style="font-size: 20px;">
      {{session('status')}}
    </h6>
    @endif

           <h1 style="color:dimgray; font-size:22px; margin-left:20px; position:relative; top:15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">DASHBOARD</h1>
    
        {{-- <li class="nav-item d-flex justify-content-end" style="position:relative; top:-30px;">
            <a href="{{ route('calendar') }}"
               class="nav-link {{ Request::is('calendar') ? '' : '' }}">
                <span class="input-group-text fas fa-calendar-alt bg-success "><span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">&nbsp;Calendar|Events</span> </span>
                
            </a>
        </li> --}}
         
          <div class="cardBox" style="margin-top:8px;">
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="person"></ion-icon>
                </div>
                <div>
                    <div class="cardName" >Administrator</div>
                    <div class="numbers" ><span>{{$admin}}</span></div>
                </div>
            </div>
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
                <div>
                    <div class="cardName" >Grade 11 Students</div>
                    <div class="numbers">0</div>
                </div>
            </div>
            <div class="card elevation-2">
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
                <div>
                    <div class="cardName" >Grade 12 Students</div>
                    <div class="numbers" >0</div>
                </div>
            </div>
          
            <div class="card elevation-2 bg-info">
                <div class="iconBx">
                    <ion-icon name="person-add" class="text-light"></ion-icon>
                </div>
                <div>
                    <div class="cardName text-light" >Adviser</div>      
                    <div class="numbers text-light" ><span>{{$user}}</span></div>
                </div>
            </div>              
          </div>
           
          <div class="row d-flex justify-content-between" style="position:relative; top:2px;">
            <div class="column">
              <h2 style="color: dimgray; font-size:20px; ">List of Events</h2>
              <div class="card text-center" style="width: 445px; margin:auto;">
                <h3 style="color: dimgray; font-size: 20px;">


                   


                    <div class="nav-item" style="position:relative; top:-30px; margin:auto; width: 230px;">
                        <a href="{{ route('calendar') }}"
                           class="nav-link {{ Request::is('calendar') ? '' : '' }}">
                            <span class="input-group-text fas fa-calendar-alt bg-info "><span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">&nbsp;Open Events Calendar</span> </span>
                            
                        </a>
                    </div>
                    <img src="/images/image17.png" class="user-image img-circle elevation-2" alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                    School Events
                    
                </h3>

                <form action="{{url('send-event/')}}" method="POST" accept-charset="UTF-8">
                    @csrf
                   <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-dark bg-secondary" style="text-align: center">Event Title</th>
                                <th class="text-dark bg-secondary" style="text-align: center">Date</th>
                                <th class="text-dark bg-secondary" style="text-align:center">Time</th>
                                <th class="text-dark bg-secondary" style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $sched)
                            <tr class="text-dark">
                                 
                                <td>{{$sched->title}}</td>
                                <td>{{$sched->start}}</td>
                                <td>-</td>
                                <td><a href="{{url('event-delete/'.$sched->id)}}" class="btn btn-danger btn-xs "><i class="fas fa-trash"></i></a></td>
                               
        
                            </tr>
                            @endforeach
                            
                        </tbody>
                   </table>
               
                <button type="submit" class="btn btn-sm input-group-center bg-success mb-1 ">Send to all</button>
                </form>
            </div>
        </div>
          
            <div class="column">
                    <div class="card d-flex justify-content-end" style="width: 450px; padding:3px;">
                      
                            <h2 style="color: dimgray; font-size:16px;" class="d-flex justify-content-between " >ALL SENIOR HIGH SCHOOL SECTIONS
                               </h2> {{$section->onEachSide(1)->links()}}
        
                            <div class="card-body">
                            <div class="search" style="margin-top:-20px; margin-bottom:10px;">
                                <div class="mx-auto pull-left">
                                <form action="{{route('home')}}" method="GET" role="search">
                
                                    <div class="input-group">
                                        <span class="input-group-btn mr-2 mt-0">
                                            <button class="btn btn-info" type="submit" title="Search Sections">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        <input type="text" class="form-control mr-2" name="section" placeholder="Search Sections" id="section">
                                        <a href="{{route('home')}}" class=" mt-0">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button" title="Refresh page">
                                                    <span class="fas fa-sync-alt"></span>
                                                </button>
                                            </span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
        

                             
                            <table class="table table-sm table-hover text-dark rounded elevation-2 text-center">
                                <thead>
                                  <tr>
                                    <th scope="col" class="bg-secondary">Action</th>
                                    <th scope="col" class="bg-secondary">Sections</th>
                                    <th scope="col" class="bg-secondary">Number of Students</th>
                                    <th scope="col" class="bg-secondary">Section Adviser</th>
                                   
                                    
                                  </tr>
                                </thead>
                                <tbody>
        
                                  @foreach ($section as $sections)
                                  <tr class="text-center">
                                    <td><button class="btn btn-sm bg-success" style="font-size:11px; border-radius:30px;">View</button></td>
                                    <td>{{$sections->advisory}}</td>
                                    <td>50</td>
                                    <td>{{$sections->name}}</td>
                                  </tr>
                                      
                                  @endforeach
                                  
                                  
                                </tbody>
                              </table>
                             
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
        </div> 
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        </body>
        </html>




<style scoped>

    .cardBox{
        position: relative;
        width: 100%;
        color: black;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(4, 1fr); 
        grid-gap: 25px;
    }
    .cardBox .card{
        position: relative;
      
        padding: 10px;
        border-radius: 15px;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        box-shadow:  0 7px 25px rgba(0, 0, 0, 0.08);  
    }

    .cardBox .card .numbers{
        position: relative;
        font-weight: 700;
        font-size: 1.5em;
        color: #39C0ED;
    }

    .cardBox .card .cardName{
        color: #262626;
        font-size: 1.0em;
        margin-top: 5px;

    }

    .cardBox .card .iconBx{
        font-size: 2.5em;
        color: dimgray;
        
    }

    .cardBox .card:hover{
        background-color:#17a2b8;
    }

    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardName,
    .cardBox .card:hover .iconBx {
        color: white;
    }


 
    * {
      box-sizing: border-box;
    }
    
   
    .column {
      float: left;
      width: 25%;
      padding: 0 10px;
    }
    
    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    

    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }
    

        /* .card {
        
        padding: 1px;
        text-align: center;
        background-color: #f1f1f1;
        } */
</style>
@endsection
