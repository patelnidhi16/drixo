<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>eLearning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link href="{{asset('front/assets/img/favicon.jpg')}}" rel="icon">

    <!-- plugins -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    @stack('style')
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        @include('admin.layouts.header');

        @include('admin.layouts.sidebar');
        <br>


        @yield('content');


        @include('admin.layouts.footer');

    </div>

    @include('admin.layouts.rightsidebar');

    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- optional plugins -->
    <script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>

    <!-- page js -->
    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    @stack('script')
</body>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{route('admin.testgraph')}}",
            type: 'get',
            success: function(data) {
                var a = [];
                var subject = [];
                $.each(data, function(key, value) {
                    a.push(value.total);
                    subject.push(value.getsubject[0].subject_name + ' ' + value.total);
                });
                r = {
                    plotOptions: {
                        pie: {
                            donut: {
                                size: "70%"
                            },
                            expandOnClick: !1
                        },
                    },
                    chart: {
                        height: 298,
                        type: "donut"
                    },
                    legend: {
                        show: !0,
                        position: "right",
                        horizontalAlign: "left",
                        itemMargin: {
                            horizontal: 6,
                            vertical: 3
                        },
                    },
                    series: a,
                    labels: subject,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: "bottom"
                            }
                        },
                    }, ],
                    tooltip: {
                        y: {
                            formatter: function(t) {
                                return t + " test";
                            },
                        },
                    },
                };
                new ApexCharts(
                    document.querySelector("#sales-by-category-chart"),
                    r
                ).render();
            }
        });
      

        $.ajax({
            url: "{{route('admin.usergraph')}}",
            type: 'get',
            success: function(data) {
             
                r = {
                    chart: {
                        height: 296,
                        type: "bar",
                        stacked: !0,
                        toolbar: {
                            show: !1
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: "45%"
                        }
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    stroke: {
                        show: !0,
                        width: 2,
                        colors: ["transparent"]
                    },
                    series: [{
                            name: "Number of student",
                            data: [data.today_users_count, data.weekly_users_count, data.monthly_users_count, data.yearly_users_count]
                        },

                    ],
                    xaxis: {
                        categories: ["today", "this week", "this month", "this year"],
                        axisBorder: {
                            show: !1
                        },
                    },
                    legend: {
                        show: !1
                    },
                    grid: {
                        row: {
                            colors: ["transparent", "transparent"],
                            opacity: 0.2,
                        },
                        borderColor: "#f3f4f7",
                    },
                    tooltip: {
                        y: {
                            formatter: function(t) {
                                return  t ;
                            },
                        },
                    },
                };
                new ApexCharts(
                    document.querySelector(".targets-chart"),
                    r
                ).render();

              
            }
        });
        $.ajax({
            url: "{{route('admin.attemptgraph')}}",
            type: 'get',
            success: function(data) {
             console.log(data);
                r = {
                    chart: {
                        height: 296,
                        type: "bar",
                        stacked: !0,
                        toolbar: {
                            show: !1
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: "45%",
                           
                        }
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    stroke: {
                        show: !0,
                        width: 1,
                        colors: ["transparent"]
                    },
                    series: [{
                            name: "Number of Assign test",
                            data: [data.today_users_count, data.weekly_users_count, data.monthly_users_count, data.yearly_users_count],
                        },
                    ],
                    colors: ["#CF9FFF"],
                    xaxis: {
                        categories: ["today", "this week", "this month", "this year"],
                        axisBorder: {
                            show: !1
                        },
                    },
                    legend: {
                        show: !1
                    },
                    grid: {
                        row: {
                            colors: ["transparent", "transparent"],
                            opacity: 0.9,
                        },
                        borderColor: "#1ce1ac",
                    },
                    tooltip: {
                        y: {
                            formatter: function(t) {
                                return  t ;
                            },
                        },
                    },
                };
                new ApexCharts(
                    document.querySelector(".abc"),
                    r
                ).render();

              
            }
        });
    })
</script>

</html>