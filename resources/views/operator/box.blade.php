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
                            <h4 class="page-title">Box</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>                                
                                <li class="breadcrumb-item active">Box Tables</li>
                            </ol>
@endsection

@section('content')

            <div class="container-fluid">

                    <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-barcode-scan float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Box ID</h6>
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
                                            <i class="mdi mdi-barcode float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Active</h6>
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
                                            <i class="mdi mdi-blur-off float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Used</h6>
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
                                            <i class="mdi mdi-close-box float-right"></i>
                                        </div>
                                        <div class="text-white">
                                            <h6 class="text-uppercase mb-3">Total Trash</h6>
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

                                <h4 class="mt-0 header-title">Box Centers Table</h4>
                                <p class="text-muted m-b-30 font-14">The above tabe shows the table data of all Boxes.
                                </p>
                                <button type="button" class="btn btn-primary float-right waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><a style="color:beige;" >Add Admin</a></button><br><br>

                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="mySmallModalLabel">Generate New Box</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="mt-0 header-title">Set Up Box</h4>
                                <p class="text-muted m-b-30 font-14">These inputs are required to set up a new box for each location Location.</p>

                                <form class="" method="POST" action="/add-box">
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">
                                                                               
                                       
                                         @foreach ($admi as $a)
                                        @if ( Auth::user()->location_id == $a -> id)
                                        
                                        <label>Buyer Location</label> 
                                        <input type="text" disabled class="form-control" value="{{$a -> location_name}}"
                                        parsley-type="text" placeholder="Enter a valid Name"/>
                                            <input type="hidden" value="{{Auth::user()->location_id}}" name="location_id">

                                            <label>UserName </label> 
                                            <input type="text" class="form-control" value="" name="user_id"
                                            parsley-type="text" placeholder="Enter a valid Name"/>

                                            <label>Box Description</label> 
                                        <textarea type="text" class="form-control" name="location_name"
                                        parsley-type="text" placeholder="Enter a valid Name">This Box ID belogs to {{$a -> location_name}}</textarea>
                                        @endif
                                        @endforeach                                         
                                    </div>                                                
                                    
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Generate ID
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal" aria-hidden="true">
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
                                            <th>Box Name</th>                                         
                                            <th>Box ID</th>
                                            <th>Box Description</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>                                                                               
                                        </tr>
                                        </thead>
                                        <tbody>
                                                
                                                @foreach ($data as $d)
                                        <tr>
                                        @if ($d->location_id == Auth::user()->location_id)
                                            
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->user_id}}</td>
                                        <td style="font-size:15px;"><i class="mdi mdi-checkbox-blank-circle text-success"></i> {{$d-> box_id}}</td>
                                        <td>{{$d->description}}</td>
                                        <td>{{$d->location_name}}</td>                                                                             
                                        @if ($d->status == "active")
                                        <td><span class="badge badge-pill badge-success">{{$d->status}}</span></td>                                     
                                        @endif
                                        @if ($d->status == "used")
                                        <td><span class="badge badge-pill badge-danger">{{$d->status}}</span></td>
                                        @endif
                                        @if ($d->status == "trash")
                                        <td><span class="badge badge-pill badge-primary">{{$d->status}}</span></td>
                                        @endif
                                        <td>{{$d->created_at}}</td>  
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-update-{{$d->id}}"> <a style="color:beige;"><i class="fas fa-print"></i></a></button>
                                            <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-edit-{{$d->id}}"> <a style="color:beige;"><i class="fas fa-user-edit"></i></a></button> 
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
                                                        @if ($d->status == "active")
                                                        <h3>Box Name:</h3>
                                                        <div style="font-size:20px;">{{$d->user_id}}</div>
                                                        <div>{!!DNS2D::getBarcodeHTML($d->box_id, 'QRCODE')!!}</div><br>
                                                        <p>{{$d->description}}</p>
                                                        @else
                                                        <p>Invalid.</p>
                                                        @endif                                                            

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light"><a style="color:beige;" href="{{ route('printBox', $d->id)}}"><i class="fas fa-user-alt-slash"></i>Continue</a></button>
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
                                                                <p>You are about to delete the Box location account.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light"><a style="color:beige;" href="{{ route('deleteBox', $d->id)}}"><i class="fas fa-user-alt-slash"></i>Delete</a></button>
                                                            </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <div class="modal fade bs-example-modal-edit-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Center modal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="" method="POST" action="/edit-box">
                                                                {{ csrf_field() }}
                                                                
                                                                <div class="form-group">
                                                                        <label>Box Id</label>
                                                                        <div>
                                                                            <input type="text" class="form-control" disabled value="{{$d-> box_id}}"/>
                                                                        <input type="hidden" value="{{$d->id}}" name="id">
                                                                        <input type="hidden" name="box_id" value="{{$d-> box_id}}">
                                                                        <input type="hidden" value="{{Auth::user()->location_id}}" name="location_id">
                                                                        </div>
                                                                    </div>  
                            
                                                                    <div class="form-group">
                                                                        <label>Box Description</label>
                                                                        <div>
                                                                            <textarea type="text" class="form-control" required name="box_info" placeholder="Enter box description">{{$d->description}}</textarea>
                                                                        </div>
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

        {{-- <body onload="display()">
                <script>
                   function display() {
                      window.print();
                   }
          </script> --}}
          
          {{-- <script>
             function display() {
                window.print();
             }
             </script> --}}
@endsection