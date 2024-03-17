
{{-- {!! Form::open(['id' =>'searchForm', 'name' =>'searchForm', 'target' => '_blank']) !!} --}}
{{-- {!! Form::open(['id' =>'searchForm', 'name' =>'searchForm', 'method' => 'POST', 'route' => 'generate.pdf', 'target' => '_blank']) !!} --}}
<input type="hidden" id="pdfData" name="tableData" value="">

<div class="panel-group panel-group-control content-group-lg" id="accordion-control">
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group1">
                    লেজার
                </a>
            </h6>
        </div>

        <div id="accordion-control-group1" class="panel-collapse collapse in">
            {{-- <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group"> {!! Form::label('dateFrom',  trans('trans/application.date_from')) !!}
                            {!! Form::text('dateFrom', null, ['class' => 'form-control', 'id' => 'dateFrom', 'placeholder' => 'Select from date',  ]) !!}
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group"> {!! Form::label('dateTo', trans('trans/application.date_to')) !!}
                            {!! Form::text('dateTo', null, ['class' => 'form-control', 'id' => 'dateTo', 'placeholder' => 'Select to date' ]) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('duration', 'সময়কাল' ) !!}
                            {!! Form::Select('duration', $durations, '', ['class' => 'select form-control', 'id' => 'duration']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('fiscal_year', 'অর্থবছর' ) !!}
                            {!! Form::Select('fiscal_year', $fiscalYears, '', ['class' => 'select form-control', 'id' => 'fiscal_year']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"> {!! Form::label('business_type', trans('trans/application.business_type') ) !!}
                            {!! Form::Select('business_type', $businessTypes, '', ['class' => 'select form-control', 'id' => 'business_type']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('applicantName', 'আবেদনকারী' ) !!}
                            {!! Form::Select('applicantName', $users, '', ['class' => 'select form-control', 'id' => 'applicant_name']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('payment_type', 'পেমেন্টের ধরণ' ) !!}
                            {!! Form::Select('payment_type', $paymentTypes, '', ['class' => 'select form-control', 'id' => 'payment-type']) !!}
                        </div>
                    </div>
                </div>

                <div class="text-right" style="padding-bottom:10px; padding-right:10px">
                    <button class="btn btn-default" type="button" id="btnReset" onClick="this.form.reset()">
                        {{ trans('trans/application.rpt_reset') }} <i class="icon-reload-alt position-right"></i>
                    </button>

                    <div class="btn-group">
                        <button class="btn btn-primary" type="button" id="btnPreview">
                            <i class="icon-display4 position-left"></i> Search
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
{{-- {!! Form::close() !!} --}}

<script>
    $(function () {
        $('.select').select2({});

        $('#btnPreview').on('click', function() {
            $('#datatable').DataTable().draw();
        });

        $('#btnReset').on('click', function() {
            $('#datatable').DataTable().draw();
        });
    });
</script>
