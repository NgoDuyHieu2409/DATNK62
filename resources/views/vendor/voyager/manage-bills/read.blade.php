@extends('voyager::master')

@section('page_title', __('voyager::generic.view') . 'HieuND')

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <!-- form start -->
                    <form action="{{route("admin.manage-bills.updateOrderDetail", $dataTypeContent->id)}}" method="POST" id ="print_hd" >
                        <h1 style="text-align: center">HÓA ĐƠN THANH TOÁN</h1>
                        <h2>BÀN : {{ $dataTypeContent->id_ban }}</h2>
                        <p class="mt-3">Thời gian :<?= date('H:i:s') ?> </p>
                        <p>Ngày :<?= date('d-m-Y') ?> </p>
                        <p>Người lập hoá đơn :{{ !empty($dataTypeContent->user)?$dataTypeContent->user->name : ''}}</p>
                        {{-- @method('PUT') --}}
                        @csrf
                        <table class="table table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên món</th>
                                    <th>Số lượng đặt</th>
                                    <th>Số lượng đem</th>
                                    <th>Trả lại </th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_price = [];
                                @endphp
                                @foreach ($dataTypeContent->order_details as $key => $detail)
                                @if ($detail->quantyti > 0)
                                    
                                <?php $total_price[] = $detail->quantyti * $detail->price_sale; ?>
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $detail->product_name }}</td>
                                    <td><input name="quantity[{{$detail->id}}]" class="quantity" id="quantity_{{$detail->id}}" type="hidden" value="{{ $detail->quantyti }}">{{ $detail->quantyti }}</td>
                                    <td><input class="quantitydem" name="quantitydem[{{$detail->id}}]" id="quantitydem_{{$detail->id}}" data-id="{{  $detail->id }}" min="0" type="number"@if ($detail->quantity_give != 0)
                                        value="{{$detail->quantity_give}}"
                                    @else
                                    value="0"
                                    @endif ></td>
                                    <td class="text-left"><input name="tralai[{{$detail->id}}]" class="traLai" id="traLai_{{$detail->id}}" data-id="{{  $detail->id }}" min="0" type="number" value="0"></td>
                                    <td><input class="priceSale" id="priceSale_{{$detail->id}}" type="hidden" value="{{ $detail->price_sale }}">{{ number_format($detail->price_sale, 0, '.', '.')}}</td>
                                    <td id="{{  $detail->id }}">{{number_format($detail->quantyti*$detail->price_sale, 0, '.', '.')}}</td>
                                </tr>
                                @endif
                                @endforeach


                            </tbody>
                        </table>
                        <h4>Tổng tiền : <span  id="tongtien">{{number_format(array_sum($total_price), 0, '.', '.')}}</span> VNĐ</h4>
                        <input type="hidden" name="total_price" value="{{number_format(array_sum($total_price), 0, '.', '.')}}">
                    </form>
                    <div class="container1">
                        @if($dataTypeContent->status == 0)
                        <button onclick="document.getElementById('print_hd').submit()" class="btn btn-danger mt-5" type="submit">Cập nhật</button>
                        {{-- href="{{route('cate.active', ['id' => $dataTypeContent->id, 'tableId' => $dataTypeContent->id_ban])}}" --}}
                        <button class="btn btn-success mt-5" data-toggle="modal" data-target="#myModal" >Thanh toán</button>
                        @else
                            <a href="{{route('voyager.manage-bills.index', ['status' => 1])}}" class="btn btn-warning">Quay lại</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body" id="modal_hd">
                <div style="text-align: center">
                    <h1>HieuND</h1>
                    <span>6th Element, P.Xuân La, Q.Tây Hồ, TP.Hà Nội</span><br>
                    <span>ĐT: 0988356147 - 0961967684</span>
                    <h1 style="text-align: center">HÓA ĐƠN THANH TOÁN</h1>

                </div>
                <h2>BÀN : {{ $dataTypeContent->id_ban }}</h2>
                
                <p class="mt-3">Giờ vào :{{$dataTypeContent->created_at}}</p>
                <p class="mt-3">Giờ ra :<?= date('Y-m-d H:i:s') ?> </p>
                {{-- <p>Ngày :<?= date('d-m-Y') ?> </p> --}}
                <p>Người lập hoá đơn :{{ !empty($dataTypeContent->user)?$dataTypeContent->user->name : ''}}</p>
                {{-- @method('PUT') --}}
                @csrf
                <table class="table table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên món</th>
                            <th class="text-center">Số lượng đặt</th>
                            <th class="text-center">Thực tế</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_price = [];
                        @endphp
                        @foreach ($dataTypeContent->order_details as $key => $detail)
                        @if ($detail->quantyti > 0)
                            
                        <?php $total_price[] = $detail->quantyti * $detail->price_sale; ?>
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $detail->product_name }}</td>
                            <td>{{ $detail->quantyti }}</td>
                            <td>{{ $detail->quantyti }}</td>
                            <td>{{ $detail->price_sale ? number_format($detail->price_sale, 0, '.', '.') : number_format($detail->price, 0, '.', '.')}}</td>
                            <td>{{number_format($detail->quantyti*$detail->price_sale, 0, '.', '.')}}</td>
                        </tr>
                        @endif
                        @endforeach


                    </tbody>
                </table>
                <hr style="background: #000; height: 2px">
                <h4>Tổng tiền : <span  id="tongtien">{{number_format(array_sum($total_price), 0, '.', '.')}}VNĐ</span></h4>
                <div style="text-align: center" >
                    <span>Cảm ơn và hẹn gặp lại quý khách!</span>
                </div>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-success" type="button" onclick="printJS({
                    printable: 'modal_hd',
                    type: 'html',  
                    onPrintDialogClose: printManagerBill()
                })">
                    In hóa đơn
                 </button>
            </div>
      
          </div>
        </div>
      </div>   
@stop

@section('javascript')
    <script>

        function getTotal (){
            let a = $(`input.traLai`);
            let b = $(`input.quantity`);
            let c = $(`input.priceSale`);
            var total = 0;
            for (let i = 0; i < a.length; i++) {
                total += ($(b[i]).val() - $(a[i]).val()) * $(c[i]).val();
            }
            $('span#tongtien').text((new Intl.NumberFormat().format(total)));
            $('input[name="total_price"]').val((new Intl.NumberFormat().format(total)));
        };
        
        $('input.quantitydem').on('change', function(e){
                let id = $(this).data('id');
                if(parseInt($(`input#quantitydem_${id}`).val()) < 0){
                    alert('Không được nhập số âm');
                    $(`input#quantitydem_${id}`).val(0);
                }
                if($(`input#quantitydem_${id}`).val() == '' || $(`input#quantitydem_${id}`).val() == null){
                    $(`input#quantitydem_${id}`).val(0);
                }
                if(parseInt($(`input#quantitydem_${id}`).val()) > parseInt($(`input#quantity_${id}`).val())){
                    // alert('Không được đem ra lớn hơn số lượng đã đặt');
                    $(`input#quantitydem_${id}`).val($(`input#quantity_${id}`).val());
                }
            });
        $('input.traLai').on('change', function(){
                let id = $(this).data('id');
                if(parseInt($(`input#traLai_${id}`).val()) < 0){
                    alert('Không được nhập số âm');
                    $(`input#traLai_${id}`).val(0);
                }
                if($(`input#traLai_${id}`).val() == '' || $(`input#traLai_${id}`).val() == null){
                    $(`input#traLai_${id}`).val(0);
                }
                if(parseInt($(`input#traLai_${id}`).val()) > parseInt($(`input#quantity_${id}`).val())){
                    alert('Không được trả lại lớn hơn số lượng đã đặt');
                    let updateTotalRow = $(`input#quantity_${id}`).val() * $(`input#priceSale_${id}`).val();
                    $(`input#traLai_${id}`).val(0);
                    $(`td#${id}`).text(new Intl.NumberFormat().format(updateTotalRow));
                }else {
                    let updateTotalRow = (parseInt($(`input#quantity_${id}`).val()) - parseInt($(`input#traLai_${id}`).val())) * $(`input#priceSale_${id}`).val();
                    updateTotalRow = updateTotalRow < 1 ? 0 : updateTotalRow;
                    $(`td#${id}`).text(new Intl.NumberFormat().format(updateTotalRow));
                }
                getTotal();
            });
        // var deleteFormAction;
        // $('.delete').on('click', function (e) {
        //     var form = $('#delete_form')[0];

        //     if (!deleteFormAction) {
        //         // Save form action initial value
        //         deleteFormAction = form.action;
        //     }

        //     form.action = deleteFormAction.match(/\/[0-9]+$/)
        //         ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
        //         : deleteFormAction + '/' + $(this).data('id');

        //     $('#delete_modal').modal('show');
        // });

        function printManagerBill(){
            $.ajax({
                type: "GET",
                url: "{{route('cate.active', ['id' => $dataTypeContent->id, 'tableId' => $dataTypeContent->id_ban])}}",
                success: function(data)
                {
                    if (data.success == true){
                        window.location.href = data.url;
                    }
                }
            });
        }
    </script>
@stop
