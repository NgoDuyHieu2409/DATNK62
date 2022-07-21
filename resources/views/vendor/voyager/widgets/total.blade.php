<div class="row">
<div class="col-lg-3 col-6">

    <div class="small-box bg-info">
        <div class="inner" style="background: #17a2b8;padding: 10px;border-radius: 15px">
            <p>Doanh thu <?=date("d-m-Y");?></p>
            <h3>{{number_format($total_day, 0, '.', '.')}} VND</h3>
        </div>
        {{-- <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-success">
        <div class="inner" style="background: #28a745;padding: 10px;border-radius: 15px">
            <p>Doanh thu tháng <?=date("m-Y")?></p>
            <h3>{{number_format($total_month, 0, '.', '.')}} VND</h3>
        </div>
        {{-- <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-warning">
        <div class="inner" style="background: #ffc107;padding: 10px;border-radius: 15px">
            <p>Doanh thu năm <?=date("Y");?></p>
            <h3>{{number_format($total_year, 0, '.', '.')}} VND</h3>
        </div>
        {{-- <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-danger">
        <div class="inner" style="background: #dc3545;padding: 10px;border-radius: 15px">
            <p>Tổng doanh thu</p>
            <h3>{{number_format($total, 0, '.', '.')}} VND</h3>
        </div>
        {{-- <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
</div>
