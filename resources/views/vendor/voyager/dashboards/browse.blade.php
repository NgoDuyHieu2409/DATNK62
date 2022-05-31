
@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div id="layoutSidenav">
                            <div id="layoutSidenav_content">
                              <main>
                                <div class="container-fluid">
                                  <h1 class="mt-4">Thống kê doanh thu</h1>
                                  <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Thống kê doanh thu theo ngày / tháng / năm </li>
                                  </ol>
                                  <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                      <div class="card  text-white mb-4" style="background: #545b62!important">
                                        <div class="card-body">Doanh thu ngày <?=date("d-m-Y");?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                      
                                        
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                      <div class="card  text-white mb-4" style="background: #7207ff;">
                                        <div class="card-body"> Doanh thu Tháng <?=date("m-Y");?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                      <div class="card   text-white mb-4" style="background: #117a8b;">
                                        <div class="card-body">Doanh thu Năm <?=date("Y");?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                      <div class="card  text-white mb-4" style="background: #d39e00;">
                                        <div class="card-body">Tổng Doanh thu:</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                      
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="card mb-4 m-3" style="background: #ff00007d;">
                                  <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê năm : <input id="click" type="number" placeholder="YYYY" min="2017" max="2100" value="<?=date("Y");?>"> </div>
                                  <div class="card-body"  >
                                    <div class="table-responsive" id="data">            
                                      <table class="table table-hover text-center">
                                        <thead>
                                          <tr>
                                            <th>Tháng</th>
                                            <th>Doanh thu</th>
                                            <th style="max-width: 100px;">Thống kê doanh thu theo năm <?=date("Y");?></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                    
                                           
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                            
                                   <div class="card mb-4 m-3" style="background: rgb(0 123 255 / 50%);">
                                  <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê quý : <?=date("Y");?></div>
                                  <div class="card-body">
                                    <div class="table-responsive" id="data">            
                                      <table class="table table-hover text-center">
                                        <thead>
                                          <tr>
                                            <th>Quý</th>
                                            <th>Doanh thu</th>
                                            <th style="max-width: 100px;">Thống kê doanh thu theo nam <?=date("Y");?></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                      
                      
                      
                      
                                <div class="card mb-4 m-3" style="background: #ccc;">
                                  <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê theo admin theo tháng/ năm <?=date("Y");?></div>
                                  <div class="card-body">
                                    <div class="table-responsive">            
                                      <table class="table table-hover text-center">
                                        <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Tên Admin</th>
                                            <th>Tháng 1</th>
                                            <th>Tháng 2</th>
                                            <th>Tháng 3</th>
                                            <th>Tháng 4</th>
                                            <th>Tháng 5</th>
                                            <th>Tháng 6</th>
                                            <th>Tháng 7</th>
                                            <th>Tháng 8</th>
                                            <th>Tháng 9</th>
                                            <th>Tháng 10</th>
                                            <th>Tháng 11</th>
                                            <th>Tháng 12</th>
                                            
                                          </tr>
                                        </thead>
                                        <tbody>
                      
                              
                                        
                      
                                       </tbody>
                                     </table>
                                   </div>
                                 </div>
                               </div>
                      
                      
                                
                              
                      
                      
                      
                               <div class="card mb-4 m-3">
                                  <div class="card-header"><i class="fas fa-table mr-1"></i>Thống kê theo admin theo quý/ năm 2021</div>
                                  <div class="card-body">
                                    <div class="table-responsive">            
                                      <table class="table table-hover text-center">
                                        <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Tên Admin</th>
                                            <th>Quý I</th>
                                            <th>Quý II</th>
                                            <th>Quý III</th>
                                            <th>Quý IV</th>
                                          
                                            
                                          </tr>
                                        </thead>
                                        <tbody>
                      
                                        
                      
                                       </tbody>
                                     </table>
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </main>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

