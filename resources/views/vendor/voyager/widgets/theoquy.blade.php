<div class="card mb-4 m-3" style="background: #b7db137d;">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê quý : <?= date('Y') ?></div>
    <div class="card-body">
        <div class="table-responsive" id="data">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Quý</th>
                        <th>Doanh thu</th>
                        <th style="max-width: 100px;">Đơn vị</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <th>I</th>
                        <th>{{number_format($quy1, 0, '.', '.')}}</th>
                        <th>VND</th>
                    </tr>

                    <tr>
                        <th>II </th>
                        <th>{{number_format($quy2, 0, '.', '.')}}</th>
                        <th>VND</th>
                    </tr>

                    <tr>
                        <th>III </th>
                        <th>{{number_format($quy3, 0, '.', '.')}}</th>
                        <th>VND</th>
                    </tr>

                    <tr>
                        <th> IV</th>
                        <th>{{number_format($quy4, 0, '.', '.')}}</th>
                        <th>VND</th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
