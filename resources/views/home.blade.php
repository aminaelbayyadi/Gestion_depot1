@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="container">
<div class="row" >
 <div class="col-md-6">
            <div class="card">
                <div class="card-header" >Nombre de produits</div>
                <div class="card-body" id="products-chart"></div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Pourcentages des fournisseurs</div>
                <div class="card-body">
                    <div id="fournisseurs-chart"></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script >
   var totalProducts = {{$totalProducts}};
   
    
    // Products chart
    Highcharts.chart('products-chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Nombre de produits'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Nombre de produits',
            colorByPoint: true,
            data: [{
                name: 'Nombre de produits',
                y: totalProducts,
                sliced: true,
                selected: true
            }]
        }]
    });
</script>

@endpush
