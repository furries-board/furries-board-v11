<?php

namespace App\Domains\Social\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Domains\Social\Models\Boards;
use App\Services\BaseService;

/**
 * Class BoardsService.
 *
 * @extends BaseService
 */
class BoardsService extends BaseService
{

    /**
     * BoardsService constructor.
     *
     * @param Boards $boards
     */
    public function __construct(Boards $boards)
    {
        $this->model = $boards;
    }

    /**
     * @param array $data
     * 
     * @return Boards
     * @throws Exception
     * @throws \Throwable
     */
    public function store(array $data = []): Boards
    {
        DB::beginTransaction();

        try {

        } catch (Execption $e) {
            DB::rollBack();
            throw new Exception('');
        }

        DB::commit();
    }

    /**
     * #REMARK 預備給如果需要變換字型或者背景
     * @param array $data
     *
     * @return Boards
     */
    protected function createBoards(array $data = []): Boards
    {
        return $this->model->create([

        ]);
    }

}