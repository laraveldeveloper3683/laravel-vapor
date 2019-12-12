<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\models\Run;
use App\models\Well;
use App\models\Observation;

class DataController extends Controller
{
    public function index()
    {
      return view('insertData.data-insert-form');
    }
    public function store(Request $request)
    {
      // return $request->all();
      // now insert the data in the Database
      // return $request->json_data['observations'];
      // foreach ($request->json_data['wells'] as $key => $value) {
      //   print_r($value['well_name']);
      // }
      // exit();
      for ($i=0; $i < $request->counter; $i++) {
        // first create new runs
        $runs = new Run();
        $runs->user_id = auth()->user()->id;
        $runs->last_modified_by_user_name = auth()->user()->name;
        $runs->run_name = $request->json_data['run_info']['run_name'];
        $runs->runs_uuid = Str::uuid();
        $runs->save();
        // now get the last inserted runs table data
        $last_runs_table_data = Run::latest()->first();
        // return $last_runs_table_data;
        // now insert in wells table
        foreach ($request->json_data['wells'] as $key => $value) {
          $wells = new Well();
          $wells->run_id = $last_runs_table_data->id;
          $wells->well_uuid = Str::uuid();
          $wells->well_name = $value['well_name'];
          $wells->run_uuid = $last_runs_table_data->runs_uuid;
          $wells->position = isset($value['position']) ? $value['position'] : null;
          $wells->extraction_instrument = $value['extraction_instrument'];
          $wells->extraction_instrument_uuid = $value['extraction_instrument_uuid'];
          $wells->extraction_machine_uuid = $value['extraction_machine_uuid'];
          $wells->extraction_well_name = $value['extraction_well_name'];
          $wells->extraction_well_uuid = $value['extraction_well_uuid'];
          $wells->lims_status_enum = $value['lims_status_enum'];
          $wells->mix_uuid = $value['mix_uuid'];
          $wells->patient_id = $value['patient_id'];
          $wells->specimen_tag = $value['specimen_tag'];
          $wells->specimen_type = $value['specimen_type'];

          $wells->rules =  json_encode($value['rules']);
          $wells->re_extract =  $value['re_extract'];
          $wells->quantity_multiplier = (string) $value['quantity_multiplier'];
          $wells->marked_for_reextraction =  $value['marked_for_reextraction'];
          $wells->is_crossover = $value['is_crossover'];
          $wells->is_flagged = $value['is_flagged'];
          $wells->exclude = $value['exclude'];
          $wells->export_date = $value['export_date'];
          $wells->extraction_date = $value['extraction_date'];
          $wells->save();




        }
        // // now get the last wells table data
        // $last_wells_table_data = Well::latest()->limit(count($request->json_data['wells']))->get();
        //
        //
        // // now insert data in observation table
        // foreach ($request->json_data['observations'] as $key => $value) {
        //   // code...
        //   $observation = new Observation();
        //   foreach ($last_wells_table_data as $data) {
        //     // code...
        //     $observation->observation_uuid = Str::uuid();
        //     $observation->well_uuid = $data->well_uuid;
        //     $observation->target = null;
        //     $observation->readings =  json_encode($value['readings']);
        //     $observation->azure_classification = (string) $value['azure_classification'];
        //     $observation->azure_ct = (string) $value['azure_ct'];
        //     $observation->classification = (string) $value['classification'];
        //     $observation->ct = (string) $value['ct'];
        //     $observation->exposed_analysis_results = isset($value['exposed_analysis_results']) ? $value['exposed_analysis_results'] : null;
        //     $observation->machine_classification = (string) $value['machine_classification'];
        //     $observation->machine_ct = (string) $value['machine_ct'];
        //     $observation->mix_channel_uuid = (string) $value['mix_channel_uuid'];
        //     $observation->obs_uuid = $value['obs_uuid'];
        //     $observation->rfu = isset($value['rfu']) ? $value['rfu'] : null;
        //     $observation->rules = isset($value['rules']) ? $value['rules'] : null;
        //     $observation->rules_classification = isset($value['rules_classification']) ? $value['rules_classification'] : null;
        //     $observation->rules_ct = isset($value['rules_ct']) ? $value['rules_ct'] : null;
        //     $observation->settings = isset($value['settings']) ? $value['settings'] : null;
        //     $observation->template_channel_tags = isset($value['template_channel_tags']) ? $value['template_channel_tags'] : null;
        //     $observation->calculated_quantity = isset($value['calculated_quantity']) ? $value['calculated_quantity'] : null;
        //     $observation->save();
        //   }
        // }




      }

      return response()->json(['status' => 'inserted']);


    }
}
