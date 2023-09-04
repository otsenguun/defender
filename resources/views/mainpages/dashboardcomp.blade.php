@extends('layout.master')
@section('parentPageTitle', 'My Page')
@section('title', 'Dashboard')


@section('content')


<div class="row">
    <div class="col-md-3">
        <input type="date" name="start" class="form-control" value="{{date('Y-m-d',strtotime('-10 day'))}}">
    </div>
    <div class="col-md-3">
        <input type="date" name="end" class="form-control" value="{{date('Y-m-d')}}">
    </div>
    <div class="col-md-3">
        <select name="type" id="" class="custom-select">
            <option value="day">Days</option>
            <option value="week">Week</option>
            <option value="month">Month</option>
        </select>
    </div>
    <div class="col-md-3">
        <button class="btn btn-outline-primary s_button">Search</button>
    </div>
    
</div>
<hr>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
            

        <div class="row clearfix">

            <div class="col-lg-3 col-md-3">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Signature out dated</div>
                            <div class="py-4 m-0 text-center h2 text-info">{{$totals['SignaturesOutOfDate']}}</div>
                            <div class="d-flex">
                                <!-- <small class="text-muted">New income</small>
                                <div class="ml-auto">0%</div> -->
                            </div>
                        </div>
                        <div class="back p-3 px-4 bg-info text-center">
                            <p class="text-light">This Week</p>
                            <span id="minibar-chart2" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4 bg-danger text-light">
                            <div>Threat Protection issue</div>
                            <div class="py-4 m-0 text-center h2">{{$totals['Threat']}}</div>
                            <div class="d-flex">
                                <!-- <small>New order</small>
                                <div class="ml-auto"><i class="fa fa-caret-down"></i>10%</div> -->
                            </div>
                        </div>
                        <div class="back p-3 px-4 text-center">
                            <p>This Week</p>
                            <span id="minibar-chart4" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4 bg-warning text-light">
                            <div>Firewall issue</div>
                            <div class="py-4 m-0 text-center h2">{{$totals['fire_wall_issue']}}</div>
                            <div class="d-flex">
                                <!-- <small>New users</small>
                                <div class="ml-auto"><i class="fa fa-caret-up"></i>3%</div> -->
                            </div>
                        </div>
                        <div class="back p-3 px-4 text-center">
                            <p>This Week</p>
                            <span id="minibar-chart3" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card-wrapper flip-left">
                    <div class="card s-widget-top">
                        <div class="front p-3 px-4">
                            <div>Fully protected</div>
                            <div class="py-4 m-0 text-center h2 text-success">{{$totals['protected']}}</div>
                            <div class="d-flex">
                                <!-- <small class="text-muted">Income</small>
                                <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4%</div> -->
                            </div>
                        </div>
                        <div class="back p-3 px-4 bg-success text-center">
                            <p class="text-light">This Week</p>
                            <span id="minibar-chart1" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                
   
    
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Threat precent</h2>
            </div>
            <div class="body">
                <div id="chart-pie" style="height: 300px"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Threats</h2>
              
              
            </div>
            <div class="body">
              
                <div id="chart-employment" style="height: 300px"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Top 10 infected hosts</h2>
            </div>

            <div class="body table-responsive">
         
            <table class="table">

            <thead>
                <th>#</th>
                <th>UUID</th>
                <th>Threats</th>
                <th>Bar</th>
                
            </thead>
        
            @foreach($totals['Threat_hosts'] as $key => $thost)
           
               <tr>
                <td>{{$key+1}}</td>
                <td>  <h7> <a href="{{url('showClient',$thost->uuid)}}" class="btn btn-outline-info btn-sm">{{$thost->uuid}}</a> </h7>
                </td>
                <td><b> {{$thost->count}} </b></td>
                <td style="width:50%">  
                    <div class="progress">
                        
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{intval($thost->count*100/$totals['Threat'])}}" aria-valuemin="0" aria-valuemax="100" style="width: {{intval($thost->count*100/$totals['Threat'])}}%">
                            <span>{{intval($thost->count*100/$totals['Threat'])}}% </span>
                        </div>
                    </div>
                </td>
               
               </tr>
                @endforeach
            </div>
           
            </table>
        </div>
    </div>
    
</div>


@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/chartist.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index2.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>


<script>


c3.generate({
        bindto: '#chart-pie', // id of chart wrapper
        data: {
            columns: [
                // each columns data
                @foreach($totals['topthreads'] as $tt)
                ['{{$tt->ThreatName}}', {{$tt->count}}],
                @endforeach
            ],
            type: 'pie', // default type of chart
            // colors: {
            //     'data1': '#973490',
            //     'data2': '#db5087',
            //     'data3': '#ed8495',
            //     'data4': '#f9cdac',
            // },
            names: {
                // name of each serie
                @foreach($totals['topthreads'] as $tt)
                '{{$tt->ThreatName}}': '{{$tt->ThreatName}}',
                @endforeach
            }
        },
        axis: {
        },
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 20,
            top: 0
        },
    });

$(".s_button").click(function(){
    var start = $("input[name='start']").val();
    var end = $("input[name='end']").val();
    var type = $("select[name='type']").val();

    // console.log(type);
    getLineData(start,end,type);
});


// $(".")
getLineData("{{date('Y-m-d',strtotime('-10 day'))}}","{{date('Y-m-d')}}","day");

function getLineData(start,end,type){

    $.get("{{url('getLineData')}}/" + start +"/"+end+"/"+type, function(data, status){
        var result = jQuery.parseJSON(data);
        var chart = c3.generate({
            bindto: '#chart-employment', // id of chart wrapper
            data: {
                columns: [
                    result.chart.low,
                    result.chart.medium,
                    result.chart.high,
                    result.chart.total
                ],
                type: 'line', // default type of chart
                names: {
                    // name of each serie
                    'low': 'low',
                    'medium': 'medium',
                    'high': 'high',
                    'total': 'total'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories:result.dates
                    // categories: ['2012', '2013', '2014', '2015', '2016', '2017', '2018']
                },
            },
            legend: {
                show: true, //hide legend
            },
            padding: {
                bottom: 20,
                top: 0
            },
        });

       

        });

}



</script>
@stop