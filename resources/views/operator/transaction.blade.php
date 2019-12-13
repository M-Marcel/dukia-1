@extends('layouts.master')

@section('css')
        <!-- DataTables -->
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ URL::asset('assets/plugins/ion-rangeslider/ion.rangeSlider.skinModern.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumb')
                            <h4 class="page-title">User Transaction</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>                                
                                <li class="breadcrumb-item active">Transaction Tables</li>
                            </ol>
@endsection

@section('content')
            <div class="container-fluid">

                    <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-cloud float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Transaction</h6>
                                            <h4 class="mb-4">{{$count1}}</h4>
                                            {{-- <span class="badge badge-info"> +11% </span> <span class="ml-2">From previous period</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-cloud-download float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Open</h6>
                                            <h4 class="mb-4">{{$count2}}</h4>
                                            {{-- <span class="badge badge-danger"> -29% </span> <span class="ml-2">From previous period</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-cloud-print float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Closed</h6>
                                            <h4 class="mb-4">{{$count3}}</h4>
                                            {{-- <span class="badge badge-warning"> 0% </span> <span class="ml-2">From previous period</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-close-circle float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Terminate</h6>
                                            <h4 class="mb-4">{{$count4}}</h4>
                                            {{-- <span class="badge badge-info"> +89% </span> <span class="ml-2">From previous period</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Transaction Table</h4>
                                <p class="text-muted m-b-30 font-14">The above tabe shows all the Users transaction datas.
                                </p>
                                {{-- <button type="button" class="btn btn-primary float-right waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><a style="color:beige;" >Add Admin</a></button><br><br> --}}

                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="mySmallModalLabel">Add New Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="mt-0 header-title">Set Up Buyer Center</h4>
                                <p class="text-muted m-b-30 font-14">These inputs are required to set up a new Buyer Location.</p>

                                <form class="" method="POST" action="/add-center">
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">
                                            <label>Location Name</label>
                                            <div>
                                                <input type="text" class="form-control" required name="name"  placeholder="Enter a Location Name"/>
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <label>Location Address</label>
                                            <div>
                                                <textarea type="text" class="form-control" required name="address" placeholder="Enter a Location Address">
                                                </textarea></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Location Contact</label>
                                            <div>
                                                <input type="text" class="form-control" required name="contact" placeholder="Enter a valid location Contact"/>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label>Location Email</label>
                                            <div>
                                                <input type="email" class="form-control" required name="email" placeholder="Enter a valid location email"/>
                                            </div>
                                        </div>   
                                       
                                        <div class="form-group">
                                            <label>Admin Role</label>                                        
                                                    <select class="custom-select" name="admin_id">
                                                        <option selected>Open this select menu</option>
                                                        @foreach ($admi as $a)
                                                        <option value="{{$a -> id}}">{{$a -> name}}</option>   
                                                        @endforeach                                                    
                                                    </select>                                                
                                        </div>                                       
                                    
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                   
                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Transaction ID</th>
                                            <th>User ID</th>                                                                                       
                                            <th>Box ID</th>                                            
                                            <th>Date/Time</th>
                                            <th>Status</th>
                                            <th>Action</th>                                                                               
                                        </tr>
                                        </thead>
                                        <tbody>
                                                
                                                @foreach ($data as $d)
                                        <tr>
                                                @if ( Auth::user()->location_id == $d -> location_id)

                                            <td>{{$d->id}}</td>
                                            @if ($d->status == 'open')
                                            <td><a href="{{ route('editTrans', $d->id)}}"><i class="mdi mdi-checkbox-blank-circle text-success"></i> {{$d->transaction_id}}</a></td>
                                            @endif
                                            @if ($d->status == 'cost' || $d->status == 'proceed')
                                            <td><a href="{{ route('editTrans', $d->id)}}"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> {{$d->transaction_id}}</a></td>
                                            @endif
                                            @if ($d->status == 'close')
                                            <td><a href="{{ route('editTrans', $d->id)}}"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> {{$d->transaction_id}}</a></td>
                                            @endif
                                            @if ($d->status == 'terminate')
                                            <td><a href="{{ route('editTrans', $d->id)}}"><i class="mdi mdi-checkbox-blank-circle text-danger"></i> {{$d->transaction_id}}</a></td> 
                                            @endif
                                            
                                            {{-- <td>{{$d->first_name}} {{$d->last_name}}</td> --}}
                                            <td>{{$d->user_id}}</td>
                                            <td>{{$d->box_id}}</td>  
                                            <td>{{$d->created_at}}</td>  
                                            
                                            @if ($d->status == 'open')
                                            <td><span class="badge badge-pill badge-success">{{$d->status}}</span></td>
                                            @endif
                                            @if ($d->status == 'cost' || $d->status == 'proceed')
                                            <td><span class="badge badge-pill badge-warning">{{$d->status}}</span></td>
                                            @endif
                                            @if ($d->status == 'close')
                                            <td><span class="badge badge-pill badge-primary">{{$d->status}}</span></td>
                                            @endif
                                            @if ($d->status == 'terminate')
                                            <td><span class="badge badge-pill badge-danger">{{$d->status}}</span></td> 
                                            @endif                                           
                                            <td>
                                                {{-- <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-update-{{$d->id}}"> <a style="color:beige;"><i class="fas fa-user-alt-slash"></i></a></button> --}}
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-edit-{{$d->id}}"> <a href="{{ route('editTrans', $d->id)}}" style="color:beige;"><i class="fas fa-user-edit"></i></a></button> 
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-delete-{{$d->id}}"> <a style="color:beige;"><i class="fas fa-user-times"></i></a></button>    
                                                
                                            </td>
                                            @endif
                                        </tr>
                                        
                                    <div class="modal fade bs-example-modal-update-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Center modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <p>You are about to change the buyer location status.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light"><a style="color:beige;" href="{{ route('updateTrans', $d->id)}}"><i class="fas fa-user-alt-slash"></i>Continue</a></button>
                                                            </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
    
                                        <div class="modal fade bs-example-modal-delete-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Center modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <p>You are about to delete the buyer location account.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light"><a style="color:beige;" href="{{ route('deleteTrans', $d->id)}}"><i class="fas fa-user-alt-slash"></i>Delete</a></button>
                                                            </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            {{-- <div class="modal fade bs-example-modal-edit-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Center modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="" method="POST" action="/edit-Center">
                                                                {{ csrf_field() }}
                                                                
                                                                <div class="form-group">
                                                                        <label>Location Name</label>
                                                                        <div>
                                                                            <input type="text" class="form-control" required name="name" value="{{$d-> location_name}}"  placeholder="Enter a Location Name"/>
                                                                        <input type="hidden" value="{{$d->id}}" name="id">
                                                                        </div>
                                                                    </div>  
                            
                                                                    <div class="form-group">
                                                                        <label>Location Address</label>
                                                                        <div>
                                                                            <textarea type="text" class="form-control" required name="address" placeholder="Enter a Location Address">{{$d->address}} </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Location Contact</label>
                                                                        <div>
                                                                            <input type="text" class="form-control" required name="contact" value="{{$d->contact_no}}" placeholder="Enter a valid location Contact"/>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <label>Location Email</label>
                                                                        <div>
                                                                            <input type="email" class="form-control" required name="email" value="{{$d->contact_email}}" placeholder="Enter a valid location email"/>
                                                                        </div>
                                                                    </div>   
                                                                   
                                                                    <div class="form-group">
                                                                        <label>Admin Role</label>                                        
                                                                                <select class="custom-select" name="admin_id">
                                                                                    <option selected>Open this select menu</option>
                                                                                    @foreach ($admi as $a)
                                                                                    <option value="{{$a -> id}}">{{$a -> name}}</option>   
                                                                                    @endforeach                                                    
                                                                                </select>                                                
                                                                    </div>                                       
                                                                
                                                                <div class="form-group">
                                                                    <div>
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                                            Submit
                                                                        </button>
                                                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                               
                                                            </form>
                                                                </div>                                                                
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal --> --}}
                                        @endforeach 
                                        </tbody>
                                </table>                               
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- end container-fluid -->
@endsection

@section('script')
        <!-- Required datatable js -->
        <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{ URL::asset('assets/pages/datatables.init.js')}}"></script>
@endsection