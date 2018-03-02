<div class="row">
<div class="col-sm-6 col-md-5 col-lg-4">
    <div class="box box-solid">
    	<div class="box-header">
    		<h4>Number of cases received by gender per month
          <br>
          <div class="badge" style="background: #0e50a4;">Gabo</div>
          <div class="badge" style="background: #629751;">Gore</div>
        </h4> 
    	</div>
        <div class="box-body">
			  <canvas id="genderofvictim" style="height:250px"></canvas>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-6 col-lg-5">
    <div class="box box-solid">
    	<div class="box-header">
            <h4>Types of issues</h4>
    	</div>
        <div class="box-body">
            <canvas id="type_of_issues" style="height:250px"></canvas>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-5 col-lg-5">
    <div class="box box-solid">
    	<div class="box-header">
    		<h4>Number of received cases by Province per month <br>
          <div class="badge" style="background: #0e50a4;">Easter</div>
          <div class="badge" style="background: #629751;">Kigali</div>
          <div class="badge" style="background: #cc50a4;">Northern</div>
          <div class="badge" style="background: #f0ec43;">Southren</div>
          <div class="badge" style="background: #f0e9c3;">Western</div>
        </h4>
    	</div>
        <div class="box-body">
        	 <canvas id="sector_where_issue_is" style="height:230px"></canvas>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4" >
    <div class="box box-solid">
        <div class="box-header">
            <h4>Land related issues received per month</h4>
        </div>
        <div class="box-body">
                <canvas id="landTypeIssue" style="height:250px"></canvas>
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
 var landTypeIssueOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
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
      datasetFill             : true,
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
  $.getJSON("/admin/api/dashboard/policing/landtypeissues", function (result) {
    var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        labels.indexOf(result[i].month) === -1 ? labels.push(result[i].month) : console.log("This item already exists");
        data.push(result[i].value);
    }

    console.log(data)
    var issueTypeData = {
      labels : labels,
      datasets : [
        {
          fillColor : "#fff",
          strokeColor : "#0e50a4",
          pointColor : "#0e50a4",
          pointStrokeColor : "#629751",
          data : data
        }
      ]
    };

    var issueTypes = document.getElementById('landTypeIssue').getContext('2d');
    new Chart(issueTypes).Line(issueTypeData,{});
  });


   
    //-------------
    //- LINE CHART -
    //--------------
  $.getJSON("/admin/api/dashboard/policing/genderofvictim", function (result) {

        var labels = [],maledata = [], femaledata = [];
        for (var i = 0; i < result.length; i++) {            
            
            labels.indexOf(result[i].month) === -1 ? labels.push(result[i].month) : console.log("This item already exists");

            switch(result[i].label.toLowerCase()){
                case 'gabo':
                    maledata.push(result[i].value);  
                break;
                case 'gore':
                    femaledata.push(result[i].value);
                break;                 
            }
        }

    var landTypeIssueData = {
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
          pointColor          : '#629751',
          pointStrokeColor    : '#629751',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#629751',
          data                : femaledata
        }
      ]
    }

        var lineChartCanvas          = $('#genderofvictim').get(0).getContext('2d');
        var lineChart                = new Chart(lineChartCanvas);
        var lineChartOptions         = landTypeIssueOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(landTypeIssueData, lineChartOptions);
    });

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    $.getJSON("/admin/api/dashboard/policing/typeofissues", function (PieData) {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = document.getElementById('type_of_issues').getContext('2d');
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
  $.getJSON("/admin/api/dashboard/policing/sectorofissue", function (result) {

    var labels = [],eastdata = [], kigalidata = [],northdata = [], southdata = [],westdata = [];

    for (var i = 0; i < result.length; i++) {            
            
            labels.indexOf(result[i].month) === -1 ? labels.push(result[i].month) : console.log("This item already exists");

            switch(result[i].label.toLowerCase()){
                case 'east':
                    eastdata.push(result[i].value);  
                break;
                case 'kigali':
                    kigalidata.push(result[i].value);
                break;                 
                case 'north':
                    northdata.push(result[i].value);  
                break;
                case 'south':
                    southdata.push(result[i].value);
                break; 
             case 'west':
                    westdata.push(result[i].value);  
                break;
            }
        };

    var sector_where_issue_isData = {
      labels  : labels,
      datasets: [
        {
          label               : 'East',
          fillColor           : '#0e50a4',
          strokeColor         : '#0e50a4',
          pointColor          : '#0e50a4',
          pointStrokeColor    : '#0e50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0e50a4',
          data                : eastdata
        },
        {
          label               : 'Kigali',
          fillColor           : '#629751',
          strokeColor         : '#629751',
          pointColor          : '#629751',
          pointStrokeColor    : '#629751',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#629751',
          data                : kigalidata
        },
                {
          label               : 'North',
          fillColor           : '#cc50a4',
          strokeColor         : '#cc50a4',
          pointColor          : '#cc50a4',
          pointStrokeColor    : '#cc50a4',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#cc50a4',
          data                : northdata
        },
        {
          label               : 'South',
          fillColor           : '#f0ec43',
          strokeColor         : '#f0ec43',
          pointColor          : '#f0ec43',
          pointStrokeColor    : 'f0ec43',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'f0ec43',
          data                : southdata
        },
        {
          label               : 'West',
          fillColor           : '#f0e9c3',
          strokeColor         : '#f0e9c3',
          pointColor          : '#f0e9c3',
          pointStrokeColor    : '#f0e9c3',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'f0ec43',
          data                : westdata
        }

      ]
    }

    var sector_where_issue_isCanvas                   = $('#sector_where_issue_is').get(0).getContext('2d')
    var sector_where_issue_is                         = new Chart(sector_where_issue_isCanvas)
    sector_where_issue_isData.datasets[1].fillColor   = '#00a65a'
    sector_where_issue_isData.datasets[1].strokeColor = '#00a65a'
    sector_where_issue_isData.datasets[1].pointColor  = '#00a65a'
    var sector_where_issue_isOptions                  = {
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

    sector_where_issue_isOptions.datasetFill = false
    sector_where_issue_is.Bar(sector_where_issue_isData, sector_where_issue_isOptions)
});
  })
</script>