@extends('admin.layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header"
        style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight: bold ;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bold ;">Dashboard </h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content"
        style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight: bold ;">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-4 col-6">
                    <div class="small-box card">
                        <a href="javascript:void(0);" class="small-box-footer">&nbsp;<strong style="color: black ;">Total
                                Users</strong></a>
                        <div class="inner">
                            <h3>#</h3>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                        <!-- <a href="javascript:void(0);" class="small-box-footer">&nbsp;<strong style="color: black ;">Total
                                Customers</strong></a> -->
                        <!-- <a href="#" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box card">
                        <a href="javascript:void(0);" class="small-box-footer">&nbsp;<strong style="color: black ;">Total
                                Company</strong></a>
                        <div class="inner">
                            <h3>#</h3>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                        <!-- <a href="javascript:void(0);" class="small-box-footer">&nbsp;<strong style="color: black ;">Total
                                Products</strong></a> -->
                        <!-- <a href="#" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box card">
                        <a href="javascript:void(0);" class="small-box-footer">&nbsp;<strong style="color: black ;">Total
                                Baranch</strong></a>
                        <div class="inner">
                            <h3>#</h3>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                        <!-- <a href="javascript:void(0);" class="small-box-footer">&nbsp;<strong style="color: black ;">Total
                                Customers</strong></a> -->
                        <!-- <a href="#" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>


            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
    <script>
        console.log("Hello !")
    </script>

@endsection