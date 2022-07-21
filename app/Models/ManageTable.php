<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ManageTable extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function manage_biil()
    {
        return $this->belongsTo(ManageBill::class, 'id', 'id_ban')
            ->where('manage_bills.status', 0);
    }
}
