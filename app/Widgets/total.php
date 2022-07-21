<?php

namespace App\Widgets;

use App\Models\ManageBill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class Total extends BaseDimmer
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
        $total_day = ManageBill::where('status','=', '1')
            ->whereDate('updated_at', '=', Carbon::now()->toDateString())
            ->sum('total_price');
            
        $total_month = ManageBill::where('status','=', '1')
            ->whereYear('updated_at', '=', Carbon::now()->year)
            ->whereMonth('updated_at', '=', Carbon::now()->month)
            ->sum('total_price');
            // dd(Carbon::now()->month);
            
        $total_year = ManageBill::where('status','=', '1')
            ->whereYear('updated_at', '=', Carbon::now()->year)
            ->sum('total_price');
            // dd(Carbon::now()->year);
            // dd($total_year);
            
        $total = ManageBill::where('status','=', '1')
            ->sum('total_price');
            // dd(Carbon::now()->year);
            // dd($total);
        
        return view('voyager::widgets.total', compact(
            'total_day',
            'total_month',
            'total_year',
            'total'
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
