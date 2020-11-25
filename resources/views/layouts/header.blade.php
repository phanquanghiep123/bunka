<!DOCTYPE html>
   <html lang="{{ app()->getLocale() }}">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>BUNKA - Hệ thống bán hàng</title>
      <!-- plugins:css -->
      @section('css')
      <link rel="stylesheet" href="{{asset('/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('/vendors/css/vendor.bundle.base.css')}}">
      <link rel="stylesheet" href="{{asset('/vendors/css/vendor.bundle.addons.css')}}">
      <link rel="stylesheet" href="{{asset('/vendors/daterangepicker/daterangepicker.css')}}">
      <link rel="stylesheet" href="{{asset('vendors/datatable/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('/vendors/datatable/Responsive-2.2.2/css/responsive.bootstrap4.min.css')}}">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{asset('/images/favicon.png')}}" />
      @show
      @section('css_add')
      @show
      <script type="text/javascript">
         var _LANGS = {!!json_encode($_SCRIP_LANGS)!!};
         var _ValiDateMessege = {!!json_encode($_ValiDateMessege)!!}; 
      </script>
   </head>
   <body>

      <div class="container-scroller">
         @hook('ReplaceLanguage', true)
            @include("layouts.includes.header-bar")
         @endhook
         <div class="container-fluid page-body-wrapper">
            @hook('ReplaceLanguage', true)
               @include("layouts.includes.header-menu")
            @endhook
