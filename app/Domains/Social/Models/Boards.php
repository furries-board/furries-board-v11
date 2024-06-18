<?php

namespace App\Domains\Social\Models;

use App\Domains\Social\Models\Traits\Scope\BoardsScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Boards.
 * #TODO <complete the content of the this model>
 */
class Boards extends Model
{

    use BoardsScope;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = '';

    /**
     * The primary key in this model.
     * 
     * @var string
     */
    protected $primaryKey = '';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillabel = [
        '',
    ];
}