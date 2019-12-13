<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @if (Auth::user()->role_id == '1')
        <title>Dukia</title>             
        @endif
        @if (Auth::user()->role_id == '2')
        <title>COO Admin</title>             
        @endif
        @if (Auth::user()->role_id == '3')
        <title>CFO</title>             
        @endif
        @if (Auth::user()->role_id == '4')
        <title>Operator</title>             
        @endif
        @if (Auth::user()->role_id == '5')
        <title>Vault</title>             
        @endif
        @if (Auth::user()->role_id == '6')
        <title>payer</title>             
        @endif
        @if (Auth::user()->role_id == '7')
        <title>Logistics</title>             
        @endif
        @if (Auth::user()->role_id == '8')
        <title>Processing</title>             
        @endif
        @if (Auth::user()->role_id == '9')
        <title>Equipment</title>             
        @endif  
        @if (Auth::user()->role_id == '11')
        <title>Loan Admin</title>             
        @endif        
        @if (Auth::user()->role_id == '10')
        <title>Lab Admin</title>             
        @endif
        
        @include('layouts.head')
  </head>
<body>
  @include('layouts.header')
    <div class="wrapper">
      @yield('content')
    </div>
    @include('layouts.footer')    
    @include('layouts.footer-script')    
    </body>
</html>