<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Resizable;

class ManageProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Resizable;
}
