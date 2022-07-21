<div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê quý : <?=date("Y");?></div>
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
            <th>{{$quy1}}</th>
            <th>VND</th>
          </tr>

          <tr>
            <th>II </th>
            <th>{{$quy2}}</th>
            <th>VND</th>
          </tr>

          <tr>
            <th>III </th>
            <th>{{$quy3}}</th>
            <th>VND</th>
          </tr>
          
          <tr>
            <th> IV</th>          
            <th>{{$quy4}}</th>
            <th>VND</th>
          </tr>
       
      </tbody>
    </table>
  </div>
</div>