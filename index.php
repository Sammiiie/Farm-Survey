<?php

include('header.php');

?>
<!-- map -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="cluster no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Size of cluster Farms Surveyed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="cluster_hectares_report.php">
                                    <?php
                                    $findFarms = sumRecords('Size_of_Cluster_Farm_LandHa', 'input_cluster');
                                    echo number_format($findFarms);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="cluster no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Input Inventory</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="input_inventory.php">
                                    <?php
                                    $findWarehouse = selectAll('input_inventory');
                                    echo count($findWarehouse);
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="cluster no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Input Distribution
                            </div>
                            <div class="cluster no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <a href="input_distrubition.php">
                                            <?php
                                            $findSurveys = selectAll('input_distrubution');
                                            echo count($findSurveys);
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="cluster no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Incidence Reports</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $findCorrections = selectAll('survey_correction');
                                echo count($findCorrections);
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Farmland Verification Progress
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <?php
                                    $percent = $findFarms / 32000 * 100
                                    ?>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($percent, 2) . "%" ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $percent . "%" ?>" aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Semi circle Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Veriification Progress</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        <!-- Styles -->
                        <style>
                            #progressChart {
                                width: 100%;
                                height: 400px;
                            }
                        </style>

                        <!-- Resources -->
                        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

                        <!-- Chart code -->
                        <script>
                            am4core.ready(function() {

                                // Themes begin
                                am4core.useTheme(am4themes_animated);
                                // Themes end

                                var chart = am4core.create("progressChart", am4charts.PieChart);
                                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                                chart.data = [{
                                        states: "Verified",
                                        value: <?php echo $findFarms ?>
                                    },
                                    {
                                        states: "Not Verified",
                                        value: <?php echo 32000 - $findFarms  ?>
                                    }
                                ];
                                chart.radius = am4core.percent(70);
                                chart.innerRadius = am4core.percent(40);
                                chart.startAngle = 180;
                                chart.endAngle = 360;

                                var series = chart.series.push(new am4charts.PieSeries());
                                series.dataFields.value = "value";
                                series.dataFields.category = "states";

                                series.slices.template.cornerRadius = 10;
                                series.slices.template.innerCornerRadius = 7;
                                series.slices.template.draggable = true;
                                series.slices.template.inert = true;
                                series.alignLabels = false;

                                series.hiddenState.properties.startAngle = 90;
                                series.hiddenState.properties.endAngle = 90;

                                chart.legend = new am4charts.Legend();

                            }); // end am4core.ready()
                        </script>

                        <!-- HTML -->
                        <div id="progressChart"></div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Variable-radius nested donut chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">States by Farmers and Hectares</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Styles -->
                    <style>
                        #nestedChart {
                            width: 100%;
                            height: 400px;
                        }
                    </style>

                    <!-- Resources -->
                    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

                    <!-- Chart code -->
                    <script>
                        am4core.ready(function() {

                            // Themes begin
                            am4core.useTheme(am4themes_animated);
                            // Themes end

                            // Create chart instance
                            var chart = am4core.create("nestedChart", am4charts.PieChart);
                            chart.startAngle = 160;
                            chart.endAngle = 380;

                            // Let's cut a hole in our Pie chart the size of 40% the radius
                            chart.innerRadius = am4core.percent(40);


                            // Add data
                            chart.data = [
                                <?php
                                $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                                if (mysqli_num_rows($findStates) > 0) {
                                    while ($state = mysqli_fetch_array($findStates)) {
                                        $state = $state['simple_name'];
                                        $sumState = number_format(sumRecordsWhere('Size_of_Cluster_Farm_LandHa', 'input_cluster', $state), 2);
                                        $sumFarmers = number_format(sumRecordsWhere('Number_of_Farmer_in_the_Cluster', 'input_cluster', $state), 2);
                                        $data = [
                                            'states' => $state,
                                            'farmers' => $sumFarmers,
                                            'hectares' => $sumState
                                        ];
                                        echo json_encode($data) . ",";
                                    }
                                }
                                ?>
                            ];

                            // Add and configure Series
                            var pieSeries = chart.series.push(new am4charts.PieSeries());
                            pieSeries.dataFields.value = "farmers";
                            pieSeries.dataFields.category = "states";
                            pieSeries.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
                            pieSeries.slices.template.strokeWidth = 1;
                            pieSeries.slices.template.strokeOpacity = 1;

                            // Disabling labels and ticks on inner circle
                            pieSeries.labels.template.disabled = true;
                            pieSeries.ticks.template.disabled = true;

                            // Disable sliding out of slices
                            pieSeries.slices.template.states.getKey("hover").properties.shiftRadius = 0;
                            pieSeries.slices.template.states.getKey("hover").properties.scale = 1;
                            pieSeries.radius = am4core.percent(40);
                            pieSeries.innerRadius = am4core.percent(30);

                            var cs = pieSeries.colors;
                            cs.list = [am4core.color(new am4core.ColorSet().getIndex(0))];

                            cs.stepOptions = {
                                lightness: -0.05,
                                hue: 0
                            };
                            cs.wrap = false;


                            // Add second series
                            var pieSeries2 = chart.series.push(new am4charts.PieSeries());
                            pieSeries2.dataFields.value = "hectares";
                            pieSeries2.dataFields.category = "states";
                            pieSeries2.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
                            pieSeries2.slices.template.strokeWidth = 1;
                            pieSeries2.slices.template.strokeOpacity = 1;
                            pieSeries2.slices.template.states.getKey("hover").properties.shiftRadius = 0.05;
                            pieSeries2.slices.template.states.getKey("hover").properties.scale = 1;

                            pieSeries2.labels.template.disabled = true;
                            pieSeries2.ticks.template.disabled = true;


                            var label = chart.seriesContainer.createChild(am4core.Label);
                            label.textAlign = "middle";
                            label.horizontalCenter = "middle";
                            label.verticalCenter = "middle";
                            label.adapter.add("text", function(text, target) {
                                return "[font-size:12px]total farmers[/]:\n[bold font-size:20px]" + pieSeries.dataItem.values.value.sum + "[/]\n[font-size:18px]total hectares[/]:\n[bold font-size:30px]" + pieSeries2.dataItem.values.value.sum + "[/]";
                            })

                        }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="nestedChart"></div>

                </div>
            </div>

        </div>

        <!-- dragabble donut chart -->
        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Toggle Farms Veriefied By states</h6>
                    <i>Sort through the amount of Verified Farms per State</i>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <!-- Styles -->
                    <style>
                        #dragPie {
                            width: 100%;
                            height: 500px;
                        }
                    </style>

                    <!-- Resources -->
                    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

                    <!-- Chart code -->
                    <script>
                        am4core.ready(function() {

                            // Themes begin
                            am4core.useTheme(am4themes_animated);
                            // Themes end

                            var data = [
                                <?php
                                $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                                if (mysqli_num_rows($findStates) > 0) {
                                    while ($state = mysqli_fetch_array($findStates)) {
                                        $state = $state['simple_name'];
                                        $sumState = number_format(countRecordsWhere('State', 'input_cluster', $state), 2);
                                        $data = [
                                            'state' => $state,
                                            'farms' => $sumState
                                        ];
                                        echo json_encode($data) . ",";
                                    }
                                }
                                ?>
                            ];


                            // cointainer to hold both charts
                            var container = am4core.create("dragPie", am4core.Container);
                            container.width = am4core.percent(100);
                            container.height = am4core.percent(100);
                            container.layout = "horizontal";

                            container.events.on("maxsizechanged", function() {
                                chart1.zIndex = 0;
                                separatorLine.zIndex = 1;
                                dragText.zIndex = 2;
                                chart2.zIndex = 3;
                            })

                            var chart1 = container.createChild(am4charts.PieChart);
                            chart1.fontSize = 11;
                            chart1.hiddenState.properties.opacity = 0; // this makes initial fade in effect
                            chart1.data = data;
                            chart1.radius = am4core.percent(70);
                            chart1.innerRadius = am4core.percent(40);
                            chart1.zIndex = 1;

                            var series1 = chart1.series.push(new am4charts.PieSeries());
                            series1.dataFields.value = "farms";
                            series1.dataFields.category = "state";
                            series1.colors.step = 2;
                            series1.alignLabels = false;
                            series1.labels.template.bent = true;
                            series1.labels.template.radius = 3;
                            series1.labels.template.padding(0, 0, 0, 0);

                            var sliceTemplate1 = series1.slices.template;
                            sliceTemplate1.cornerRadius = 5;
                            sliceTemplate1.draggable = true;
                            sliceTemplate1.inert = true;
                            sliceTemplate1.propertyFields.fill = "color";
                            sliceTemplate1.propertyFields.fillOpacity = "opacity";
                            sliceTemplate1.propertyFields.stroke = "color";
                            sliceTemplate1.propertyFields.strokeDasharray = "strokeDasharray";
                            sliceTemplate1.strokeWidth = 1;
                            sliceTemplate1.strokeOpacity = 1;

                            var zIndex = 5;

                            sliceTemplate1.events.on("down", function(event) {
                                event.target.toFront();
                                // also put chart to front
                                var series = event.target.dataItem.component;
                                series.chart.zIndex = zIndex++;
                            })

                            series1.ticks.template.disabled = true;

                            sliceTemplate1.states.getKey("active").properties.shiftRadius = 0;

                            sliceTemplate1.events.on("dragstop", function(event) {
                                handleDragStop(event);
                            })

                            // separator line and text
                            var separatorLine = container.createChild(am4core.Line);
                            separatorLine.x1 = 0;
                            separatorLine.y2 = 300;
                            separatorLine.strokeWidth = 3;
                            separatorLine.stroke = am4core.color("#dadada");
                            separatorLine.valign = "middle";
                            separatorLine.strokeDasharray = "5,5";


                            var dragText = container.createChild(am4core.Label);
                            dragText.text = "Drag slices over the line";
                            dragText.rotation = 90;
                            dragText.valign = "middle";
                            dragText.align = "center";
                            dragText.paddingBottom = 5;

                            // second chart
                            var chart2 = container.createChild(am4charts.PieChart);
                            chart2.hiddenState.properties.opacity = 0; // this makes initial fade in effect
                            chart2.fontSize = 11;
                            chart2.radius = am4core.percent(70);
                            chart2.data = data;
                            chart2.innerRadius = am4core.percent(40);
                            chart2.zIndex = 1;

                            var series2 = chart2.series.push(new am4charts.PieSeries());
                            series2.dataFields.value = "farms";
                            series2.dataFields.category = "state";
                            series2.colors.step = 2;

                            series2.alignLabels = false;
                            series2.labels.template.bent = true;
                            series2.labels.template.radius = 3;
                            series2.labels.template.padding(0, 0, 0, 0);
                            series2.labels.template.propertyFields.disabled = "disabled";

                            var sliceTemplate2 = series2.slices.template;
                            sliceTemplate2.copyFrom(sliceTemplate1);

                            series2.ticks.template.disabled = true;

                            function handleDragStop(event) {
                                var targetSlice = event.target;
                                var dataItem1;
                                var dataItem2;
                                var slice1;
                                var slice2;

                                if (series1.slices.indexOf(targetSlice) != -1) {
                                    slice1 = targetSlice;
                                    slice2 = series2.dataItems.getIndex(targetSlice.dataItem.index).slice;
                                } else if (series2.slices.indexOf(targetSlice) != -1) {
                                    slice1 = series1.dataItems.getIndex(targetSlice.dataItem.index).slice;
                                    slice2 = targetSlice;
                                }


                                dataItem1 = slice1.dataItem;
                                dataItem2 = slice2.dataItem;

                                var series1Center = am4core.utils.spritePointToSvg({
                                    x: 0,
                                    y: 0
                                }, series1.slicesContainer);
                                var series2Center = am4core.utils.spritePointToSvg({
                                    x: 0,
                                    y: 0
                                }, series2.slicesContainer);

                                var series1CenterConverted = am4core.utils.svgPointToSprite(series1Center, series2.slicesContainer);
                                var series2CenterConverted = am4core.utils.svgPointToSprite(series2Center, series1.slicesContainer);

                                // tooltipY and tooltipY are in the middle of the slice, so we use them to avoid extra calculations
                                var targetSlicePoint = am4core.utils.spritePointToSvg({
                                    x: targetSlice.tooltipX,
                                    y: targetSlice.tooltipY
                                }, targetSlice);

                                if (targetSlice == slice1) {
                                    if (targetSlicePoint.x > container.pixelWidth / 2) {
                                        var value = dataItem1.value;

                                        dataItem1.hide();

                                        var animation = slice1.animate([{
                                            property: "x",
                                            to: series2CenterConverted.x
                                        }, {
                                            property: "y",
                                            to: series2CenterConverted.y
                                        }], 400);
                                        animation.events.on("animationprogress", function(event) {
                                            slice1.hideTooltip();
                                        })

                                        slice2.x = 0;
                                        slice2.y = 0;

                                        dataItem2.show();
                                    } else {
                                        slice1.animate([{
                                            property: "x",
                                            to: 0
                                        }, {
                                            property: "y",
                                            to: 0
                                        }], 400);
                                    }
                                }
                                if (targetSlice == slice2) {
                                    if (targetSlicePoint.x < container.pixelWidth / 2) {

                                        var value = dataItem2.value;

                                        dataItem2.hide();

                                        var animation = slice2.animate([{
                                            property: "x",
                                            to: series1CenterConverted.x
                                        }, {
                                            property: "y",
                                            to: series1CenterConverted.y
                                        }], 400);
                                        animation.events.on("animationprogress", function(event) {
                                            slice2.hideTooltip();
                                        })

                                        slice1.x = 0;
                                        slice1.y = 0;
                                        dataItem1.show();
                                    } else {
                                        slice2.animate([{
                                            property: "x",
                                            to: 0
                                        }, {
                                            property: "y",
                                            to: 0
                                        }], 400);
                                    }
                                }

                                toggleDummySlice(series1);
                                toggleDummySlice(series2);

                                series1.hideTooltip();
                                series2.hideTooltip();
                            }

                            function toggleDummySlice(series) {
                                var show = true;
                                for (var i = 1; i < series.dataItems.length; i++) {
                                    var dataItem = series.dataItems.getIndex(i);
                                    if (dataItem.slice.visible && !dataItem.slice.isHiding) {
                                        show = false;
                                    }
                                }

                                var dummySlice = series.dataItems.getIndex(0);
                                if (show) {
                                    dummySlice.show();
                                } else {
                                    dummySlice.hide();
                                }
                            }

                            series2.events.on("datavalidated", function() {

                                var dummyDataItem = series2.dataItems.getIndex(0);
                                dummyDataItem.show(0);
                                dummyDataItem.slice.draggable = false;
                                dummyDataItem.slice.tooltipText = undefined;

                                for (var i = 1; i < series2.dataItems.length; i++) {
                                    series2.dataItems.getIndex(i).hide(0);
                                }
                            })

                            series1.events.on("datavalidated", function() {
                                var dummyDataItem = series1.dataItems.getIndex(0);
                                dummyDataItem.hide(0);
                                dummyDataItem.slice.draggable = false;
                                dummyDataItem.slice.tooltipText = undefined;
                            })

                        }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="dragPie"></div>

                </div>
            </div>

        </div>

        <!-- Bar Chart -->
        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Size of Farms Surveyed</h6>
                    <div class="dropdown no-arcluster">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myBarChart"></canvas>
                    </div>

                </div>
            </div>

        </div>

        <!-- Number of Hecatares -->
        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Farms Surveyed</h6>
                    <div class="dropdown no-arcluster">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <!-- Styles -->
                    <style>
                        #chartdiv {
                            width: 100%;
                            height: 500px
                        }
                    </style>

                    <!-- Resources -->
                    <script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>
                    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
                    <script type="text/javascript" src="https://www.amcharts.com/lib/3/maps/js/nigeriaHigh.js"></script>
                    <div id="chartdiv"></div>

                    <!-- Chart code -->
                    <script>
                        var map1 = AmCharts.makeChart("chartdiv", {
                            "type": "map",
                            "theme": "light",
                            "colorSteps": 10,
                            "dataProvider": {
                                "map": "nigeriaHigh",
                                "getAreasFromMap": true,
                                "zoomLevel": 0.9,
                                "areas": []
                            },
                            "areasSettings": {
                                "autoZoom": true,
                                "balloonText": "[[title]]: <strong>[[value]]</strong>"
                            },
                            "valueLegend": {
                                "right": 10,
                                "minValue": "little",
                                "maxValue": "a lot!"
                            },
                            "zoomControl": {
                                "minZoomLevel": 0.9
                            },
                            "titles": 'titles',
                            "listeners": [{
                                "event": "init",
                                "method": updateHeatmap
                            }]
                        });


                        function updateHeatmap(event) {
                            var map1 = event.chart;
                            if (map1.dataGenerated)
                                return;
                            if (map1.dataProvider.areas.length === 0) {
                                setTimeout(updateHeatmap, 100);
                                return;
                            }
                            for (var i = 0; i < map1.dataProvider.areas.length; i++) {
                                map1.dataProvider.areas[i].value = Math.round(Math.random() * 500);
                            }
                            map1.dataGenerated = true;
                            map1.validateNow();
                        }
                    </script>

                </div>
            </div>

        </div>

        <!-- map -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cluster Hectares </h6>
                    <div class="dropdown no-arcluster">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <!-- Card Body -->
                <style>
                    #mapCanvas {
                        width: 100%;
                        height: 500px;
                        margin: 0;
                        padding: 0;
                    }
                </style>
                <div class="card-body">
                    <!-- <div class="chart-area"> -->
                    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                    <!-- MAP -->
                    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPrkS4dgB9aLB0rRB-V3StNCwrY9k-p3g&callback=initMap&libraries=&v=weekly" defer></script> -->
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs3ZgNgivnZz7TmyCBlW-2B09mHGKrO_g&callback=initMap" async></script>
                    <div id="mapCanvas"></div>
                    <!-- </div> -->

                    <script>
                        let map;
                        let lat;
                        let lng;
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } else {
                            console.log("Geolocation is not supported by this browser.");
                        }

                        function showPosition(position) {
                            lat = " " + position.coords.latitude;
                            lng = " " + position.coords.longitude;
                            initMap();
                        }
                        // contry restriction
                        const NEW_NIGERIA_BOUNDS = {
                            north: 2.213965683043,
                            south: 10.124121933043,
                            west: 2.131202795549269,
                            east: 15.982786876781637,
                        };

                        function initMap() {

                            map = new google.maps.Map(document.getElementById("mapCanvas"), {
                                center: new google.maps.LatLng(lat, lng),
                                restriction: {
                                    latLngBounds: NEW_NIGERIA_BOUNDS,
                                    strictBounds: false,
                                },
                                zoom: 7,
                                streetViewControl: false,
                                mapTypeControl: false,
                            });
                            const iconBase =
                                "https://firebasestorage.googleapis.com/v0/b/crush-culture.appspot.com/o/Location%2F";
                            const icons = {
                                library: {
                                    icon: iconBase + "upcoming_new.png?alt=media&token=41d3771e-65af-47c6-ad0d-53cee51c47b9",
                                },
                                info: {
                                    icon: iconBase + "verified_new.png?alt=media&token=4addea67-5557-45d4-b41f-f94c9b571983",
                                },
                            };
                            const features = [
                                <?php
                                $query_two_coordinate = mysqli_query($connection, "SELECT * FROM `input_cluster` WHERE Latitude != '' AND Longitude != ''  ORDER BY id DESC");
                                if (mysqli_num_rows($query_two_coordinate) > 0) {
                                    while ($cluster = mysqli_fetch_array($query_two_coordinate)) {
                                        $lat = $cluster['Latitude'];
                                        $lng = $cluster['Longitude'];
                                        $state_name = $cluster["State"];
                                        $lga_name = $cluster["LGA"];
                                        $clusterArea = $cluster['Name_of_cluster_Area'];
                                        $image_type = "" . '"library"' . "";
                                        $gpss = $cluster['Latitude'] . "," . $cluster['Longitude'];
                                        // echo $lat.$image_type;
                                        echo $frameit = "{ position: new google.maps.LatLng($lat, $lng), type: $image_type, text_name : '$state_name', lga: '$lga_name', gpss: '$gpss' }, ";                                ?>
                                <?php
                                    }
                                }
                                ?>
                            ];

                            // Create markers.
                            for (let i = 0; i < features.length; i++) {
                                const contentString =
                                    '<div id="content">' +
                                    '<div id="siteNotice">' +
                                    "</div>" +
                                    '<h1 id="firstHeading" class="firstHeading">' + features[i].text_name + '</h1>' +
                                    '<div id="bodyContent">' +
                                    "<p><b>LGA:</b>, " + features[i].lga +
                                    "<br/> <a href='https://maps.google.com/?q=" + features[i].gpss + "' target='blank' class='btn btn-primary'>View Indiviual</a> </p></div>" +
                                    "</div>";

                                const infowindow = new google.maps.InfoWindow({
                                    content: contentString,
                                });
                                const marker = new google.maps.Marker({
                                    position: features[i].position,
                                    icon: icons[features[i].type].icon,
                                    map: map,
                                    title: "Cluster Area",
                                });

                                marker.addListener("mouseover", () => {
                                    infowindow.open(map, marker);
                                });
                            }

                            // here marker will now get the HOVER AND CLICK DETAILS

                            // const marker = new google.maps.Marker({
                            //   position: ,
                            //   map,

                            // });

                        }
                    </script>
                </div>
            </div>
        </div>


        <!-- simplePie chart -->
        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Allocated Inputs(KG)</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Styles -->
                    <style>
                        #simplePie {
                            width: 100%;
                            height: 500px;
                        }
                    </style>

                    <!-- Resources -->
                    <!-- <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script> -->

                    <!-- Chart code -->
                    <script>
                        am4core.ready(function() {

                            // Themes begin
                            am4core.useTheme(am4themes_animated);
                            // Themes end

                            // Create chart instance
                            var chart = am4core.create("simplePie", am4charts.PieChart);

                            // Add data
                            chart.data = [
                                <?php
                                $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                                if (mysqli_num_rows($findStates) > 0) {
                                    while ($state = mysqli_fetch_array($findStates)) {
                                        $state = $state['simple_name'];
                                        $sumState = number_format(sumRecordsWhere2('Total_amount_of_Input_allocatedReceived_KG_bags', 'input_distrubution', $state), 2);
                                        $data = [
                                            'state' => $state,
                                            'input' => $sumState
                                        ];
                                        echo json_encode($data) . ",";
                                    }
                                }
                                ?>
                            ];

                            // Add and configure Series
                            var pieSeries = chart.series.push(new am4charts.PieSeries());
                            pieSeries.dataFields.value = "input";
                            pieSeries.dataFields.category = "state";
                            pieSeries.slices.template.stroke = am4core.color("#fff");
                            pieSeries.slices.template.strokeWidth = 2;
                            pieSeries.slices.template.strokeOpacity = 1;

                            // This creates initial animation
                            pieSeries.hiddenState.properties.opacity = 1;
                            pieSeries.hiddenState.properties.endAngle = -90;
                            pieSeries.hiddenState.properties.startAngle = -90;

                        }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="simplePie"></div>

                </div>
            </div>

        </div>

        <!-- simplePie chart -->
        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Number of Received Inputs(KG)</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                
                    <!-- Styles -->
                    <style>
                        #solid {
                            width: 100%;
                            height: 500px;
                        }
                    </style>

                    <!-- Resources -->
                    <!-- <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script> -->

                    <!-- Chart code -->
                    <script>
                        am4core.ready(function() {

                            // Themes begin
                            am4core.useTheme(am4themes_animated);
                            // Themes end



                            // Create chart instance
                            var chart = am4core.create("solid", am4charts.RadarChart);

                            // Add data
                            chart.data = [
                                <?php
                                $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                                if (mysqli_num_rows($findStates) > 0) {
                                    while ($state = mysqli_fetch_array($findStates)) {
                                        $state = $state['simple_name'];
                                        $sumState = number_format(sumRecordsWhere2('Total_Number_of_Input_Received_Kg_Bags', 'input_inventory', $state));
                                        $full = number_format(sumRecordsWhere2('Total_amount_of_Input_allocatedReceived_KG_bags', 'input_distrubution', $state));
                                        $data = [
                                            'category' => $state,
                                            'value' => $sumState,
                                            'full' => $full
                                        ];
                                        echo json_encode($data) . ",";
                                    }
                                }
                                ?>
                            ];

                            // Make chart not full circle
                            chart.startAngle = -90;
                            chart.endAngle = 180;
                            chart.innerRadius = am4core.percent(20);

                            // Set number format
                            chart.numberFormatter.numberFormat = "#.#'%'";

                            // Create axes
                            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
                            categoryAxis.dataFields.category = "category";
                            categoryAxis.renderer.grid.template.location = 0;
                            categoryAxis.renderer.grid.template.strokeOpacity = 0;
                            categoryAxis.renderer.labels.template.horizontalCenter = "right";
                            categoryAxis.renderer.labels.template.fontWeight = 500;
                            categoryAxis.renderer.labels.template.adapter.add("fill", function(fill, target) {
                                return (target.dataItem.index >= 0) ? chart.colors.getIndex(target.dataItem.index) : fill;
                            });
                            categoryAxis.renderer.minGridDistance = 10;

                            var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
                            valueAxis.renderer.grid.template.strokeOpacity = 0;
                            valueAxis.min = 0;
                            valueAxis.max = 100;
                            valueAxis.strictMinMax = true;

                            // Create series
                            var series1 = chart.series.push(new am4charts.RadarColumnSeries());
                            series1.dataFields.valueX = "full";
                            series1.dataFields.categoryY = "category";
                            series1.clustered = false;
                            series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
                            series1.columns.template.fillOpacity = 0.08;
                            series1.columns.template.cornerRadiusTopLeft = 20;
                            series1.columns.template.strokeWidth = 0;
                            series1.columns.template.radarColumn.cornerRadius = 20;

                            var series2 = chart.series.push(new am4charts.RadarColumnSeries());
                            series2.dataFields.valueX = "value";
                            series2.dataFields.categoryY = "category";
                            series2.clustered = false;
                            series2.columns.template.strokeWidth = 0;
                            series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
                            series2.columns.template.radarColumn.cornerRadius = 20;

                            series2.columns.template.adapter.add("fill", function(fill, target) {
                                return chart.colors.getIndex(target.dataItem.index);
                            });

                            // Add cursor
                            chart.cursor = new am4charts.RadarCursor();

                        }); // end am4core.ready()
                    </script>

                    <!-- HTML -->
                    <div id="solid"></div>

                </div>
            </div>

        </div>
    </div>



</div>
<!-- /.container-fluid -->


<?php

include('footer.php');

?>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                if (mysqli_num_rows($findStates) > 0) {
                    while ($state = mysqli_fetch_array($findStates)) {
                ?> "<?php echo $state['simple_name'] ?>",
                <?php
                    }
                }
                ?>
            ],
            datasets: [{
                label: "States Surveyed - Hectares",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [
                    <?php
                    $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                    if (mysqli_num_rows($findStates) > 0) {
                        while ($state = mysqli_fetch_array($findStates)) {
                            $state = $state['simple_name'];
                            $sumState = sumRecordsWhere('Size_of_Cluster_Farm_LandHa', 'input_cluster', $state);
                            echo number_format($sumState);
                    ?>,
                    <?php
                        }
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'states'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 36
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1000,
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        // callback: function(value, index, values) {
                        //     return '' + number_format(value);
                        // }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>