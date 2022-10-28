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
        Artisan::call('migrate', ["--force" => true]);
        return dd(Artisan::output());
    }

    /**
     * @OA\Get(
     *   tags={"Helper"},
     *   path="/api/run-migrations-refresh",
     *   summary="Summary",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=401, description="Unauthorized"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function run_migrations_refresh()
    {
        Artisan::call('migrate:refresh', ["--force" => true]);
        return dd(Artisan::output());

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
        Artisan::call('db:seed');
        return dd(Artisan::output());
    }
}