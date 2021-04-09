<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Models\ParkingDetails;
use DB;
class smartParkingController extends Controller
{

    public function freeslot(Request $request){
        try{
            DB::beginTransaction();
            $count=0;
            $freeSlots=GeneralSettings::where('id','1')->get('freeSlots');
            $af= $freeSlots[0]->freeSlots;
            $aaa=json_decode($af);
            foreach ($aaa as $key=>$aa)
            {
                if($aa=='1')
                {
                    $freeSlotAvailable=$key;
                    $count++;
                }
            }
            if($count>0)
            {
            $insert = ParkingDetails::create([
                'carNumber' => $request->carNumber,
                'Type' => $request->Type,
                'slotNumber'=>$freeSlotAvailable
            ]);
            $insert->save();
            DB::commit();
            return response()->json(['statuscode' => '200','freeslot' => $freeSlotAvailable]);
            }
            else{
                //return "zX";
                return response()->json(['message' => "No slot Available...Please Visit later", 'statuscode' => '201']);

            }
        }
        catch(\Exception $e){
            DB::rollback();
            return $e;
        }
    }

    public function adminView(Request $request){
        try{
            $view = ParkingDetails::all();
            return view('adminView',['views'=>$view]);
        }
        catch(\Exception $e){
            return $e;
        }
    }
    public function enterSlot(Request $request)
    {
    try{
    $slot = (object) null;
    $freeSlots=GeneralSettings::where('id','1')->get('freeSlots');
    $af= $freeSlots[0]->freeSlots;
    $aaa=json_decode($af);
    //echo gettype($aaa);
    foreach ($aaa as $key=>$aa)
    {
        if($key=='i'.$request->num){
            $slot->$key=$request->sensorValue;
        }
    }
    $ffs = get_object_vars($slot);
    $fffs = json_encode($ffs);
    $freeSlots=GeneralSettings::where('id','1')->update(['freeSlots' => $fffs]);
    $carSearch= ParkingDetails::where('slotNumber','i'.$request->num)
                    ->where('entryTime','')
                    ->update(['entryTime',date('h:i:s')]);
    }

    catch(\Exception $e){
        return $e;
   }

    }
    public function exitSlot(Request $request)
    {
        try{
        $slot = (object) null;
        $freeSlots=GeneralSettings::where('id','1')->get('freeSlots');
        $af= $freeSlots[0]->freeSlots;
        $aaa=json_decode($af);
       // echo gettype($aaa);
        foreach ($aaa as $key=>$aa)
        {
            if($key=='i'.$request->num){
                $slot->$key=$request->sensorValue;
            }
        }
        $ffs = get_object_vars($slot);
        $fffs = json_encode($ffs);
        $freeSlots=GeneralSettings::where('id','1')->update(['freeSlots' => $fffs]);
        $carSearch= ParkingDetails::where('slotNumber','i'.$request->num)
                        ->where('exitTime','')
                        ->update(['exitTime',date('h:i:s')]);
        }

        catch(\Exception $e){
            return $e;
       }

    }

}