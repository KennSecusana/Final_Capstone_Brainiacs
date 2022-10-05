@extends('layouts.layoutsidebar')

@section('content')
    
 
@if (session('status'))
<h6 class="alert alert-success">
  {{session('status')}}
</h6>
@endif

<div class="search" style="position:relative; top: 5px;" >
  <div class="mx-auto" style="width:400px;">
  <form action="{{route('wisdom-list')}}" method="GET" role="search">

      <div class="input-group">
          <span class="input-group-btn mr-2 mt-0">
              <button class="btn btn-info" type="submit" title="Search Full Name">
                  <span class="fas fa-search"></span>
              </button>
          </span>
          <input type="text" class="form-control mr-2" name="wisdom" placeholder="Search Full Name" id="wisdom">
          <a href="{{route('wisdom-list')}}" class=" mt-0">
              <span class="input-group-btn">
                  <button class="btn btn-danger" type="button" title="Refresh page">
                      <span class="fas fa-sync-alt"></span>
                  </button>
              </span>
          </a>
      </div>
  </form>
</div>


<div class="container">
    <div class="row">
        <a href="{{url('/add-wisdom-student')}}" class="btn btn-primary ml-2 "><span class="fas fa-user-graduate mr-1"></span>
            Add New Student
        </a> 
     <div class="container " style="position: relative; margin-top:1%;">
       
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark">
                    <div class="card-header elevation-2" style="height: 60px;">
                        <h4 style="position: absolute; left:38%; color:whitesmoke;">Grade 11 - Wisdom Students</h4>
                        
                      <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                     
                    </div>

              

                    <div class="card-body">
                        <div class="" style="position: relative; top:-20px;">
                           <a class="btn btn-danger mt-2 ml-2" style="" href="{{route('export_wisdomStudents_pdf')}}"><span class="fas fa-arrow-circle-down" style="font-size: 15px;"></span> Export PDF</a>
                            <a href="/export_wisdomStudents_excel" class=" mt-2 ml-4 btn btn-success"><span class="fas fa-arrow-circle-down" style="font-size: 15px;"></span> Export Excel</a>
                      
                            <div class="d-flex justify-content-end">
                                <p>Number of students : {{$wisdom}}</p>
                            </div>

                          
                            {{-- <div class="mx-auto" style="width: 200px;">
                                <select name="gender" class="form-control" required>
                                    <option hidden="true"></option>
                                    <option selected disabled>All</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                   </select>
                                </div> 
                             --}} 
                        </div>
                    
                      
                       <table class="table table-hover bg-light table-sm elevation-2" style="margin:auto; position:relative; top: -10px;">
                           <thead class="bg-info rounded text-center">
                               <tr>           
                                <th scope="col">View Records</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Year/Section</th>
                                <th scope="col">Gender</th>
                                <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
            
                               </tr>
                           </thead>

                           <tbody>
                            @forelse ($wisdomStudents as $wisdom)
                            <tr class="text-center">
                              
                              <td><a href="{{url('/students/show/'.$wisdom->id)}}" class="btn btn-success btn-sm ">View</a></td>
                              <td>{{$wisdom->lastname}}</td>
                              <td>{{$wisdom->firstname}}</td>
                              <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">{{$wisdom->year_section}}</td>
                              <td>{{$wisdom->gender}}</td>
                              <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">{{$wisdom->email}}</td>
                              <td>{{$wisdom->address}}</td>
                              <td><a href="{{url('edit-wisdom-student/' .$wisdom->id)}}" class="btn btn-warning btn-xs "><i class="fas fa-edit"></i></a></td>
                              <td><a href="{{url('delete-wisdom-student/'.$wisdom->id)}}" class="btn btn-danger btn-xs "><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                                
                            @empty
                            <tr>
                                <td colspan="5" class="text-dark"><span class="fas fa-exclamation-circle text-danger"></span> No Grade 11 - Wisdom students found!</td>
                            </tr>
                            @endforelse
          
                           </tbody>
                       </table>        
                    </div>
                </div>
                <div class="div d-flex justify-content-center mt-3">
                    {{$wisdomStudents->onEachSide(1)->links()}}
                  </div>
            </div>
          </div>
       </div>

    </div>
</div>

    
@endsection