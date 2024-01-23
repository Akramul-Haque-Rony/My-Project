{{-- <div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">Copyright © <span class="dynamic-year">{{ date('Y') }}</span> <a target="_blank"
                href="https://technolabbd.com/">Techno Lab</a>, All rights reserved.</p>
    </div>
    <div class="footer-section f-section-2">
        <p class="">Version 1.0.5 </p>
    </div>
</div>
</div>
</div> --}}

{{-- <div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">
                <div class="content-wrapper">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper HideOnPrint">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">{{ date('Y') }}</span> <a target="_blank"
                    href="https://technolabbd.com/">Techno Lab</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Version 1.0.5 </p>
        </div>
</div>
</div>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
{{-- <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
<script src="{{ asset('src/assets/js/custom.js') }}"></script> --}}
<!-- END GLOBAL MANDATORY SCRIPTS -->


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
<script src="{{ asset('layouts/vertical-light-menu/app.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('src/plugins/src/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('src/assets/js/dashboard/dash_2.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<!--  BEGIN CUSTOM SCRIPT FILE  -->
<script src="{{ asset('src/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
<!--  END CUSTOM SCRIPT FILE  -->

{{-- Select with search --}}
<script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
<script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
{{-- <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select2.js') }}"></script> --}}

<script src="{{ asset('src/plugins/src/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('src/assets/js/apps/invoice-edit.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="{{ asset('src/plugins/src/highlight/highlight.pack.js') }}"></script>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME GLOBAL STYLE -->
<script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
<script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>

<script src="{{ asset('src/assets/js/apps/invoice-preview.js') }}"></script>
<script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('src/plugins/src/autocomplete/autoComplete.min.js') }}"></script>
<script src="{{ asset('src/assets/js/pages/knowledge-base.js') }}"></script>
<script src="{{ asset('layouts/moment.js') }}"></script>

<script type="text/javascript">
    window.onload = function() {
        document.querySelector('.widget-content .mixin').click();
    }

    function update_amounts() {
        var sum = 0.0;
        $('table.cart_table1 > tbody  > tr').each(function() {
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            var amount = (qty * price)
            sum += amount;
            // alert(amount)
            $(this).find('.total').text('' + amount);
            $(this).find('.total').val('' + amount);
        });

        $('.subTotal1').text(sum.toLocaleString('en-US'));
        $('.subTotal1').val(sum);
    }

    $('table.cart_table1').change(function() {
        update_amounts(); //update_amounts_sum();
    });
    $('table.cart_table1').hover(function() {
        update_amounts();
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

        $('.checkall').on("change", function() {
            //   alert($(this).val());
            var checkclass = ($(this).val());
            if (this.checked) {
                $('.' + checkclass).prop('checked', true);
            } else {
                $('.' + checkclass).prop('checked', false);
            }


            var total_amount = 0;
            $('.setcheckall:checkbox:checked').each(function() {
                total_amount += parseFloat($(this).closest('tr').find('.total').val());
                // total_amount+=total_amount; 
            });
            // alert(total_amount);
            $('.checked_subTotal').text(total_amount.toLocaleString('en-US'));

        });


        $('.table .setcheckall').on("click", function() {
            var total_amount = 0;
            $('.setcheckall:checkbox:checked').each(function() {
                total_amount += parseFloat($(this).closest('tr').find('.total').val());
                // total_amount+=total_amount; 
            });
            // alert(total_amount);
            $('.checked_subTotal').text(total_amount.toLocaleString('en-US'));
            $('.checked_subTotal_deposit').text(total_amount.toLocaleString('en-US'));

        });



    });
    // end doc ready function
</script>
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive 'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50, 100, 500, 1000, 2000],
        "pageLength": 10
    });
</script>

</body>

</html>
