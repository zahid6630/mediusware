<!-- JAVASCRIPT -->
<script src="{{ url('/public/admin_panel_assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Buttons examples -->
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ url('/public/admin_panel_assets/js/pages/datatables.init.js') }}"></script>

<script src="{{ url('/public/admin_panel_assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ url('/public/admin_panel_assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<script src="{{ url('/public/admin_panel_assets/js/pages/form-advanced.init.js') }}"></script>    

<!-- echarts js -->
<script src="{{ url('/public/admin_panel_assets/libs/echarts/echarts.min.js') }}"></script>
<!-- echarts init -->
<script src="{{ url('/public/admin_panel_assets/js/pages/echarts.init.js') }}"></script>

<script src="{{ url('/public/admin_panel_assets/js/app.js') }}"></script>

<script src="{{ url('/public/admin_panel_assets/bootstrap-tags/bootstrap-tagsinput.js') }}"></script>

<script src="{{ url('/public/admin_panel_assets/sweetalert.js') }}"></script>
@include('sweetalert::sweetalert')

<script type="text/javascript">
    function alertMessage(type)
    {   
        if(type == 'success')
        {
            Swal.fire({
                icon: "success",
                title: "Success!!",
                color: '#198754',
                showConfirmButton: true,
                timer: 1500
            });
        }
        else if(type == 'unsuccess')
        {
            Swal.fire({
                icon: "error",
                title: "Unsuccess!!",
                color: '#dc3545',
                showConfirmButton: true
            });
        }
        else if(type == 'error')
        {
            Swal.fire({
                icon: "error",
                title: "Error!!",
                color: '#dc3545',
                showConfirmButton: true
            });
        }
        else if(type == 'permission')
        {
            Swal.fire({
                icon: "error",
                title: "You have not enough permission to do this operation !!",
                color: '#dc3545',
                showConfirmButton: true
            });
        }
        else if(type == 'failure')
        {
            Swal.fire({
                icon: "error",
                title: "Failure!!",
                color: '#dc3545',
                showConfirmButton: true
            });
        }
        else if(type == 'validation_err')
        {
            Swal.fire({
                icon: "error",
                title: "Some required field missing.",
                color: '#dc3545',
                showConfirmButton: true
            });
        }
        else
        {
            Swal.fire({
                icon: "error",
                title: "Failure!!",
                color: '#dc3545',
                showConfirmButton: true
            });
        }
    }
</script>

@yield('scripts')

@stack('scripts')
<input type="hidden" class="site_url" value="{{ url('/') }}" />

<script type="text/javascript">
    var old_count = 0;
    var site_url  = $('.site_url').val();
</script>