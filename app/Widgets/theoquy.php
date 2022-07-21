<?php

namespace App\Widgets;

use App\Models\ManageBill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Theoquy extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Voyager::model('Post')->count();
        $string = trans_choice('voyager::dimmer.post', $count);
        // $total_day = ManageBill::where('status','=', '1')
        //     ->whereDate('updated_at', '=', Carbon::now()->toDateString())
        //     ->sum('total_price');
        
        $result= [];
        // $quy = [];
        $quy1 = 0;
        $quy2 = 0;
        $quy3 = 0;
        $quy4 = 0;
        for ($i=1; $i < 13 ; $i++) {
            $total_month = ManageBill::where('status','=', '1')
            ->whereMonth('updated_at', '=', $i)
            ->sum('total_price');
            // dd($total_month);
            $result[$i]= $total_month;
            switch ($i) {
                case $i <=3:
                    $quy1 +=$total_month;
                    break;
                case 3 < $i && $i <= 6:
                    $quy2 +=$total_month;
                    break;
                case 6 < $i && $i <= 9:
                    $quy3 +=$total_month;
                    break;
                
                default:
                    $quy4 +=$total_month;
                    break;
            }
            
            
        }
        // dd($quy3);
        // dd($result);
        // $total_year = ManageBill::where('status','=', '1')
        //     ->whereYear('updated_at', '=', Carbon::now()->year)
        //     ->sum('total_price');
        //     // dd(Carbon::now()->year);
        //     // dd($total_year);
          
        $total = ManageBill::where('status','=', '1')
            ->sum('total_price');

        
        return view('voyager::widgets.theoquy', compact(
            // 'total_day',
            'quy1',
            'quy2',
            'quy3',
            'quy4',
            // 'total_year',
            // 'total',
            'result'
        ));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Post'));
    }
}