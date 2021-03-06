<div class="row">
<div class="col-sm-12 col-md-6 col-lg-5">
    <div class="box box-solid">
      <div class="box-header">
        <h4>Total number of disputes received by gender per month
          <br>
        
          <div class="badge" style="background: #0e50a4;">Male</div>
          <div class="badge" style="background: #629751;">Female</div>
          
        </h4>
      </div>
        <div class="box-body">
           <canvas id="femaleVsMale" style="height:230px"></canvas>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-5">
    <div class="box box-solid">
    	<div class="box-header">
    		<h4>Total number of monthly reports generated by committee level 
          <br>
          <div class="badge" style="background: #0e50a4">Cell</div>
          <div class="badge" style="background: #629751;">Sector</div>
        </h4>
    	</div>
        <div class="box-body">
			  <canvas id="committee_types" style="height:250px"></canvas>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-6 col-lg-5">
    <div class="box box-solid">
    	<div class="box-header">
            <h4>Total number of reported disputes per district</h4>
    	</div>
        <div class="box-body">
            <canvas id="disputes_per_district" style="height:250px"></canvas>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-6 col-lg-5">
    <div class="box box-solid">
        <div class="box-header">
            <h4>Total number of received issues per month</h4>
        </div>
        <div class="box-body">
                <canvas id="receivedIssuePerMonth" style="height:250px"></canvas>
        </div>
    </div>
</div>


<div class="col-sm-12 col-md-12 col-lg-10">
    <div class="box box-solid">
        <div class="box-header">
            <h4>Non Land related received issues per district<br>

          <div class="badge" style="background: #0e50a4;">Inheritance</div>
          <div class="badge" style="background: #cc50a4;">Donation</div>
          <div class="badge" style="background: #00ec43;">Family</div>
          <div class="badge" style="background: #00e9c3;">Rent</div>
          <div class="badge" style="background: #005004;">Contract breach</div>
            </h4>
        </div>
        <div class="box-body">
                <canvas id="typesofIssues" style="height:350px"></canvas>
        </div>
    </div>
</div>



<div class="col-sm-12 col-md-12 col-lg-10">
    <div class="box box-solid">
        <div class="box-header">
            <h4>Land related received issues per district<br>

          <div class="badge" style="background: #0e50a4;">Inheritance</div>
          <div class="badge" style="background: #629751;">Boundaries</div>
          <div class="badge" style="background: #cc50a4;">Donation</div>
          <div class="badge" style="background: #00ec43;">Family</div>
          <div class="badge" style="background: #00e9c3;">Rent</div>
          <div class="badge" style="background: #005004;">Contract breach</div>
            </h4>
        </div>
        <div class="box-body">
                <canvas id="landTypesofIssues" style="height:350px"></canvas>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-10">
    <div class="box box-solid">
        <div class="box-header">
            <h4>Dispute mediation performance per community level<br>

          <div class="badge" style="background: #0e50a4;">Consensus</div>
          <div class="badge" style="background: #cc50a4;">Partial Consensus</div>
          <div class="badge" style="background: #00ec43;">No Consensus</div>
          
            </h4>
        </div>
        <div class="box-body">
                <canvas id="mediationPerformance" style="height:350px"></canvas>
        </div>
    </div>
</div>



</div>

<script type="text/javascript">
     $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
 var receivedIssuePerMonthOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(255,255,255,255)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: false,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : false,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    };

    //--------------
    //- AREA CHART -
    //--------------
  $.getJSON("/admin/api/dashboard/abunzi/receivedissuepermonth", function (result) {
    var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        labels.indexOf(result[i].month) === -1 ? labels.push(result[i].month) : console.log("This item already exists");
        data.push(result[i].received_issues);
    }


    var issueTypeData = {
      labels : labels,
      datasets : [
        {
          fillColor : "#fff",
          strokeColor : "#629751",
          pointColor : "#629751",
          pointStrokeColor : "#629751",
          data : data
        }
      ]
    };


        //var issueTypes          = $('#receivedissuepermonth').get(0).getContext('2d');
        //var lineChart                = new Chart(issueTypes);
      //  var lineChartOptions         = issueTypeData;
      //  lineChartOptions.datasetFill = false;
       // lineChart.Line(issueTypes, lineChartOptions);
   receivedIssuePerMonthOptions.datasetFill = false
   var issueTypes = document.getElementById('receivedIssuePerMonth').getContext('2d');
   new Chart(issueTypes).Line(issueTypeData,{});
  });


   
    //-------------
    //- LINE CHART -
    //--------------
  $.getJSON("/admin/api/dashboard/abunzi/committeetypes", function (result) {

        var labels = [],celledata = [], sectordata = [];
        for (var i = 0; i < result.length; i++) {            
            
            labels.indexOf(result[i].month) === -1 ? labels.push(result[i].month) : console.log("This item already exists");

            switch(result[i].label.toLowerCase()){
                case 'cell':
                    celledata.push(result[i].value);  
                break;
                case 'sector':
                    sectordata.push(result[i].value);
                break;                 
            }
        }

    var receivedIssuePerMonthData = {
      labels  : labels,
      datasets: [
        {
          label               : 'Cell',
          fillColor           : '#0e50a4',
          strokeColor         : '#0e50a4',
          pointColor          : '#0e50a4',
          pointStrokeColor    : '#0e50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0e50a4',
          data                : celledata
        },
        {
          label               : 'Sector',
          fillColor           : '#629751',
          strokeColor         : '#629751',
          pointColor          : '#629751',
          pointStrokeColor    : '#629751',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#629751',
          data                : sectordata
        }
      ]
    }

        var lineChartCanvas          = $('#committee_types').get(0).getContext('2d');
        var lineChart                = new Chart(lineChartCanvas);
        var lineChartOptions         = receivedIssuePerMonthOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(receivedIssuePerMonthData, lineChartOptions);
    });

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    $.getJSON("/admin/api/dashboard/abunzi/disputeperdistrict", function (PieData) {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = document.getElementById('disputes_per_district').getContext('2d');
    var pieChart       = new Chart(pieChartCanvas);
  
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
  });

    //-------------
    //- BAR CHART -
    //-------------
  $.getJSON("/admin/api/dashboard/abunzi/maleandfemalecases", function (result) {

    var labels = [],maledata = [], femaledata = [];

    for (var i = 0; i < result.length; i++) {            
            labels.indexOf(result[i].month) === -1 ? labels.push(result[i].month) : console.log("This item already exists");
            maledata.push(result[i].male); 
            femaledata.push(result[i].female); 
        };

    // Plot
     var femaleVsMaleData = {
      labels  : labels,
      datasets: [
        {
          label               : 'Male',
          fillColor           : '#0e50a4',
          strokeColor         : '#0e50a4',
          pointColor          : '#0e50a4',
          pointStrokeColor    : '#0e50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0e50a4',
          data                : maledata
        },
        {
          label               : 'Female',
          fillColor           : '#629751',
          strokeColor         : '#629751',
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#3b8bba',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#3b8bba',
          data                : femaledata
        }
      ]
    }

    var femaleVsMaleCanvas                   = $('#femaleVsMale').get(0).getContext('2d')
    var femaleVsMale                         = new Chart(femaleVsMaleCanvas)
    femaleVsMaleData.datasets[1].fillColor   = '#00a65a'
    femaleVsMaleData.datasets[1].strokeColor = '#00a65a'
    femaleVsMaleData.datasets[1].pointColor  = '#00a65a'
    var femaleVsMaleOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    femaleVsMaleOptions.datasetFill = false
    femaleVsMale.Bar(femaleVsMaleData, femaleVsMaleOptions)
});



  //-------------
    //- BAR CHART -
    //-------------
  $.getJSON("/admin/api/dashboard/abunzi/typeanddistrictland", function (result) {

    var labels = [], inheritancedata = [],  boundarydata = [],   donationdata = [],   familydata = [],   rentdata = [],   countractdata = [];


     for (var i = 0; i < result.length; i++) {            
            labels.indexOf(result[i].district) === -1 ? labels.push(result[i].district) : console.log("This item already exists");
            inheritancedata.push(result[i].inheritance); 
            boundarydata.push(result[i].boundaries); 
            donationdata.push(result[i].donation);
            familydata.push(result[i].family);
            rentdata.push(result[i].rent);
            countractdata.push(result[i].contract);
        }; 

    // Plot
      var landTypesofIssuesData = {
      labels  : labels,
      datasets: [
        {
          label               : 'inheritance',
          fillColor           : '#0e50a4',
          strokeColor         : '#0e50a4',
          pointColor          : '#0e50a4',
          pointStrokeColor    : '#0e50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0e50a4',
          data                : inheritancedata
        },
        {
          label               : 'boundaries',
          fillColor           : '#629751',
          strokeColor         : '#629751',
          pointColor          : '#629751',
          pointStrokeColor    : '#629751',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#629751',
          data                : boundarydata
        },
                {
          label               : 'donation',
          fillColor           : '#cc50a4',
          strokeColor         : '#cc50a4',
          pointColor          : '#cc50a4',
          pointStrokeColor    : '#cc50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#cc50a4',
          data                : donationdata
        },
        {
          label               : 'Family',
          fillColor           : '#00ec43',
          strokeColor         : '#00ec43',
          pointColor          : '#00ec43',
          pointStrokeColor    : '00ec43',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '00ec43',
          data                : familydata
        },
        {
          label               : 'Rent',
          fillColor           : '#00e9c3',
          strokeColor         : '#00e9c3',
          pointColor          : '#00e9c3',
          pointStrokeColor    : '#00e9c3',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '00ec43',
          data                : rentdata
        },
        {
          label               : 'Contract breach',
          fillColor           : '#005004',
          strokeColor         : '#005004',
          pointColor          : '#005004',
          pointStrokeColor    : '#005004',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#005004',
          data                : countractdata
        }
      ]
    }

    var landTypesofIssuesCanvas                   = $('#landTypesofIssues').get(0).getContext('2d')
    var barChart                                  = new Chart(landTypesofIssuesCanvas)
    var barChartData                     = landTypesofIssuesData;
    //barChartData.datasets[1].fillColor   = '#00a65a'
   // barChartData.datasets[1].strokeColor = '#00a65a'
    //barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 10,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    //landTypesofIssuesOptions.datasetFill = false
   // landTypesofIssues.Bar(landTypesofIssuesData, landTypesofIssuesOptions)

   barChartOptions.datasetFill = false;
  barChart.Bar(barChartData, barChartOptions);
});




/*

//-------------
    //- BAR CHART -
    //-------------
  $.getJSON("/admin/api/dashboard/abunzi/typeanddistrict", function (result) {

    var labels = [], inheritancedata = [],  donationdata = [],   familydata = [],   rentdata = [],   countractdata = [];


     for (var i = 0; i < result.length; i++) {            
            labels.indexOf(result[i].district) === -1 ? labels.push(result[i].district) : console.log("This item already exists");
            inheritancedata.push(result[i].inheritance); 
            donationdata.push(result[i].donation);
            familydata.push(result[i].family);
            rentdata.push(result[i].rent);
            countractdata.push(result[i].contract);
        }; 

    // Plot
      var landTypesofIssuesData = {
      labels  : labels,
      datasets: [
        {
          label               : 'inheritance',
          fillColor           : '#0e50a4',
          strokeColor         : '#0e50a4',
          pointColor          : '#0e50a4',
          pointStrokeColor    : '#0e50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0e50a4',
          data                : inheritancedata
        },
                {
          label               : 'donation',
          fillColor           : '#cc50a4',
          strokeColor         : '#cc50a4',
          pointColor          : '#cc50a4',
          pointStrokeColor    : '#cc50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#cc50a4',
          data                : donationdata
        },
        {
          label               : 'Family',
          fillColor           : '#00ec43',
          strokeColor         : '#00ec43',
          pointColor          : '#00ec43',
          pointStrokeColor    : '00ec43',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '00ec43',
          data                : familydata
        },
        {
          label               : 'Rent',
          fillColor           : '#00e9c3',
          strokeColor         : '#00e9c3',
          pointColor          : '#00e9c3',
          pointStrokeColor    : '#00e9c3',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '00ec43',
          data                : rentdata
        },
        {
          label               : 'Contract breach',
          fillColor           : '#005004',
          strokeColor         : '#005004',
          pointColor          : '#005004',
          pointStrokeColor    : '#005004',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#005004',
          data                : countractdata
        }
      ]
    }

    var landTypesofIssuesCanvas                   = $('#typesofIssues').get(0).getContext('2d')
    var barChart                                  = new Chart(landTypesofIssuesCanvas)
    var barChartData                     = landTypesofIssuesData;
  //  barChartData.datasets[1].fillColor   = '#00a65a'
   // barChartData.datasets[1].strokeColor = '#00a65a'
   // barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 10,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    //landTypesofIssuesOptions.datasetFill = false
   // landTypesofIssues.Bar(landTypesofIssuesData, landTypesofIssuesOptions)

   barChartOptions.datasetFill = true;
  barChart.Bar(barChartData, barChartOptions);
});




*/



//-------------
    //- BAR CHART -
    //-------------
  $.getJSON("/admin/api/dashboard/abunzi/mediationPerformance", function (result) {

    var labels = [], inheritancedata = [],  donationdata = [],   familydata = [];


     for (var i = 0; i < result.length; i++) {            
            labels.indexOf(result[i].district) === -1 ? labels.push(result[i].district) : console.log("This item already exists");
            inheritancedata.push(result[i].consensus); 
            donationdata.push(result[i].partial);
            familydata.push(result[i].no_consensus);
        }; 

    // Plot
      var landTypesofIssuesData = {
      labels  : labels,
      datasets: [
        {
          label               : 'inheritance',
          fillColor           : '#0e50a4',
          strokeColor         : '#0e50a4',
          pointColor          : '#0e50a4',
          pointStrokeColor    : '#0e50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0e50a4',
          data                : inheritancedata
        },
                {
          label               : 'donation',
          fillColor           : '#cc50a4',
          strokeColor         : '#cc50a4',
          pointColor          : '#cc50a4',
          pointStrokeColor    : '#cc50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#cc50a4',
          data                : donationdata
        },
        {
          label               : 'Family',
          fillColor           : '#00ec43',
          strokeColor         : '#00ec43',
          pointColor          : '#00ec43',
          pointStrokeColor    : '00ec43',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '00ec43',
          data                : familydata
        }
      ]
    }

    var landTypesofIssuesCanvas                   = $('#mediationPerformance').get(0).getContext('2d')
    var barChart                                  = new Chart(landTypesofIssuesCanvas)
    var barChartData                     = landTypesofIssuesData;
  //  barChartData.datasets[1].fillColor   = '#00a65a'
   // barChartData.datasets[1].strokeColor = '#00a65a'
   // barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 10,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    //landTypesofIssuesOptions.datasetFill = false
   // landTypesofIssues.Bar(landTypesofIssuesData, landTypesofIssuesOptions)

   barChartOptions.datasetFill = true;
  barChart.Bar(barChartData, barChartOptions);
});




  })
</script>