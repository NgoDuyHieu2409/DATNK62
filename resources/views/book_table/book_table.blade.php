<style>
    .scroll_product{
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
                {{-- @foreach ($data1 as $table ) --}}
                    <h1 class="text-center text-red-600 font-semibold" style="font-size:40px;">
                        Danh Sách Món {{$table->name}}
                    </h1>
                    <form action="{{route('saveproduct',$table->id)}}" method="POST">
                        @csrf
                        <input type="text" hidden name="ban_id" class="" id="" value="{{$table->id}}">
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
                                        <tr>
                                            <td >{{$value['name']}}</td>
                                            <td >{{$value['quantyti']}}</td>  
                                            <td >{{$value['quantyti'] * $value['sale']}}</td>                                      
                                        </tr>
                                    @endforeach
                                {{-- <tr> --}}
                                    {{-- <td id="nameProduct" class="product-name"></td>
                                    <td id="calProduct">
                                        <input type="text" hidden class="totalProduct" >
                                    </td> --}
                                {{-- </tr> --}}
                                <tr>
                                    <td>Tổng tiền: {{ number_format(array_sum($total_price), 0, '.', '.') }} VND</td>                                    
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div>
                            <button class="btn btn-success btn_send_order" type="submit" disabled>Gửi thực đơn</button>
                            <button class="btn btn-danger delete_all btn_send_order" disabled type="button">Xóa tất cả</button>
                        </div>
                    </form>
                {{-- @endforeach --}}

            </div>
            <div class="col-xs-7 scroll_product">
                @foreach ($data as $category)
                    <div class="row" id="{{ $category->slug }}">
                        <div class="col-xs-12 mt-8">
                            <h1 class="text-red-600 font-semibold" style="font-size:40px;">
                                {{$category->name}}
                            </h1>
                        </div>
                        
                        @foreach ( $category->products as $product)
                            @if ($product->status == 1)
                                
                            <div class="col-xs-4 mb-4">
                                
                                <a href="javascript:0" class="select_product" id="select_product" data-id={{$product->id}} data-price={{$product->sale ?? $product->price}}>
                                    <input type="text" hidden class="sanpham-{{$product->id}}" name="" id="" value="{{$product->name}}" >
                                    <img class="img-fluid" src="{{Voyager::image($product->thumbnail('cropped'))}}" alt="">
                                    <span style="display: flex; justify-content: center; padding: 10px 0px;"> {{$product->name}}</span>
                                    <button style=" justify-content: right;" class="btn btn-success">Thêm món</button>
                                    <span><del>{{number_format($product->price, 0, '.', '.')}}VND</del></span>
                                    <span style="float: right; color:red">{{number_format($product->sale, 0, '.', '.')}}VND</span>
                                </a>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
    <script>
        $(document).ready(function(){
            let height = window.innerHeight;
            let menu = $('.clearfix').height();
            $('.fix_table').height(height - menu);

            let idx = 0;
            $(".select_product").click(function(){
                var productId = $(this).data('id');
                var price = $(this).data('price');
                let productName = $(this).find(".sanpham-" + productId).val();
                let totalProduct = $(this).find(".totalProduct").val();
                let check = false;
                $('.btn_send_order').prop('disabled', false);
                $('.table_product').find('tr').each(function(){
                    if ($(this).hasClass('product-'+ productId)) {
                        $(this).find('#totalProduct'+ productId).val( parseInt($(this).find('#totalProduct'+ productId).val())+1);
                        check =true;
                        return false;
                    }
                });
                if(check == false){
                    idx++;
                    let classNameId = '';
                    var html = '<tr class="product product-'+productId+'">'
                                + '<td class="product-name" name="nameProduct">' + productName + '</td>'
                                + '<td class="product-id" hidden>' + productId + '</td>'
                                + '<td id="calProduct"><input type="number" min="1" name="product['+idx+'][total]" class="totalProduct" id="totalProduct' + productId +'" value="1" >'
                                    +'<input type="hidden" name="product['+idx+'][id]" value="'+productId+'">'
                                    +'<input type="hidden" name="product['+idx+'][price]" value="'+price+'">'
                                    +'</td>'
                                + '<td> <button type="button" data-id="'+productId+'" class="btn btn-danger remove">Xóa</button> </td> </tr>';
                                $('#list-product').append(html);
 
                    
                }
            });
            $('body').on('click', '.remove', function(){
                let productId = $(this).data('id');
                $('.product-' + productId).remove();
            });
            $('body').on('click', '.delete_all', function(e){
                e.preventDefault();
                $('#list-product').find('tr.product').remove();
                $('.btn_send_order').prop('disabled', true);
            });
        });


    </script>

