@extends('layouts.layoutsidebar')

@section('content')
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="search" style="position:relative; top: 5px;">
        <div class="mx-auto" style="width:400px;">
            <form action="{{ route('faith-list') }}" method="GET" role="search">

                <div class="input-group">
                    <span class="input-group-btn mr-2 mt-0">
                        <button class="btn btn-info" type="submit" title="Search Name">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="faith" placeholder="Search Name" id="faith">
                    <a href="{{ route('faith-list') }}" class=" mt-0">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt"></span>
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>

        <a href="{{ url('/add-faith-student') }}" class="btn btn-primary ml-2" style="margin-top: 10px;"><span
                class="fas fa-user-graduate mr-1"></span>
            Add New Student
        </a>

        <div class="container col-md-12 " style="position: relative; margin-top:1%;">

            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="card-header" style="height: 60px;">
                            <h4
                                style="position: absolute; left:38%; color: dimgray; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                Grade 11 - Faith Students</h4>

                            <img src="/images/image17.png" class="user-image img-circle elevation-2 " alt="User Image"
                                style="width: 40px; height:40px; border-radius: 50%; background-color: #5bc0de; padding-left: 2px; padding-right:2px; padding-bottom:2px; padding-top: 2px;">
                        </div>



                        <div class="card-body">
                            <div class="" style="position: relative; top:-20px;">
                                <a class="btn btn-danger mt-2 ml-2" style=""
                                    href="{{ route('export_faithStudents_pdf') }}"><span class="fas fa-file-pdf"
                                        style="font-size: 15px;"></span> Generate PDF</a>
                                <a href="/export_faithStudents_excel" class=" mt-2 ml-4 btn btn-success"><span
                                        class="fas fa-file-excel" style="font-size: 15px;"></span> Export to Excel</a>

                                <div class="d-flex justify-content-end">
                                    <p class="text-dark">Number of students : {{ $faith }}</p>
                                </div>


                            </div>


                            <form action="/multiple-delete" method="POST">
                                @csrf

                                <table class="table table-hover bg-light table-sm elevation-2"
                                    style="margin:auto; position:relative; top: -20px;">
                                    <thead class="bg-info rounded text-center">
                                        <tr>
                                            <th scope="col">Records</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Middle Name</th>
                                            <th scope="col"
                                                class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                style="text-align: center">Year/Section</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col"
                                                class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                style="text-align: center">Email</th>
                                            <th scope="col"
                                                class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                style="text-align: center">Address</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($faithStudents as $faith)
                                            <tr class="text-center">

                                                <td><a href="{{ url('show-student-faith/' . $faith->id) }}"
                                                        class="btn btn-success btn-sm "><span
                                                            class="fas fa-mail-bulk"></span></a></td>
                                                <td>{{ $faith->lastname }}</td>
                                                <td>{{ $faith->firstname }}</td>
                                                <td>{{ $faith->middlename }}</td>
                                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                    style="text-align: center">{{ $faith->year_section }}</td>
                                                <td>{{ $faith->gender }}</td>
                                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                    style="text-align: center">{{ $faith->email }}</td>
                                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                    style="text-align: center">{{ $faith->address }}</td>
                                                <td><a href="{{ url('edit-faith-student/' . $faith->id) }}"
                                                        class="btn btn-warning btn-xs "><i
                                                            class="fas fa-user-edit text-dark"></i></a></td>
                                                <td><input type="checkbox" name="ids[]" value="{{ $faith->id }}"></td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-dark"><span
                                                        class="fas fa-exclamation-circle text-danger"></span> No Grade 11 -
                                                    Faith students found!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-2">
                                    <button type="submit" class="btn btn-sm btn-danger" value="Delete Students">Delete
                                        Students</button>
                                </div>
                            </form>
                            <div class="div d-flex justify-content-center">
                                {{ $faithStudents->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
