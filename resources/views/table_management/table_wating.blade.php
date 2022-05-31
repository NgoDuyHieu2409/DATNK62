<?php
   <h4 style="text-align:center; color: #ad306d;">DANH SÁCH THƯC ĐƠN CHỜ </h4>
                <form action="" id="printJS-form" style="margin-top: 50px;">
                    <div class="form-group">
                        <label style="font-weight: 500;margin-left:20px;">Tên Bàn : <?=$value['ten_banan']?></label>
                        <label ></label>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-purple">

                         <tr>
                                <th>Tên món ăn</th>
                                <th>số lượng</th>
                            <tr>
                        </thead>
                        <tbody>
                             <?php 
                            $sql2="SELECT oder_item.* , sp.ten_sp ,oder.id_banan, SUM(oder_item.soluong_sp) as tong FROM oder_item,sp,oder WHERE sp.id_sp = oder_item.id_sp and oder.id_banan =$value[id_banan] and oder_item.id_oder = oder.id_oder and oder.trangthai=1 GROUP BY oder_item.id_sp";

                              $result2 = $conn->query($sql2);
                              foreach ($result2 as $value2) {
                                  echo "<tr>
                                        <td>$value2[ten_sp]</td>
                                         <td>$value2[tong]</td>
                                  </tr>";
                              }
                        ?>
                            
                        </tbody>
                    </table>                
                </form>
           
               
                <button type="button" class="btn btn-danger" onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'Thực đơn',onPrintDialogClose: function () {
                               push(<?=$value['id_banan']?>); 
                      }}); push(<?=$value['id_banan']?>);" style="margin-left:20px;" class="btn btn-light">
                    In thực đơn
                </button>
             <?php endforeach; ?>
  
    <script type="text/javascript">
    function push(id){
      $.ajax({
            url:'ajax_admin_thucdon.php',
            method : 'POST',
            dataType: 'html',
            async:false,
            data: {
             id:id,
            }
          }).done(function(ketqua){
            
          });
    }

   
</script>