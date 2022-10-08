@extends('layouts.layoutsidebar')

@section('content')
    
<div class="row d-flex justify-content-center text-dark">
    <div class="col-md-8 elevation-2 rounded bg-light" style="position:relative; top: 10px;">
        @if (session('status'))
         <h6 class="alert alert-success">
           {{session('status')}}
         </h6>
    @endif
        <div class="card-header elevation-1">
        <h1 style="position: absolute; left:32%; color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; color:dimgray;">Edit Student : {{$hopeStudents->firstname}} {{$hopeStudents->lastname}}</h1>
        <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image" style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
    </div>
        <form action="{{url('update-hope-student/'.$hopeStudents->id)}}" method="POST" accept-charset="UTF-8" >
            @csrf
            @method('PUT')
               
    <div class="input-group mb-3 mt-4">
       <label for="" style="color:dimgray;"><span class=" input-group-text bg-secondary" style="width: 43px;">Ln</span></label>
       <input type="text" name="lastname"  class="form-control" value="{{$hopeStudents->lastname}}" required>
    </div>

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Fn</span></label>
       <input type="text" name="firstname"  class="form-control" value="{{$hopeStudents->firstname}}" required>
       </div>

    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Mn</span></label>
       <input type="text" name="middlename"  class="form-control" value="{{$hopeStudents->middlename}}" required>
       </div>

       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Y/S</span></label>
       <input type="text" name="year_section"  class="form-control" value="{{$hopeStudents->year_section}}" required>
       </div>

       <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class="fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
        <input type="email" name="email" class="form-control" value="{{$hopeStudents->email}}" required>
    </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class="input-group-text bg-secondary" style="width: 43px;">Pn</span></label>
        <input type="text" name="parent_name"  class="form-control" value="{{$hopeStudents->parent_name}}" required>
        </div>
    
    <div class="input-group mb-3">
       <label for="" style="color:dimgray;"><span class=" fas fa-envelope input-group-text bg-secondary" style="width: 43px;"></span></label>
       <input type="email" name="parent_email"  class="form-control" value="{{$hopeStudents->parent_email}}">
       </div>

    <div class="input-group mb-3">
        <label for="" style="color:dimgray;"><span class=" input-group-text bg-secondary" style="width: 43px;">Ad</span></label>
        <input type="text" name="address"  class="form-control" value="{{$hopeStudents->address}}" required>
        </div>

        <div class="mx-auto" style="width: 200px;">
            <select name="gender" class="form-control" required>
                <option hidden="true"></option>
                <option selected disabled>Select Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
               </select>
            </div> <hr>
                <div class="form-group mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Save Changes</button>

                </div>
           </form>
    </div>
</div>


@endsection