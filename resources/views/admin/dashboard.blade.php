@extends('admin.common.layout')
@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner"><h3>150</h3><p>New Orders</p></div>
            <div class="icon"><i class="ion ion-bag"></i></div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner"><h3>53<sup style="font-size: 20px">%</sup></h3><p>Bounce Rate</p></div>
            <div class="icon"><i class="ion ion-stats-bars"></i></div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner"><h3>44</h3><p>User Registrations</p></div>
            <div class="icon"><i class="ion ion-person-add"></i></div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner"><h3>65</h3><p>Unique Visitors</p></div>
            <div class="icon"><i class="ion ion-pie-graph"></i></div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <section class="col-lg-7 connectedSortable">
        <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                </div>
                <i class="fa fa-map-marker"></i>
                <h3 class="box-title">Visitors</h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <div class="box-footer no-border">
                <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <div id="sparkline-1"></div>
                        <div class="knob-label">Visitors</div>
                    </div>
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <div id="sparkline-2"></div>
                        <div class="knob-label">Online</div>
                    </div>
                    <div class="col-xs-4 text-center">
                        <div id="sparkline-3"></div>
                        <div class="knob-label">Exists</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-5 connectedSortable">
        <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
                <i class="fa fa-th"></i>
                <h3 class="box-title">Sales Graph</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
        </div>
    </section>
</div>

@endsection
