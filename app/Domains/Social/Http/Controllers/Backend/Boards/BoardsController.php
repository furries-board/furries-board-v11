<?php

namespace App\Domains\Social\Http\Controllers\Backend\Boards;

use App\Domains\Social\Requests\Backend\Boards\StoreBoardsRequest;
use App\Domains\Social\Models\Boards;
use App\Domains\Social\Services\BoardsService;
use App\Http\Controllers\Controller;

/**
 * Class BoardsController.
 */
class BoardsController extends Controller
{

    /**
     * @var BoardsService
     */
    protected $boardsService;

    /**
     * BoardsController constructor.
     *
     * @param BoardsService $boardsService
     */
    public function __construct(BoardsService $boardsService)
    {
        $this->boardsService = $boardsService;
    }

}