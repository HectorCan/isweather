<?php

namespace App\Http\Controllers\Sensor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Humidity;
use App\Repositories\Light;
use App\Repositories\Pressure;
use App\Repositories\Temperature;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function __construct()
    {
      //$this->middleware('auth');
    }

    public function index()
    {
      return view('sensor.index', [
        'humidity'    => Humidity::orderBy('created_at', 'desc')->first(),
        'light'       => Light::orderBy('created_at', 'desc')->first(),
        'temperature' => Temperature::orderBy('created_at', 'desc')->first(),
        'pressure'    => Pressure::orderBy('created_at', 'desc')->first(),
      ]);
    }

    public function test(Request $request)
    {
      return response()->json(['m' => 'test ok'], 200);
    }

    public function ChartData(Request $request) {
      $response = [
        'h' => Humidity::orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->limit(10)->get(),
        'l' => Light::orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->limit(10)->get(),
        't' => Temperature::orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->limit(10)->get(),
        'p' => Pressure::orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->limit(10)->get(),
      ];

      return response()->json($response, 200);
    }

    public function saveSensorData(Request $request)
    {
      if (isset($request->light) && isset($request->humidity) && isset($request->temperature) && isset($request->pressure))
      {
        $today = new Carbon();

        $ligth = new Light;
        $ligth->value = $request->light;
        $ligth->date = $today->format('Y-m-d');
        $ligth->save();

        $humidity = new Humidity;
        $humidity->value = $request->humidity;
        $humidity->date = $today->format('Y-m-d');
        $humidity->save();

        $temperature = new Temperature;
        $temperature->value = $request->temperature;
        $temperature->date = $today->format('Y-m-d');
        $temperature->save();

        $pressure = new Pressure;
        $pressure->value = $request->pressure;
        $pressure->date = $today->format('Y-m-d');
        $pressure->save();

        return response()->json(['m' => 'Se han guardado los datos'], 200);
      }

      return response()->json(['m' => 'Faltan datos'], 422);
    }

    public function sendNotification(Request $request)
    {
      $now = new Carbon();

      $t = DB::table('weathernotifications')->whereDate('on', '>=', $now->format('Y-m-d H:i:s'))->where('status', 0)->orderBy('on', 'asc')->first();

      if ($t->id)
      {
        DB::table('weathernotifications')->where('id', $t->id)->update(['status' => 1]);

        return response()->json(['v' => true], 200);
      }

      return response()->json(['v' => false], 422);
    }
}
