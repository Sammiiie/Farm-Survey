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
    </div>

    <!-- Content Row -->

    <div class="row">


        <!-- Bar Chart -->
        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-cluster align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Number of Clusters Survyed</h6>
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
                label: "States Surveyed",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [
                    <?php
                    $findStates = mysqli_query($connection, "SELECT * FROM `states` WHERE simple_name IN (SELECT State FROM input_cluster)");
                    if (mysqli_num_rows($findStates) > 0) {
                        while ($state = mysqli_fetch_array($findStates)) {
                            $state = $state['simple_name'];
                            $sumState = sumRecordsWhere('Number_of_Farmer_in_the_Cluster', 'input_cluster', $state);
                            // dd($sumState);
                    ?><?php echo number_format($sumState) ?>,
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
                        maxTicksLimit: 6
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
                        callback: function(value, index, values) {
                            return '' + number_format(value);
                        }
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

<!-- <script type="text/javascript">
    function initMap() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };

        // Display a map on the web page
        map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
        map.setTilt(50);

        // Multiple markers location, latitude, and longitude
        var markers = [
            <?php
            // $findcluster = selectAll('input_cluster');
            // foreach ($findcluster as $cluster) {

            //     echo '["' . $cluster['Name_of_cluster_Area'] . '", ' . $cluster['Longitude'] . ', ' . $cluster['Latitude'] . '],';
            // }
            ?>
        ];
        console.log(markers);

        // Info window content
        var infoWindowContent = [
            <?php
            // $findcluster = selectAll('input_cluster');
            // foreach ($findcluster as $cluster) {
            ?>['<div class="info_content">' +
                    '<h3><?php // echo $cluster['Name_of_cluster_Area']; 
                            ?></h3>' +
                    '<p>Number of farmers in cluster <?php // echo $cluster['Number_of_Farmer_in_the_Cluster']; 
                                                        ?> and Total number of Hectares <?php //echo $cluster['Size_of_Cluster_Farm_LandHa']; 
                                                                                        ?> in this Cluster</p>' + '</div>'],
            <?php
            // }
            ?>
        ];

        // Add multiple markers to map
        var infoWindow = new google.maps.InfoWindow(),
            marker, i;

        // Place each marker on the map  
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Add info window to marker    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Center the map to fit all markers on the screen
            map.fitBounds(bounds);
        }

        // Set zoom level
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(14);
            google.maps.event.removeListener(boundsListener);
        });

        // Load initialize function
        google.maps.event.addDomListener(window, 'load', initMap);

    }
</script> -->