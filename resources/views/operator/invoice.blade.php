@extends('layouts.master')

@section('breadcrumb')
                            <h4 class="page-title">Invoice</h4>
                            <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('transaction')}}">Transaction</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
@endsection

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title">
                                            <h4 class="float-right font-16"><strong>Order #  {{$invoice[0]->id}}</strong></h4>
                                            <h3 class="mt-0">
                                                <img src="{{url('/')}}/assets/images/logo.png" alt="logo" height="24"/>
                                            </h3>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <address>
                                                    <strong>Paymet To:</strong><br>
                                                    {{$data[0]->first_name}} {{$data[0]->last_name}}<br>
                                                    ID:{{$data[0]->user_id}}<br>
                                                    {{$data[0]->email}}<br>
                                                    {{$data[0]->phoneno}}<br>
                                                    {{$data[0]->address}}
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <address>
                                                    <strong>Buyer Location:</strong><br>
                                                    {{Auth::user()->name}}<br>
                                                    {{$location[0]->location_name}}br>
                                                   {{$location[0]->location_address}}<br>
                                                {{-- @if (Auth::user()->location_id == $location[0]->id ) --}}
                                                        {{$location[0]->address}}
                                                {{-- @endif     --}}
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 m-t-30">
                                                <address>
                                                    <strong>Payment Method:</strong><br>
                                                    Via Bank Trasfer<br>
                                                    {{$data[0]->bank_name}}
                                                     **********<br>
                                                    {{$data[0]->email}}
                                                </address>
                                            </div>
                                            <div class="col-6 m-t-30 text-right">
                                                <address>
                                                    <strong>Transaction Information:</strong><br>
                                                    {{$data[0]->transaction_id}}<br>
                                                   {{$data[0]->t_date}}<br>
                                                   {{$data[0]-> t_time}}<br><br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2">
                                                <h3 class="font-20"><strong>Order summary</strong></h3>
                                            </div>
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td><strong>Box ID</strong></td>
                                                            <td class="text-center"><strong>Karat</strong></td>
                                                            <td class="text-center"><strong>Value</strong>
                                                            </td>
                                                            <td class="text-right"><strong>Totals</strong></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        <tr>
                                                                <td>{{$data[0]->box_id}}</td>
                                                                <td class="text-center">{{$data[0]->karate}}</td>
                                                                <td class="text-center">{{$data[0]->xrf_value}}</td>
                                                                <td class="text-right">{{$data[0]->cost}}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Total</strong></td>
                                                            <td class="no-line text-right"><h4 class="m-0">N{{$data[0]-> cost}}</h4></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>                                                
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row --> 
                                
                                <div class="row">
                                        <div class="col-12">
                                            <div>
                                                    <address>
                                                            <strong>Acknowledgement:</strong><br>
                                                            I here by agree to sell my gold sample described above at the price stated on the invoice.<br>
                                                            I agree to transfer all my rights and priviledges to Dukia Precious Metals with this agreement. <br>                                                          
                                                        </address>
                                            </div>
                                        </div>
                                </div>

                                <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="{{ route('userApproved', $data[0]->id)}}" class="btn btn-secondary waves-effect waves-light">Checkout</a>
                                            <a href="{{route('transaction')}}" class="btn btn-primary waves-effect waves-light">Cancle</a>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- end container-fluid -->
@endsection