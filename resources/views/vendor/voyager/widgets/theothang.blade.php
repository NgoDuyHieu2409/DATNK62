<div class="card mb-4 m-3" style="background: #12d82d7d;">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê năm : <input id="click" type="number" placeholder="YYYY" min="2017" max="2100" value="<?=date("Y");?>"> </div>
    <div class="card-body"  >
      <div class="table-responsive" id="data">            
        <table class="table table-hover text-center">
          <thead>
            <tr style="background: rgb(228, 35, 35)">
              <th>Tháng</th>
              <th>Doanh thu</th>
              <th style="max-width: 100px;">Đơn vị</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($result as $key=>$value )
           <tr>
            <th>Tháng {{$key}}</th>   
            <th> {{ number_format($value, 0, '.', '.')}}</th>
            <th>VND</th>
          </tr>  
           @endforeach
             
          </tbody>
        </table>
      </div>
    </div>
  </div>