{{-- @extends('layouts.master') --}}
@section('page_title', 'লেজার')
@section('menu_assessment', 'active')


@section('page_header')
    <i class="icon-stack-check position-left"></i> <span class="text-semibold">লেজার</span>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb_links')

@endsection

@section('content')
    <!--Filter -->

    <div class="panel">
        <div class="table-responsive panel-body">
            @include('purchase.filter_invoice')
        </div>
    </div>
    <!-- /Filter -->

    <!--list -->
    <div class="panel">
        <div class="panel-heading border-bottom text-right">

            <a href="javascript:" id="btnPdfExport" class="btn btn-sm btn-success">
                <i class="icon-file-pdf"></i> {{ trans('trans/application.rpt_export_pdf') }}
            </a>
        </div>

        <div class="table-responsive panel-body">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>Date of transection</th>
                        <th>Application ID</th>
                        <th>Institute Name</th>
                        <th>Business Type</th>
                        <th>Applicant Name</th>
                        <th>Amount</th>
                        <th>Vat</th>
                        <th>Status</th>
                        <th>Payment Type</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>

                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Amount</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
    <!-- /list -->

    {{-- pdf generate form --}}
    {{-- <form id="pdfForm" method="post" action="{{ route('generate.pdf') }}" target="_blank">
        @csrf
        <input type="hidden" id="pdfData" name="tableData" value="">
    </form> --}}
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- for export buttons -->
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            serverMethod: 'get',
            lengthMenu: [10, 25, 50,100],
            order: [ 0, "desc" ],
            language: {
                'loadingRecords': '&nbsp;',
                'processing': 'Loading ...'
            },

            dom: 'lBfrtip',

            buttons: [
                'copy', 'csv', 'excel', 'pdf',
                {
                    extend: 'print',
                    title: '',
                    autoPrint: true,
                    footer: true,

                    customize: function (win) {
                        $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                        $(win.document.body).find('table').addClass('display').css('font-size', '16px');
                        $(win.document.body).find('table').addClass('display').css('text-align', 'center');

                        $(win.document.body).find('tr:nth-child(odd) td').each(function (index) {
                            $(this).css('background-color', '#fff');
                        });
                        // $(win.document.body).find('tr:nth-child(even) td').each(function (index) {
                        //     $(this).css('background-color', '#fff');
                        // });
                        $(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();

                        $(win.document.body).prepend('<h2 style="text-align:center">Ledger|Bangladesh Fire Service & Civil Defence</h2>');

                        $(win.document.body).append('<div style="text-align:center">This page is generated from eLicense Management System | Department of Fire Service & Civil Defence. System Developed by : Perky Rabbit Corporation Limited.</div>');
                    }
                }
            ],

            ajax: {
                url: '{{ route('invoice') }}',
                type: 'get',
                dataType: 'JSON',
                cache: false,

                data: function (d) {
                    // $('#btnPreview').on('click', function() {
                        d.dateFrom = $('#dateFrom').val();
                        d.dateTo = $('#dateTo').val();
                        d.selectedTimeframe = $('#duration').val();
                        d.selectedFiscalYear = $('#fiscal_year').val();
                        d.selectedBusinessTypeId = $('#business_type').val();
                        d.selectedApplicantId = $('#applicant_name').val();
                        d.selectedPaymentType = $('#payment-type').val();
                        // console.log(d.dateFrom);
                    // });
                },
            },

            columns: [
                {data: 'challan_date',name: 'challan_date'},
                {data: 'id',name: 'id'},
                {data: 'institution_name',name: 'institution_name',  orderable: false},
                {data: 'business_type',name: 'business_type', orderable: false},
                {data: 'applicant_name',name: 'applicant_name', orderable: false},
                {data: 'challan_amount',name: 'challan_amount'},
                {data: 'vat',name: 'vat'},
                {data: 'status',name: 'status', orderable: false},
                {data: 'challan_type',name: 'challan_type', orderable: false},

                {
                    data: 'button',
                    name: 'button',
                    orderable: false,
                },
            ],

            columnDefs: [
                {'bSortable': true, 'aTargets': [0,1,2,3,4]},
                // {'bSearchable': false, 'aTargets': [0]},
                { className: 'text-center', targets: [0,1,5,6,7,8,9] },
                // { className: 'text-uppercase', targets: [1] },
            ],

            search: {
                "regex": true
            },

            // calculate sum
            footerCallback: function(row, data, start, end, display) {
                var api = this.api();

                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                var total = api
                    .column(5)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(5).footer()).html('Total: ' + total);
            }
        });

        // pdf export
        // $('#btnPdfExport').click(function () {
        //     let tableData = $('#datatable').DataTable().rows().data().toArray();
        //     $('#pdfData').val(JSON.stringify(tableData));
        //     $('#pdfForm').submit();

        //     var doc = new jsPDF();
        //     doc.setFont("Siyam Rupali"); // Setting font for Bangla text
        //     doc.text(10, 10, JSON.stringify(tableData));
        //     doc.save("table_data.pdf");
        // });

        $('#btnPdfExport').click(function () {
            let tableData = $('#datatable').DataTable().rows().data().toArray();
            $('#pdfData').val(JSON.stringify(tableData));
            $('#searchForm').submit();


        });



    </script>


{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

@endsection
