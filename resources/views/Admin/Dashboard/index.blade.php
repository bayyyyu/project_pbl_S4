<x-App>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>Selamat datang
                            <strong style="font-weight: bolder">
                                @if (auth()->check())
                                    {{ auth()->user()->nama_lengkap }}
                            </strong>
                            di Halaman Dashboard
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('Admin/Dashboard') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-xl-8 col-md-12">
                            <div class="card sale-card">
                                <div class="card-header">
                                    <h5>Wilayah Penanaman</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div id="chartdiv"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="allocation-chart" class="chart-shadow" style="height:215px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Event</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{$event}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-success m-r-10">+11%</span>Dari Bulan Sebelumnya</p>
                                </div>
                            </div>
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Pohon Tertanam</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{$tanaman}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tree text-c-green f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+12%</span>Dari Bulan Sebelumnya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="styleSelector">
    </div>
</x-App>
<style>
    #chartdiv {
        width: 100%;
        height: 215px;
    }
</style>
<script>
    am5.ready(function() {

        // =================================
        // Create map chart
        // =================================

        // Create root and chart
        var root = am5.Root.new("chartdiv");

        // Set themes
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(
            am5map.MapChart.new(root, {
                panX: "rotateX",
                projection: am5map.geoAlbersUsa()
            })
        );

        // Create polygon series
        var polygonSeries = chart.series.push(
            am5map.MapPolygonSeries.new(root, {
                geoJSON: am5geodata_usaLow
            })
        );

        polygonSeries.mapPolygons.template.setAll({
            tooltipText: "{name}"
        });

        polygonSeries.mapPolygons.template.states.create("hover", {
            fill: am5.color(0x297373)
        });

        var zoomOut = root.tooltipContainer.children.push(am5.Button.new(root, {
            x: am5.p100,
            y: 0,
            centerX: am5.p100,
            centerY: 0,
            paddingTop: 18,
            paddingBottom: 18,
            paddingLeft: 12,
            paddingRight: 12,
            dx: -20,
            dy: 20,
            themeTags: ["zoom"],
            icon: am5.Graphics.new(root, {
                themeTags: ["button", "icon"],
                strokeOpacity: 0.7,
                draw: function(display) {
                    display.moveTo(0, 0);
                    display.lineTo(12, 0);
                }
            })
        }));

        zoomOut.get("background").setAll({
            cornerRadiusBL: 40,
            cornerRadiusBR: 40,
            cornerRadiusTL: 40,
            cornerRadiusTR: 40
        });
        zoomOut.events.on("click", function() {
            if (currentSeries) {
                currentSeries.hide();
            }
            chart.goHome();
            zoomOut.hide();
            currentSeries = regionalSeries.US.series;
            currentSeries.show();
        });
        zoomOut.hide();


        // =================================
        // Set up point series
        // =================================

        // Load store data
        am5.net.load("https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-160/TargetStores.json").then(function(
            result) {
            var stores = am5.JSONParser.parse(result.response);
            setupStores(stores);
        });

        var regionalSeries = {};
        var currentSeries;

        // Parses data and creats map point series for domestic and state-level
        function setupStores(data) {
            console.log(data);

            // Init country-level series
            regionalSeries.US = {
                markerData: [],
                series: createSeries("stores")
            };

            // Set current series
            currentSeries = regionalSeries.US.series;

            // Process data
            am5.array.each(data.query_results, function(store) {

                // Get store data
                var store = {
                    state: store.MAIL_ST_PROV_C,
                    long: am5.type.toNumber(store.LNGTD_I),
                    lat: am5.type.toNumber(store.LATTD_I),
                    location: store.co_loc_n,
                    city: store.mail_city_n,
                    count: am5.type.toNumber(store.count)
                };

                // Process state-level data
                if (regionalSeries[store.state] == undefined) {
                    var statePolygon = getPolygon("US-" + store.state);
                    if (statePolygon) {

                        var centroid = statePolygon.visualCentroid();

                        // Add state data
                        regionalSeries[store.state] = {
                            target: store.state,
                            type: "state",
                            name: statePolygon.dataItem.dataContext.name,
                            count: store.count,
                            stores: 1,
                            state: store.state,
                            markerData: [],
                            geometry: {
                                type: "Point",
                                coordinates: [centroid.longitude, centroid.latitude]
                            }
                        };
                        regionalSeries.US.markerData.push(regionalSeries[store.state]);

                    } else {
                        // State not found
                        return;
                    }
                } else {
                    regionalSeries[store.state].stores++;
                    regionalSeries[store.state].count += store.count;
                }

                // Process city-level data
                if (regionalSeries[store.city] == undefined) {
                    regionalSeries[store.city] = {
                        target: store.city,
                        type: "city",
                        name: store.city,
                        count: store.count,
                        stores: 1,
                        state: store.state,
                        markerData: [],
                        geometry: {
                            type: "Point",
                            coordinates: [store.long, store.lat]
                        }
                    };
                    regionalSeries[store.state].markerData.push(regionalSeries[store.city]);
                } else {
                    regionalSeries[store.city].stores++;
                    regionalSeries[store.city].count += store.count;
                }

                // Process individual store
                regionalSeries[store.city].markerData.push({
                    name: store.location,
                    count: store.count,
                    stores: 1,
                    state: store.state,
                    geometry: {
                        type: "Point",
                        coordinates: [store.long, store.lat]
                    }
                });

            });
            console.log(regionalSeries.US.markerData)
            regionalSeries.US.series.data.setAll(regionalSeries.US.markerData);
        }

        // Finds polygon in series by its id
        function getPolygon(id) {
            var found;
            polygonSeries.mapPolygons.each(function(polygon) {
                if (polygon.dataItem.get("id") == id) {
                    found = polygon;
                }
            })
            return found;
        }

        // Creates series with heat rules
        function createSeries(heatfield) {

            // Create point series
            var pointSeries = chart.series.push(
                am5map.MapPointSeries.new(root, {
                    valueField: heatfield,
                    calculateAggregates: true
                })
            );

            // Add store bullet
            var circleTemplate = am5.Template.new(root);
            pointSeries.bullets.push(function() {
                var container = am5.Container.new(root, {});

                var circle = container.children.push(am5.Circle.new(root, {
                    radius: 10,
                    fill: am5.color(0x000000),
                    fillOpacity: 0.7,
                    cursorOverStyle: "pointer",
                    tooltipText: "{name}:\n[bold]{stores} stores[/]"
                }, circleTemplate));

                var label = container.children.push(am5.Label.new(root, {
                    text: "{stores}",
                    fill: am5.color(0xffffff),
                    populateText: true,
                    centerX: am5.p50,
                    centerY: am5.p50,
                    textAlign: "center"
                }));

                // Set up drill-down
                circle.events.on("click", function(ev) {

                    // Determine what we've clicked on
                    var data = ev.target.dataItem.dataContext;

                    // No id? Individual store - nothing to drill down to further
                    if (!data.target) {
                        return;
                    }

                    // Create actual series if it hasn't been yet created
                    if (!regionalSeries[data.target].series) {
                        regionalSeries[data.target].series = createSeries("count");
                        regionalSeries[data.target].series.data.setAll(data.markerData);
                    }

                    // Hide current series
                    if (currentSeries) {
                        currentSeries.hide();
                    }

                    // Control zoom
                    if (data.type == "state") {
                        var statePolygon = getPolygon("US-" + data.state);
                        polygonSeries.zoomToDataItem(statePolygon.dataItem);
                    } else if (data.type == "city") {
                        chart.zoomToGeoPoint({
                            latitude: data.geometry.coordinates[1],
                            longitude: data.geometry.coordinates[0]
                        }, 64, true);
                    }
                    zoomOut.show();

                    // Show new targert series
                    currentSeries = regionalSeries[data.target].series;
                    currentSeries.show();
                });

                return am5.Bullet.new(root, {
                    sprite: container
                });
            });

            // Add heat rule for circles
            pointSeries.set("heatRules", [{
                target: circleTemplate,
                dataField: "value",
                min: 10,
                max: 30,
                key: "radius"
            }])

            // Set up drill-down
            // TODO

            return pointSeries;
        }

    }); // end am5.ready()
</script>
