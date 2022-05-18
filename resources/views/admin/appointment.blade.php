<x-app-layout>
</x-app-layout>
@include('admin.header') 
  
@include('admin.sidebar')

@include('admin.nav')

<div class="col-12">
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
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Doctor</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Approve</th>
                                <th class="text-center">Cancel</th>
                                <th class="text-center">Remove</th>
                                <th class="text-center">Send mail</th>
                            </tr>
                            </thead>
                            <tbody>
                    @foreach($data as $data)
                            <tr>
                                <td class="pt-3-half" contenteditable="true">{{$data->name}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->email}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->phone}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->doctor}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->date}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->message}}</td>
                                <td class="pt-3-half" contenteditable="true">{{$data->status}}</td>
                                
                                <td>
                                <span class="table-remove"
                                    ><a href="{{url('approve',$data->id)}}">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Approve
                                    </button>
                                    </a>
                                </span
                                >
                                </td>
                                <td>
                                <span class="table-remove"
                                    ><a href="{{url('cancel',$data->id)}}">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Cancel
                                    </button>
                                    </a>
                                </span
                                >
                                </td>
                                <td>
                                <span class="table-remove"
                                    ><a href="{{url('remove_appointment',$data->id)}}">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Remove
                                    </button>
                                    </a>
                                </span
                                >
                                </td>
                                <td>
                                <span class="table-remove"
                                    ><a href="{{url('email',$data->id)}}">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                                    Send mail
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











@include('admin.footer')
      