<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SessionServices;
use App\Http\Services\CubeServices;
use Illuminate\Support\Facades\Session;

class CubeController extends Controller
{
    public function index()
    {
        $session = new SessionServices();
        $session->finishSession();
        $cube = $session->getCube();
        return view('cube.index')->with(['cube' => $cube ]);
    }

    public function indexPartial()
    {
        $session = new SessionServices();
        $cube = $session->getCube();
        if($cube){
            $m = $cube->getM();
            $n = $cube->getN() + 1;
        }
        else{
            $m = null;
            $n = null;
        }
        return view('cube.indexPartial')->with([ 'm' => $m, 'n' => $n ]);
    }

    public function create(Request $request)
    {
        $input = $request->only('test');
        return view('cube.create')->with(['test' => $input['test']]);
    }

    public function createCube(Request $request)
    {
        $session = new SessionServices();
        $input = $request->only('m', 'n');
        $cube = new CubeServices($input['n'], $input['m']);
        $session->setCube($cube);
        $session->setOperation(0);
        return redirect()->action('CubeController@indexPartial');
    }

    public function update(Request $request)
    {
        $session = new SessionServices();
        $cube = $session->getCube();
        $input = $request->only('x', 'y', 'z', 'value');
        $cube->update($input['x'] - 1, $input['y'] - 1, $input['z'] - 1, $input['value']);
        return response()->json(['success' => true]);
    }

    public function query(Request $request){
        $session = new SessionServices();
        $cube = $session->getCube();
        $input = $request->only('x1', 'x2', 'y1', 'y2', 'z1', 'z2');
        return response()->json(['result' => $cube->query($input['x1']-1, $input['y1']-1, $input['z1']-1, $input['x2']-1, $input['y2']-1, $input['z2']-1)]);
    }

    private function checkCube($cube)
    {
        $session = new SessionServices();
        if ($session->getOperation() >= $cube->getM()) {
            $session->setCube(null);
            return false;
        } else {
           $session->setOperation($session->getOperation() + 1);
        }
        return true;
    }
}
