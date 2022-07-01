<x-app-layout>
    <div>
        <h1 style="color:#f33b0d; font-weight: bold;font-size:40px; text-align: center;padding-top:3em">Danh sách bàn đặt</h1>
    </div>
    <div class="col-md-12">
        <div class="row">
            @foreach ($data as $item)
                <div class='col-md-3 custom_table' >
                    <div class='table__item'>
                        <a href='{{route('danhsach',$item->id)}}' class='table__link'>
                            <img src="\image\icon_banan2.png" alt="">
                            <div style="text-align:center; text-transform: uppercase;font-weight: 600;color: #ff7600;">{{$item->name}}
                            </div>
                        
                        @if ($item->status == 1)
                        <p style="color: white;position: absolute;top: 0.1em;right: 0.1em;padding: 5px 10px; background-image: linear-gradient(red, yellow);border-radius: 10px;">Có khách</p>
                        
                        @else
                        <p style="color: white;position: absolute;top: 0.1em;right: 0.1em;padding: 5px 10px; background-image: linear-gradient(blue, green);border-radius: 10px;">Trống</p>
                        @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
<style>
    .custom_table{
        border: 1px solid black;
        width: 15em;
        height: 15em;
        margin: 5em 0em 1em 1.6em;
        box-shadow:  5px 10px #888888;
        
        /* margin: 1em auto; */
    }
</style>
