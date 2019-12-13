
{{-- 
@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection --}}


<body onload="display()">
    <div class="container center">
            <div>{!!DNS2D::getBarcodeHTML($data[0]->box_id, 'QRCODE')!!}</div>
    </div>
   
        <script>
           function display() {
              window.print();
           }
  </script> 

</body>



