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
       <div class="col-5">
           <form action="{{url('send_email',$data->id)}}" method="post">
              @csrf
           <div class="card bg-success mt-5 p-4 text-white">
                <div class="row">
                   <div class="col-lg-12">                      
                        <div class="md-form">
                            <label for="form1">Greeting</label>
                            <input type="text" required name="greeting"  id="form1" class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   <div class="col-lg-12">                      
                        <div class="md-form">
                            <label for="form1">Body</label>
                            <input type="text" required name="body"  id="form1" class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   
                   <div class="col-lg-12 mb-2">                      
                        <div class="md-form">
                            <label for="form1">Action text</label>
                            <input type="text" required name="action_text" id="form1"  class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   <div class="col-lg-12 mb-2">                      
                        <div class="md-form">
                            <label for="form1">Action url</label>
                            <input type="text" required name="action_url" id="form1"  class="text-dark form-control bg-light"> 
                        </div>
                   </div>
                   <div class="col-lg-12 mb-2">                     
                        <div class="md-form">
                            <label for="form1">End part</label>
                            <input type="text" required name="end_part" id="form1"  class="text-dark form-control bg-light"> 
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














@include('admin.footer')
      
      