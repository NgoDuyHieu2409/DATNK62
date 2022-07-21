<?php

namespace App\Http\Controllers;

use App\Models\ManageBill;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;


class AdminBookController extends VoyagerBaseController
{
    public function index(Request $request)
    {
      
        $slug = $this->getSlug($request);
        // dd($slug);
        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // $work_chats = $this->messageService->getRoomChat();
        // $room_ids = $this->messageService->getAllRoomIdByWork();

        return Voyager::view('voyager::admin-books.browse')->with(compact('dataType'));
    }
}
