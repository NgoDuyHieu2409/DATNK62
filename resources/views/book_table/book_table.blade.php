<style>
    .scroll_product {
        position: absolute !important;
        top: 10rem;
        right: 0px;
    }

    .fix_table {
        position: fixed !important;
        top: 10rem;
        left: 0px;
    }
</style>
<x-app-layout>
    <div class="container" style="margin: 0 auto !important;">

        <div class="clearfix" style="height: 10rem;"></div>
        <div class="row">
            <div class="col-xs-5 mt-8 fix_table" style="padding-bottom: 4rem;overflow-y: scroll;">
                {{-- @foreach ($data1 as $table) --}}
                <h1 class="text-center text-red-600 font-semibold" style="font-size:40px;">
                    Danh Sách Món {{ $table->name }}
                </h1>
                <form action="{{ route('saveproduct', $table->id) }}" method="POST">
                    @csrf
                    <input type="text" hidden name="ban_id" class="" id=""
                        value="{{ $table->id }}">
                    <table class="table table_product">
                        <thead class="thead-light">
                            <tr>
                                <th>Tên món</th>
                                <th>Số lượng</th>
                                <th>Giá tiển</th>
                            </tr>
                        </thead>
                        <tbody id="list-product">
                            @if (!empty($order))
                                @foreach ($order as $value)
                                    <?php $total_price[] = $value['quantyti'] * $value['sale']; ?>
                                    <tr class="order_product">
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['quantyti'] }}</td>
                                        <td>{{ number_format($value['quantyti'] * $value['sale'], 0, '.', '.') }}</td>
                                    </tr>
                                @endforeach
                              
                                <tr>
                                    <td class="tongtien" colspan="3">Tổng tiền:<br>
                                        {{ number_format(array_sum($total_price), 0, '.', '.') }} VND
                                        <input type="hidden" id="totalPriceOld" value="{{ array_sum($total_price) }}">

                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="dukientong">
                                        <td>Tổng tiền dự kiến:
                                        <h1 class="totalPriceExpect"></h1>
                                        </td>
                                    </td>
                                </tr> --}}
                            @endif
                        </tbody>
                    </table>
                    <div>
                        <button class="btn btn-success btn_send_order" type="submit" disabled>Gửi thực đơn</button>
                        <button class="btn btn-danger delete_all btn_send_order" disabled type="button">Xóa tất
                            cả</button>
                    </div>
                </form>
                {{-- @endforeach --}}

            </div>
            <div class="col-xs-7 scroll_product mb-5">
                @foreach ($data as $category)
                    <div class="row" id="{{ $category->slug }}">
                        <div class="col-xs-12 mt-8">
                            <h1 class="text-red-600 font-semibold" style="font-size:40px;">
                                {{ $category->name }}
                            </h1>
                        </div>

                        @foreach ($category->products as $product)
                            @if ($product->status == 1)
                                <div class="col-xs-4 mb-5 mt-8">
                                    <a href="javascript:0" class="select_product" id="select_product"
                                        data-id={{ $product->id }}
                                        data-price={{ $product->sale ?? $product->price }}>
                                        <input type="text" hidden class="sanpham-{{ $product->id }}" name=""
                                            id="" value="{{ $product->name }}">
                                        <img class="img-fluid"
                                            src="{{ Voyager::image($product->thumbnail('cropped')) }}" alt="">
                                        <span style="display: flex; justify-content: center; padding: 10px 0px;">
                                            {{ $product->name }}</span>
                                            <div class="row">
                                            <div class="col-xs-6"><span>
                                                @if ($product->sale != 0)
                                                    <del>{{ number_format($product->price, 0, '.', '.') }}VND</del>
                                                @endif
                                            </span></div>
                                            <div class="col-xs-6"><span style="float: right; color:red">
                                                @if ($product->sale == 0)
                                                    {{ number_format($product->price, 0, '.', '.') }}VND
                                                @else
                                                    {{ number_format($product->sale, 0, '.', '.') }}VND
                                                @endif
                                            </span></div>
                                        </div>
                                        <button style=" justify-content: center;float:left" class="btn btn-success">Thêm món</button>
                                    </a>
                                    <input type="hidden" id="price-{{ $product->id }}" value="{{ $product->sale }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Tổng tiền dự kiến<h1 class="totalPriceExpect"></h1> --}}
    </div>
</x-app-layout>
<script>
    function abc() {
        var totalPriceOld = $('input#totalPriceOld').val() > 0 ? $('input#totalPriceOld').val() : 0;
        if ($('input.totalProduct').length > 0) {
            const totalProduct = $('input.totalProduct');
            var total = 0;
            for (let i = 0; i < totalProduct.length; i++) {
                let tmpId = $(totalProduct[i]).data('id');
                total += $(totalProduct[i]).val() * $(`input#price-${tmpId}`).val();
            }
            total = parseInt(total) + parseInt(totalPriceOld);
            total = total.toLocaleString();

            let html = "";
            html += "<tr>";
            html += '<td class="dukientong" colspan="3">';
            html += '<p>Tổng tiền dự kiến: <h1 class="totalPriceExpect">' + total + ' VND </h1></p>';
            html += '</tr>';

            if ($(".dukientong").html() == undefined) {
                $('#list-product').append(html);
            } else {
                $('.totalPriceExpect').html(total + " VND");
            }
        } else {
            $('.totalPriceExpect').html(0);
            if (parseInt(totalPriceOld) > 0) {
                $('.totalPriceExpect').html(totalPriceOld);
                $(".dukientong").remove();
            }
        }
    }
    $(document).ready(function() {
        if ($('input#totalPriceOld').val() > 0) {
            $('.totalPriceExpect').html($('input#totalPriceOld').val());
        }
        let height = window.innerHeight;
        let menu = $('.clearfix').height();
        $('.fix_table').height(height - menu);

        let idx = 0;
        $(".select_product").click(function() {
            var productId = $(this).data('id');
            var price = $(this).data('price');
            let productName = $(this).find(".sanpham-" + productId).val();
            let totalProduct = $(this).find(".totalProduct").val();
            let check = false;
            $('.btn_send_order').prop('disabled', false);
            $('.table_product').find('tr').each(function() {
                if ($(this).hasClass('product-' + productId)) {
                    $(this).find('#totalProduct' + productId).val(parseInt($(this).find(
                        '#totalProduct' + productId).val()) + 1);
                    check = true;
                    return false;
                }
            });
            if (check == false) {
                idx++;
                let tongtien = $(".tongtien").html();
                let classNameId = '';
                var html = '<tr class="product product-' + productId + '">' +
                    '<td class="product-name" name="nameProduct">' + productName + '</td>' +
                    '<td class="product-id" hidden>' + productId + '</td>' +
                    '<td id="calProduct"><input onkeyup="abc()" data-id=' + productId +
                    ' type="number" min="1" name="product[' + idx +
                    '][total]" class="totalProduct" id="totalProduct' + productId + '" value="1" >' +
                    '<input type="hidden" name="product[' + idx + '][id]" value="' + productId + '">' +
                    '<input type="hidden" name="product[' + idx + '][price]" value="' + price + '">' +
                    '</td>' +
                    '<td> <button onclick="abc()" type="button" data-id="' + productId +
                    '" class="btn btn-danger remove">Xóa</button> </td> </tr>';

                if (tongtien == undefined) {
                    $('#list-product').prepend(html);
                } else {
                    $('#list-product .tongtien').parent().after(html);
                }
            }
            $(".dukientong").show();
            abc();
        });
        $('body').on('click', '.remove', function() {
            let productId = $(this).data('id');
            $('.product-' + productId).remove();
            abc();
        });
        $('body').on('click', '.delete_all', function(e) {
            e.preventDefault();
            $('#list-product').find('tr.product').remove();
            $('.btn_send_order').prop('disabled', true);
            abc();
        });
    });
</script>
