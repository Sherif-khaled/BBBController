<?php

namespace BBBController\Http\Controllers;

use Illuminate\Http\Request;
use BBBController\Helpers\Converter;
use BBBController\Helpers\CMD;
use DataTables;
class RecordController extends Controller
{
    public function __construct()
    {

    }

    public function show(){

        $records = [];

        $records_path = base_path("tests/record/");

        $dir = new \DirectoryIterator($records_path);
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                array_push($records,$dir->getFilename());
            }
        }


        $records_info = [];


        foreach ($records as $info){
            $xmldata = simplexml_load_file($records_path . $info ."/metadata.xml") or die("Failed to load");

            $r_info = array(
                "id" => (string)$xmldata->id,
                "start_time" => Converter::millisecondsToDate((int)$xmldata->start_time),
                "end_time" => Converter::millisecondsToDate((int)$xmldata->end_time),
                "meeting_name" => (string)$xmldata->meta->meetingName,
                "recording_name" => (string)$xmldata->meta->{'bbb-recording-name'},
                "bbb_origin" => (string)$xmldata->meta->{'bbb-origin'},
                "meeting_id" => (string)$xmldata->meta->meetingId,
                "record_format" => (string)$xmldata->playback->format,
                "record_link" => (string)$xmldata->playback->link,
                "record_duration" => Converter::millisecondsToDate((int)$xmldata->playback->duration),
                "record_size" => (string)$xmldata->playback->size,
            );

            array_push($records_info,$r_info);
        }


        return view('records.show',compact('records_info','records'));
    }
    public function getRecords(){
        $columns= ['id', 'meeting_id', 'email'];

    }
    public function recordDetails($record_id){


    }
    public function delete($meeting_id){

        $result = CMD::deleteRecord($meeting_id);
        return response()->json('success');
    }
    public function deleteAll(){

    }
}
