</div>
@section('js')
   <!-- container-scroller -->
   <!-- plugins:js -->
   <script type="text/javascript" src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/lodash/dist/lodash.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/footable/js/footable.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/daterangepicker/moment.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/daterangepicker/daterangepicker.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/datatable/datatables.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/datatable/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('vendors/datatable/Responsive-2.2.2/js/responsive.bootstrap4.min.js')}}"></script>
   <!-- endinject -->
   <!-- Plugin js for this page-->
   <!-- End plugin js for this page-->
   <!-- inject:js -->
   <script type="text/javascript" src="{{asset('js/off-canvas.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/misc.js')}}"></script>
   <!-- endinject -->
   <!-- Custom js for this page-->
   <script type="text/javascript" src="{{asset('js/jquery.inputmask.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.form.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/form-validation.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/numeral.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
   <!-- End custom js for this page-->
   <script type="text/javascript">
      $(document).ready(function(){
         if($('input.currency-mask').length > 0){
            $('input.currency-mask').each(function(){
                  $(this).inputmask({
                     "alias": "decimal",
                     "digits": 0,
                     "autoGroup": true,
                     "allowMinus": false,
                     "rightAlign": false,
                     "groupSeparator": ".", // <-- this is &puncsp;
                     "radixPoint": "."
                  });
            });
         }

         $('.menu-bar').click(function(){
            $('.page-body-wrapper #sidebar').toggleClass('close');
            $('.page-body-wrapper .main-panel').toggleClass('show');
            $('.navbar-brand-wrapper').toggleClass('close');
            $('.navbar-menu-wrapper').toggleClass('show');
            return false;
         });
      });
   </script>
   <style type="text/css">
      .hidden{display: none;}
      .sidebar.close{width: 0;}
      .navbar-brand-wrapper.close{width: 63px !important;}
      .navbar-brand-wrapper.close .brand-logo{display: none !important;}
      .navbar-brand-wrapper.close .brand-logo-mini{display: block !important;}
      .navbar-menu-wrapper.show{width: calc(100% - 63px) !important; }
      .navbar-brand-wrapper .brand-logo-mini img{width: 28px !important;}
      .main-panel.show{width: 100%;}
      table.dataTable{width: 100% !important;}
   </style>
@show
@section('js_add')
@show
</body>
</html>