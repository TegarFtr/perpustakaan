@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>150</h3>

                        <p>Anggota</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Buku</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-book-open"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3>44</h3>

                        <p>Peminjaman</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner text-white">
                        <h3>65</h3>

                        <p>Pengembalian</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="col-md-6">
            <!-- Bar chart -->
                <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Bar Chart
                    </h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="bar-chart" style="height: 300px;"></div>
                </div>
                <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        /*
        * BAR CHART
        * ---------
        */

        var bar_data = {
        data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
        bars: { show: true }
        }
        $.plot('#bar-chart', [bar_data], {
        grid  : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor  : '#f3f3f3'
        },
        series: {
            bars: {
            show: true, barWidth: 0.5, align: 'center',
            },
        },
        colors: ['#3c8dbc'],
        xaxis : {
            ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
        }
        })
        /* END BAR CHART */
    </script>
@endsection
