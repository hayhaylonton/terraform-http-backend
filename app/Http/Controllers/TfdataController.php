<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Log;
use App\Models\Tfdata;
use App\Models\Tflock;
use Illuminate\Support\Str;
use Response;


class TfdataController extends Controller
{
    public function lock(Request $request)
    {
        Log::info("lock");

        $data = $request->json()->all();
        $data_lock = request()->getContent();
        Log::info($data);

        $lockid = $data["ID"];
        $tflock = Tflock::where([
            ["lockid", "=", $lockid]
        ])->Where([
                ["user_id", "=", Auth::user()->getAuthIdentifier()]
            ])->get();

        if ($tflock->count() > 0) {
            return response($tflock[0]->lock, 409);
        }

        $row = new Tflock();
        $row->user_id = Auth::user()->getAuthIdentifier();
        $row->lock = $data_lock;
        $lockid = $data["ID"];
        $row->lockid = $lockid;

        Log::info($row);
        $row->save();
        return response(null, 200);
    }

    public function unlock(Request $request)
    {
        Log::info("unlock");
        $data = $request->json()->all();
        $lockid = $data["ID"];
        $tflock = Tflock::where([
            ["lockid", "=", $lockid]
        ])->orWhere([
                ["user_id", "=", Auth::user()->getAuthIdentifier()]
            ])->first();
        Log::info($tflock);
        $tflock->delete();
        return response(null, 200);
    }

    public function fetched(Request $request)
    {
        Log::info("fetched");
        Log::info($request);
        $row = Tfdata::Where([
            ["user_id", "=", Auth::user()->getAuthIdentifier()]
        ])->get();

        if ($row->count() > 0) {
            $data = $row[0]->data;
            Log::info($data);
            return response($row[0]->data, 200);
        }
        return response(null, 404);
    }

    public function updated(Request $request)
    {
        Log::info("updated");
        $data = $request->json()->all();
        $data_state = request()->getContent();
        $lock_id = $request->query("ID");
        $tflock = Tflock::where([
            ["lockid", "<>", $lock_id]
        ])->Where([
                ["user_id", "=", Auth::user()->getAuthIdentifier()]
            ])->get()->count();

        if ($tflock > 0) {
            Log::info($tflock);
            return response($tflock[0]->lock, 423);
        }
        $row = Tfdata::Where([
            ["user_id", "=", Auth::user()->getAuthIdentifier()]
        ])->first();

        if ($row <> null) {
            $row->data = $data_state;
            $row->update();
            return response(null, 200);
        }


        log::info($data);
        $row = new Tfdata;
        $row->user_id = Auth::user()->getAuthIdentifier();
        $row->data = $data_state;
        $row->save();
        return response(null, 200);
    }
    public function purged(Request $request)
    {
        Log::info("purged");
        $row = Tfdata::Where([
            ["user_id", "=", Auth::user()->getAuthIdentifier()]
        ])->first();

        if ($row <> null) {
            $row->delete();
            return response(null, 200);
        }


        $row = new Tfdata;
        $row->user_id = Auth::user()->getAuthIdentifier();
        $row->save();
        return response(null, 200);
    }
}