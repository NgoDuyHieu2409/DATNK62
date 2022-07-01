
<x-app-layout>
    <div class="container" style="margin: 0 auto !important;">

        <div class="clearfix" style="height: 100px;"></div>
        <div class="row">
            <div class="col-xs-5">
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
                            <button class="btn btn-success" type="submit">Gửi thực đơn</button>
                            <button class="btn btn-danger delete_all" type="button">Xóa tất cả</button>
                        </div>
                    </form>
                {{-- @endforeach --}}

            </div>
            <div class="col-xs-7">
                @foreach ($data as $category)
                
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-red-600 font-semibold" style="font-size:40px;">
                                {{$category->name}}
                            </h1>
                        </div>
                        @foreach ( $category->products as $product )
                            <div class="col-xs-4">
                                
                                <a href="javascript:0" class="select_product" id="select_product" data-id={{$product->id}}>
                                    <input type="text" hidden class="sanpham-{{$product->id}}" name="" id="" value="{{$product->name}}" >
                                    <img class="img-fluid" src="{{Voyager::image($product->thumbnail('cropped'))}}" alt="">
                                    <span style="margin-left:75px"> {{$product->name}}</span>
                                    <br>
                                    <span><del>{{$product->price}}VND</del></span>
                                    <span style="float: right; color:red">{{$product->sale}}VND</span>
                              </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
    <script>
        $(document).ready(function(){
            let idx = 0;
            $(".select_product").click(function(){
                var productId = $(this).data('id');
                let productName = $(this).find(".sanpham-" + productId).val();
                let totalProduct = $(this).find(".totalProduct").val();
                let check = false;
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
                                + '<td id="calProduct"><input type="number" min="1" name="product['+idx+'][total]" class="totalProduct" id="totalProduct' + productId +'" value="1" ><input type="hidden" name="product['+idx+'][id]" value="'+productId+'"></td>'
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
            });
        });


    </script>

