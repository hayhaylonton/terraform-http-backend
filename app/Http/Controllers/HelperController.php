<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class HelperController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Helper"},
     *   path="/api/run-migrations",
     *   summary="Summary",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function run_migrations()
    {
        return Artisan::call('migrate', ["--force" => true ]);
    }

    /**
     * @OA\Get(
     *   tags={"Helper"},
     *   path="/api/run-db-seed",
     *   summary="Summary",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function run_db_seed()
    {
        return Artisan::call('db:seed');
    }
}
