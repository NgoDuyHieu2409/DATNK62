@extends('voyager::master')

@section('page_title', __('voyager::generic.view') . 'HieuND')

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <!-- form start -->
                    <h2>BÀN : {{ $dataTypeContent->id_ban }}</h2>
                    <p class="mt-3">Thời gian :<?= date('H:i:s') ?> </p>
                    <p>Ngày :<?= date('d-m-Y') ?> </p>
                    <p>Người lập hoá đơn :{{ !empty($dataTypeContent->user)?$dataTypeContent->user->name : ''}}</p>
                    <form action="{{route("admin.manage-bills.updateOrderDetail", $dataTypeContent->id)}}" method="POST">
                        {{-- @method('PUT') --}}
                        @csrf
                        <table class="table table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên món</th>
                                    <th>Số lượng</th>
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
                                @php
                                   
                                @endphp
                                    <?php $total_price[] = $detail->quantyti * $detail->price_sale; ?>
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $detail->product_name }}</td>
                                        <td><input name="quantity[{{$detail->id}}]" class="quantity" id="quantity_{{$detail->id}}" type="hidden" value="{{ $detail->quantyti }}">{{ $detail->quantyti }}</td>
                                        <td class="text-left"><input name="tralai[{{$detail->id}}]" class="traLai" id="traLai_{{$detail->id}}" data-id="{{  $detail->id }}" min="0" type="number" value="0"></td>
                                        <td><input class="priceSale" id="priceSale_{{$detail->id}}" type="hidden" value="{{ $detail->price_sale }}">{{ $detail->price_sale }}</td>
                                        <td id="{{  $detail->id }}">{{$detail->quantyti*$detail->price_sale}}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <h4>Tổng tiền : <span  id="tongtien">{{number_format(array_sum($total_price), 0, '.', '.')}}</span> VNĐ</h4>
                        <input type="hidden" name="total_price" value="{{number_format(array_sum($total_price), 0, '.', '.')}}">
                        <div class="container">
                            <button class="btn btn-danger mt-5" type="submit">Cập nhật</button>
                            <a class="btn btn-success mt-5" href="{{route('cate.active', ['id' => $dataTypeContent->id, 'tableId' => $dataTypeContent->id_ban])}}">Thanh toán</a>
                        </div>
                    </form>
                </div>
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
        $('input.traLai').on('change', function(){
                let id = $(this).data('id');
                if(parseInt($(`input#traLai_${id}`).val()) > parseInt($(`input#quantity_${id}`).val())){
                    alert('khong dc tra lai lown hown goc');
                    let updateTotalRow = $(`input#quantity_${id}`).val() * $(`input#priceSale_${id}`).val();
                    $(`input#traLai_${id}`).val(0);
                    $(`td#${id}`).text(updateTotalRow);
                }else {
                    let updateTotalRow = (parseInt($(`input#quantity_${id}`).val()) - parseInt($(`input#traLai_${id}`).val())) * $(`input#priceSale_${id}`).val();
                    updateTotalRow = updateTotalRow < 1 ? 0 : updateTotalRow;
                    $(`td#${id}`).text(updateTotalRow);
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

    </script>
@stop
