@extends('layouts.layoutsidebar')

@section('content')
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row d-flex justify-content-center text-dark">
        <div class="col-md-11 elevation-4 p-3 rounded  mt-5 bg-light mb-3">

            <div class="container mx-auto">

                <h1 class="text-center mt-4"
                    style=" color:whitesmoke; margin:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 22px; color:rgba(60, 58, 58, 0.904);">
                    Pangangan National High School </h1>
                <p class="text-center" style="font-weight:bold; font-size: 20px; color:rgba(60, 58, 58, 0.904);">Guidance
                    Office</p>
                <p class="text-center text-dark" style="position: relative; top: -15px;">Talisay, Calape, Bohol</p>


                <p class="text-center text-dark" style="font-size: 18px; font-weight: 500; color:rgba(60, 58, 58, 0.904); ">
                    Anecdotal Record</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group mt-5">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Observation Date and Time: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_wisd->observation_date_time }}</span>
                            </p>
                        </div>



                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Student Name: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_wisd->student->firstname }}
                                    {{ $student_wisd->student->middlename }} {{ $student_wisd->student->lastname }} </span>
                            </p>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group mt-5">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Observer/Class Adviser: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_wisd->student->user->name }}</span>
                            </p>
                        </div>

                        <div class="form-group mt-3">
                            <p class="text-dark"
                                style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 17px;">
                                <span class="text-dark" style="font-weight: 500">Year/Section: </span><span
                                    class="text-dark"
                                    style="border-bottom: 1px solid black">{{ $student_wisd->student->year_section }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3 mt-2">
                        <div class=" p-2 bg-light" style="border: 1px solid dimgray;">

                            <label for="" style="color:dimgray;">Description of Incident</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="description_of_incident">{{ $student_wisd->description_of_incident }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Description of Location/Setting</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="location_of_incidents">{{ $student_wisd->location_of_incidents }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Action Taken</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="actions_taken">{{ $student_wisd->actions_taken }}</textarea>
                            <br>
                            <label for="" style="color:dimgray;">Recommendation</label>
                            <textarea style="border: solid 1px dimgray; height: 150px;" id="" type="text" class="form-control"
                                placeholder="" title="" name="recommendations">{{ $student_wisd->recommendations }}</textarea>
                            <p class="text-dark mt-2">Note: <i class="text-dark">Information revealed is held strictly
                                    CONFIDENTIAL.</i></p>
                            <br>
                            <p class="text-dark d-flex justify-content-end">______________________________________________
                            </p>
                            <p class="text-dark d-flex justify-content-end" style="position: relative; top: -20px;">
                                Designated Guidance Counselor's Name and Signature</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection