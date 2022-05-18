<x-app-layout>
</x-app-layout>
@include('admin.header') 
  
@include('admin.sidebar')

@include('admin.nav')

<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        <p>{{session()->get('message')}}</p>
        <button type="button" class="close" data-dismiss="alert">X</button>
    </div>
    @endif

  <div class="row">
    <div class="row">
       <div class="col">
           <form action="{{url('edit_update_doctor',$data->id)}}" method="post" enctype="multipart/form-data">
              @csrf
           <div class="card bg-success mt-5 p-4 text-white">
                <div class="row">
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor name</label>
                            <input type="text" required name="Doctor_name" value="{{$data->name}}" id="form1" class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor number</label>
                            <input type="text" required name="Doctor_number" value="{{$data->phone}}" id="form1" class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   
                   <div class="col-lg-6">                      
                        <div class="md-form">
                            <label for="form1">Doctor Room no</label>
                            <input type="text" required name="Doctor_room" id="form1" value="{{$data->room}}" class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   <div class="col-lg-6">  
                   <label for="form1">Doctor Speciality</label>                    
                        <div class="md-form">  
                          <select name="specility" required class="browser-default custom-select text-dark bg-light">
                            <option class="text-dark">{{$data->specility}}</option>
                            <option class="text-dark" value="skin">skin</option>
                            <option class="text-dark" value="eye">eye</option>
                            <option class="text-dark" value="heart">heart</option>
                            <option class="text-dark" value="nose">nose</option>
                            <option class="text-dark" value="born">born</option>
                          </select>
                        </div>
                   </div>
                   <div class="col-lg-6 mb-2">                      
                        <div class="md-form">
                            <label for="form1">Doctor image</label>
                            <img width='300' height='400' src="doctorimage/{{$data->image}}" alt="">
                        </div>
                   </div>
                   <div class="col-lg-6 mb-2">                      
                        <div class="md-form">
                            <label for="form1">Doctor image</label>
                            <input type="file" name="image" id="form1"  class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   
                   <div class="col-lg-12">                      
                        <div class="md-form">
                            <input type="submit" value="Update_name" id="form1" class=" btn bg-primary btn-danger form-control"> 
                        </div>
                   </div>
                </div>
               </div>
           </form>     
       </div>
    </div>


    
</div>
</div>













@include('admin.footer')
      