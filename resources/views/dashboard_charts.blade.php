<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')

<!-- ADD A JAVASCRIPT  -->
<script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/js/Chart.js"></script>

<!-- Your custom  HTML goes here -->
<div class="row">

{{-- Show police charts if available --}}
@if (!empty($police_charts))
<div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Community Policing dashboard</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
              {!! $police_charts !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

{{-- Show police charts if available --}}
@if (!empty($focal_person_charts))
<div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Community Focal Person Dashboard</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
              {!! $focal_person_charts !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

{{-- Show police charts if available --}}
@if (!empty($abunzi_charts))
<div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Abunzi Dashboard</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
              {!! $abunzi_charts !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif;
</div>



@endsection