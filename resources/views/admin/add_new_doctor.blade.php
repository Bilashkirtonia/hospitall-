<x-app-layout>
</x-app-layout>
@include('admin.header')    
@include('admin.sidebar')
@include('admin.nav')

<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert">X</button>
    </div>
    @endif

  <div class="row">
    <div class="row">
       <div class="col">
           <form action="{{url('add_doctor')}}" method="post" enctype="multipart/form-data">
              @csrf
           <div class="card bg-success mt-5 p-4 text-white">
                <div class="row">
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor name</label>
                            <input type="text" required name="Doctor_name" id="form1" class="text-white form-control"> 
                        </div>
                   </div>
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor number</label>
                            <input type="text" required name="Doctor_number" id="form1" class="text-white form-control text-white"> 
                        </div>
                   </div>
                   
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor Room no</label>
                            <input type="text" required name="Doctor_room" id="form1" class="text-white form-control"> 
                        </div>
                   </div>
                   <div class="col-lg-6">  
                   <label for="form1">Doctor Speciality</label>                    
                        <div class="md-form">  
                          <select name="specility" required class="browser-default custom-select text-dark">
                            <option class="text-dark">Open this select menu</option>
                            <option class="text-dark" value="skin">skin</option>
                            <option class="text-dark" value="eye">eye</option>
                            <option class="text-dark" value="heart">heart</option>
                            <option class="text-dark" value="nose">nose</option>
                            <option class="text-dark" value="born">born</option>
                          </select>
                        </div>
                   </div>
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor image</label>
                            <input type="file" name="image" id="form1" required class="text-white form-control"> 
                        </div>
                   </div>
                   
                   <div class="col-lg-12">                      
                        <div class="md-form">
                            <input type="submit" value="Doctor_name" id="form1" class=" btn bg-primary btn-danger form-control"> 
                        </div>
                   </div>
                </div>
               </div>
           </form>     
       </div>
    </div>


    <div class="col">
        <div class="row">
           <div class="col">
                <div class="card mt-5 bg-info text-dark">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                        Editable table
                    </h3>
                    <div class="card-body">
                        <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                            <tr>
                                <th class="text-center">Doctor Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Room</th>
                                <th class="text-center">Specility</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                    @foreach($data as $data)
                            <tr>
                                <td class="pt-3-half" contenteditable="true">{{$data->name}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->phone}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->room}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->specility}}</td>
                                <td class="pt-3-half" contenteditable="true">
                                    <img class="text-center" src="doctorimage/{{$data->image}}" alt="">
                                </td>
                                <td>
                                <span class="table-remove"
                                    ><a href="{{url('update_doctor',$data->id)}}">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Update
                                    </button>
                                    </a>
                                </span
                                >
                                </td>
                                <td>
                                <span class="table-remove"
                                    ><a href="{{url('delect_doctor',$data->id)}}">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Remove
                                    </button>
                                    </a>
                                </span
                                >
                                </td>
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
</div>













@include('admin.footer')
      