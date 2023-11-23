<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ $isolate->patient_id }} - {!! \Carbon\Carbon::now()->toDayDateTimeString() !!}</title>
    <style>
        .page_break { page-break-before: always; }
    </style>

    <!-- Fonts -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-md-12">
        <img class="img-fluid" src="{{ public_path('images/LOGOS.png') }}" style="width: 230px; height: 80px; position: relative; margin-right: 70px;">
       
           
            <div class="text-center small ml-3" style="position: absolute; top:0px; font-size: 10px;">
                <span><b>Research Institue for Tropical Medicine - Department of Health</b></span><br>
                <span><b>Antimicrobial Resistance Surveillance Reference Laboratory</b></span><br>
                <span>9002 Research Drive, Filinvest Corporate City, Alabang, Muntinlupa City 1781 Philippines</span><br>
                <span>T:(632) 8809-9763/8807-2328 to 32 loc. 243 | F: (632) 8809-9763</span><br>
                <span> <b>www.ritm.gov.ph | arsp.com.ph | ISO 9001:2015 Certified</b> </span><br>
            </div>

            <div class="small" style="position: absolute; top:0px; left: 800px; font-size: 10px;">
              <span><b>TRICYCLE DATA FORM</b></span><br>
              <span><b>FORM #</b></span><br>
              <span><b>REV. # 0</b></span><br>
          </div>
      
                <br><br>
               <table class="table table-condensed table-bordered small" style="font-size: 9px;">
                   <thead>
                       <tr>
                           <th colspan="12">INSTITUTE NAME: {{ Str::of($isolate->hospital->hospital_name)->upper() }}</th>
                           <th class="text-right" colspan="12">PATIENT ID: {{ $isolate->patient_id }}</th>
                       </tr> 
                       
                   </thead>
                   <tbody>
                    <tr>
                      
                  </tr>
                     <tr>
                      <th colspan="2" rowspan="2" style="background-color: #D3D3D3; color: black; text-align:center !important">PATIENT INFORMATION</th>
                       {{-- <td colspan="3">Patient ID : {{ $isolate->patient_id }}</td> --}}
                       <td colspan="4">First Name: {{ $isolate->site_isolate->patient_first_name }}</td>
                       <td colspan="4">Middle Name: {{ $isolate->site_isolate->patient_middle_name }}</td>
                       <td colspan="4">Last Name: {{ $isolate->site_isolate->patient_last_name }}</td>
                       <td colspan="5">Age: {{ $isolate->site_isolate->patient_age }}</td>
                       <td colspan="5">Sex: {{ $isolate->site_isolate->patient_sex }}</td>
                     </tr>
                     <tr>
                      {{-- <th colspan="2" style="background-color: #D3D3D3; color: black;"> </th> --}}
                      <td colspan="7">Date of Admission: {{ isset($isolate->site_isolate->date_of_admission) ? $isolate->site_isolate->date_of_admission->format('m/d/Y') : '' }}</td>
                      <td colspan="7">Ward: {{ $isolate->site_isolate->ward }}</td>
                      <td colspan="8">Attending Physician: {{ $isolate->site_isolate->attending_physician }}</td>
                     </tr>

                     <tr>
                      <th colspan="2" style="background-color: #D3D3D3; color: black; text-align:center !important">ISOLATE INFORMATION</th>
                       <td colspan="7">Specimen Type: {{ $isolate->site_isolate->specimen_type }}</td>
                       <td colspan="7">Date of Sample Collection: {{ isset($isolate->site_isolate->date_of_sample_collection) ? $isolate->site_isolate->date_of_sample_collection->format('m/d/Y') : '' }}</td>
                       <td colspan="8">Date received in ARSRL: {{ isset($isolate->site_isolate->date_received_arsrl) ? $isolate->site_isolate->date_received_arsrl->format('m/d/Y') : '' }}</td>
                     </tr>
            
                     <tr >
                      <th colspan="2" style="background-color: #D3D3D3; color: black; text-align:center !important">CULTURE RESULTS</th>
                      <td colspan="7">Bacterial Identification: {!! $isolate->site_isolate->bacterial_identification !!}</td>
                      <td colspan="7">ESBL: {{ $isolate->site_isolate->esbl }}</td>
                      <td colspan="8">Date of Testing: {{ isset($isolate->site_isolate->date_of_testing) ? $isolate->site_isolate->date_of_testing->format('m/d/Y') : '' }}</td>
                     </tr>
                    
                    
{{--                   
                     <tr>
                      <th colspan="2" style="background-color: #D3D3D3; color: black; font-size: 5px;">ANTIMICROBIAL SUSCEPTIBILITY TEST (AST) RESULTS</th>
                      <th colspan="15"></th>
                    </tr> --}}
                    <tr align="center">
                      {{-- <td colspan="6" rowspan="5" align="center"> Date of Testing : {{ isset($isolate->site_isolate->date_of_susceptibility) ? $isolate->site_isolate->date_of_susceptibility->format('m/d/Y') : '' }}</td> --}}
                      <td > </td>
                      <td>AMK</td>
                      <td>AMP</td>
                      <td>AMC</td>
                      <td>ATM</td>
                      <td>FEP</td>
                      <td>CTX</td>
                      <td>FOX</td>
                      <td>CXA</td>
                      <td>CAZ</td>
                      <td>CZO</td>
                      <td>CZA</td>
                      <td>CZT</td>
                      <td>CRO</td>
                      <td>CIP</td>
                      <td>ETP</td>
                      <td>GEN</td>
                      <td>IPM</td>
                      <td>LVX</td>
                      <td>MEM</td>
                      <td>TZP</td>
                      <td>TET</td>
                      <td>TOB</td>
                      <td>SXT</td>
                      
                    
                    </tr>
                    <tr align="center">
                      <td  rowspan="2">Disk (mm)</td>
                       <td> {{ isset($isolate->site_isolate->amk_disk) ? $isolate->site_isolate->amk_disk: '' }}</td>
                       <td> {{ isset($isolate->site_isolate->amp_disk) ? $isolate->site_isolate->amp_disk: '' }}</td>
                       <td> {{ isset($isolate->site_isolate->amc_disk) ? $isolate->site_isolate->amc_disk: '' }}</td>
                       <td> {{ isset($isolate->site_isolate->atm_disk) ? $isolate->site_isolate->atm_disk: '' }}</td>
                       <td> {{ isset($isolate->site_isolate->fep_disk) ? $isolate->site_isolate->fep_disk: '' }}</td>
                       <td> {{ isset($isolate->site_isolate->ctx_disk) ? $isolate->site_isolate->ctx_disk: '' }}</td>
                       <td> {{ isset($isolate->site_isolate->fox_disk) ? $isolate->site_isolate->fox_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->cxa_disk) ? $isolate->site_isolate->cxa_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->caz_disk) ? $isolate->site_isolate->caz_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->czo_disk) ? $isolate->site_isolate->czo_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->cza_disk) ? $isolate->site_isolate->cza_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->czt_disk) ? $isolate->site_isolate->czt_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->etp_disk) ? $isolate->site_isolate->etp_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->ipm_disk) ? $isolate->site_isolate->ipm_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->lvx_disk) ? $isolate->site_isolate->lvx_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->mem_disk) ? $isolate->site_isolate->mem_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->tzp_disk) ? $isolate->site_isolate->tzp_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->tet_disk) ? $isolate->site_isolate->tet_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->tob_disk) ? $isolate->site_isolate->tob_disk : '' }}</td>
                       <td> {{ isset($isolate->site_isolate->sxt_disk) ? $isolate->site_isolate->sxt_disk : '' }}</td>
                      
                     
                    </tr>
                    <tr  align="center">
                     
                      <td>{{ isset($isolate->site_isolate->amk_disk_ris) ? $isolate->site_isolate->amk_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amp_disk_ris) ? $isolate->site_isolate->amp_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amc_disk_ris) ? $isolate->site_isolate->amc_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->atm_disk_ris) ? $isolate->site_isolate->atm_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fep_disk_ris) ? $isolate->site_isolate->fep_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ctx_disk_ris) ? $isolate->site_isolate->ctx_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fox_disk_ris) ? $isolate->site_isolate->fox_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cxa_disk_ris) ? $isolate->site_isolate->cxa_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->caz_disk_ris) ? $isolate->site_isolate->caz_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czo_disk_ris) ? $isolate->site_isolate->czo_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cza_disk_ris) ? $isolate->site_isolate->cza_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czt_disk_ris) ? $isolate->site_isolate->czt_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->etp_disk_ris) ? $isolate->site_isolate->etp_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ipm_disk_ris) ? $isolate->site_isolate->ipm_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->lvx_disk_ris) ? $isolate->site_isolate->lvx_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->mem_disk_ris) ? $isolate->site_isolate->mem_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tzp_disk_ris) ? $isolate->site_isolate->tzp_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tet_disk_ris) ? $isolate->site_isolate->tet_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tob_disk_ris) ? $isolate->site_isolate->tob_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->sxt_disk_ris) ? $isolate->site_isolate->sxt_disk_ris: '' }}</td>
                      
                    </tr>
                    <tr align="center">
                      <td rowspan="2">MIC (ug/ml)</td>
                      <td>{{ isset($isolate->site_isolate->amk_mic_operand) ? $isolate->site_isolate->amk_mic_operand : '' }}{{ isset($isolate->site_isolate->amk_mic) ? $isolate->site_isolate->amk_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amp_mic_operand) ? $isolate->site_isolate->amp_mic_operand : '' }}{{ isset($isolate->site_isolate->amp_mic) ? $isolate->site_isolate->amp_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amc_mic_operand) ? $isolate->site_isolate->amc_mic_operand : '' }}{{ isset($isolate->site_isolate->amc_mic) ? $isolate->site_isolate->amc_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->atm_mic_operand) ? $isolate->site_isolate->atm_mic_operand : '' }}{{ isset($isolate->site_isolate->atm_mic) ? $isolate->site_isolate->atm_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fep_mic_operand) ? $isolate->site_isolate->fep_mic_operand : '' }}{{ isset($isolate->site_isolate->fep_mic) ? $isolate->site_isolate->fep_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ctx_mic_operand) ? $isolate->site_isolate->ctx_mic_operand : '' }}{{ isset($isolate->site_isolate->ctx_mic) ? $isolate->site_isolate->ctx_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fox_mic_operand) ? $isolate->site_isolate->fox_mic_operand : '' }}{{ isset($isolate->site_isolate->fox_mic) ? $isolate->site_isolate->fox_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cxa_mic_operand) ? $isolate->site_isolate->cxa_mic_operand : '' }}{{ isset($isolate->site_isolate->cxa_mic) ? $isolate->site_isolate->cxa_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->caz_mic_operand) ? $isolate->site_isolate->caz_mic_operand : '' }}{{ isset($isolate->site_isolate->caz_mic) ? $isolate->site_isolate->caz_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czo_mic_operand) ? $isolate->site_isolate->czo_mic_operand : '' }}{{ isset($isolate->site_isolate->czo_mic) ? $isolate->site_isolate->czo_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cza_mic_operand) ? $isolate->site_isolate->cza_mic_operand : '' }}{{ isset($isolate->site_isolate->cza_mic) ? $isolate->site_isolate->cza_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czt_mic_operand) ? $isolate->site_isolate->czt_mic_operand : '' }}{{ isset($isolate->site_isolate->czt_mic) ? $isolate->site_isolate->czt_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cro_mic_operand) ? $isolate->site_isolate->cro_mic_operand : '' }}{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_mic_operand) ? $isolate->site_isolate->cip_mic_operand : '' }}{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->etp_mic_operand) ? $isolate->site_isolate->etp_mic_operand : '' }}{{ isset($isolate->site_isolate->etp_mic) ? $isolate->site_isolate->etp_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->gen_mic_operand) ? $isolate->site_isolate->gen_mic_operand : '' }}{{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ipm_mic_operand) ? $isolate->site_isolate->ipm_mic_operand : '' }}{{ isset($isolate->site_isolate->ipm_mic) ? $isolate->site_isolate->ipm_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->lvx_mic_operand) ? $isolate->site_isolate->lvx_mic_operand : '' }}{{ isset($isolate->site_isolate->lvx_mic) ? $isolate->site_isolate->lvx_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->mem_mic_operand) ? $isolate->site_isolate->mem_mic_operand : '' }}{{ isset($isolate->site_isolate->mem_mic) ? $isolate->site_isolate->mem_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tzp_mic_operand) ? $isolate->site_isolate->tzp_mic_operand : '' }}{{ isset($isolate->site_isolate->tzp_mic) ? $isolate->site_isolate->tzp_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tet_mic_operand) ? $isolate->site_isolate->tet_mic_operand : '' }}{{ isset($isolate->site_isolate->tet_mic) ? $isolate->site_isolate->tet_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tob_mic_operand) ? $isolate->site_isolate->tob_mic_operand : '' }}{{ isset($isolate->site_isolate->tob_mic) ? $isolate->site_isolate->tob_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->sxt_mic_operand) ? $isolate->site_isolate->sxt_mic_operand : '' }}{{ isset($isolate->site_isolate->sxt_mic) ? $isolate->site_isolate->sxt_mic : '' }}</td>
                      

                    </tr>
                    <tr align="center">
                     
                      <td>{{ isset($isolate->site_isolate->amk_mic_ris) ? $isolate->site_isolate->amk_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amp_mic_ris) ? $isolate->site_isolate->amp_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amc_mic_ris) ? $isolate->site_isolate->amc_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->atm_mic_ris) ? $isolate->site_isolate->atm_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fep_mic_ris) ? $isolate->site_isolate->fep_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ctx_mic_ris) ? $isolate->site_isolate->ctx_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fox_mic_ris) ? $isolate->site_isolate->fox_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cxa_mic_ris) ? $isolate->site_isolate->cxa_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->caz_mic_ris) ? $isolate->site_isolate->caz_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czo_mic_ris) ? $isolate->site_isolate->czo_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cza_mic_ris) ? $isolate->site_isolate->cza_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czt_mic_ris) ? $isolate->site_isolate->czt_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->etp_mic_ris) ? $isolate->site_isolate->etp_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ipm_mic_ris) ? $isolate->site_isolate->ipm_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->lvx_mic_ris) ? $isolate->site_isolate->lvx_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->mem_mic_ris) ? $isolate->site_isolate->mem_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tzp_mic_ris) ? $isolate->site_isolate->tzp_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tet_mic_ris) ? $isolate->site_isolate->tet_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tob_mic_ris) ? $isolate->site_isolate->tob_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->sxt_mic_ris) ? $isolate->site_isolate->sxt_mic_ris : '' }}</td>
                      
                    </tr>

                    {{-- <tr align="center">
                      <td colspan="6" rowspan="5" align="center"> Date of Testing : {{ $isolate->lab_isolate->date_of_susceptibility }} <br>  <b>ARSP</b> </td>
                      <td colspan="3"> </td>
                      <td>AZM</td>
                    
                      <td>GEN</td>
                   
                      <td>CFM </td>
                   
                      <td>NAL</td>
                  
                      <td>CRO</td>
                  
                      <td>SPT</td>
                      
                      <td>CIP</td>
                      
                      <td>TET</td>
                     
                    </tr> --}}
                    {{-- <tr align="center">
                      <td colspan="6" rowspan="4" align="center"> Date of Testing : {{ $isolate->lab_isolate->date_of_susceptibility }} <br>  <b>ARSP</b> </td>
                      <td colspan="3" rowspan="2">Disk</td>
                      <td >{{ isset($isolate->lab_isolate->azm_disk) ? $isolate->lab_isolate->azm_disk  : '' }}</td>
                   

                      <td> {{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}</td>
                    

                      <td> {{ isset($isolate->lab_isolate->cfm_disk) ? $isolate->lab_isolate->cfm_disk  : '' }}</td>
                    

                      <td> {{ isset($isolate->lab_isolate->nal_disk) ? $isolate->lab_isolate->nal_disk  : '' }}</td>
                     
                      <td> {{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}</td>
                     
                      <td> {{ isset($isolate->lab_isolate->spt_disk) ? $isolate->lab_isolate->spt_disk  : '' }}</td>
                    
                      <td>{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}</td>
                    

                      <td>{{ isset($isolate->lab_isolate->tcy_disk) ? $isolate->lab_isolate->tcy_disk  : '' }}</td>
                     
                    </tr>
                    <tr  align="center">
                      <td>{{ isset($isolate->lab_isolate->azm_disk_ris) ? $isolate->lab_isolate->azm_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cfm_disk_ris) ? $isolate->lab_isolate->cfm_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->nal_disk_ris) ? $isolate->lab_isolate->nal_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->spt_disk_ris) ? $isolate->lab_isolate->spt_disk_ris  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tcy_disk_ris) ? $isolate->lab_isolate->tcy_disk_ris  : '' }}</td>
                    </tr>
                    <tr align="center">
                      <td colspan="3" rowspan="2">MIC</td>
                      <td>{{ isset($isolate->lab_isolate->azm_mic) ? $isolate->lab_isolate->azm_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cfm_mic) ? $isolate->lab_isolate->cfm_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->nal_mic) ? $isolate->lab_isolate->nal_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->spt_mic) ? $isolate->lab_isolate->spt_mic  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tcy_mic) ? $isolate->lab_isolate->tcy_mic  : '' }}</td>



                    </tr>
                    <tr align="center">
                     
                      <td>{{ isset($isolate->lab_isolate->azm_mic_ris) ? $isolate->lab_isolate->azm_mic_ris  : '' }}</td>

                    
                      <td> {{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}</td>

                   
                      <td> {{ isset($isolate->lab_isolate->cfm_mic_ris) ? $isolate->lab_isolate->cfm_mic_ris  : '' }}</td>

                     
                      <td> {{ isset($isolate->lab_isolate->nal_mic_ris) ? $isolate->lab_isolate->nal_mic_ris  : '' }}</td>

                    
                      <td> {{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}</td>

                    
                      <td> {{ isset($isolate->lab_isolate->spt_mic_ris) ? $isolate->lab_isolate->spt_mic_ris  : '' }}</td>

                     
                      <td>{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}</td>

                      
                      <td>{{ isset($isolate->lab_isolate->tcy_mic_ris) ? $isolate->lab_isolate->tcy_mic_ris  : '' }}</td>
                    </tr> --}}

                      <tr>
                        <th colspan="2" style="background-color: #D3D3D3; color: black;"></th>
                        <td colspan="7">Date Released: {{ isset($isolate->site_isolate->date_released) ? $isolate->site_isolate->date_released->format('m/d/Y') : '' }}</td>
                        <td colspan="7">Verified by: {{ $isolate->site_isolate->verified_by }}</td>
                        <td colspan="8">Noted by: {{ $isolate->site_isolate->noted_by }}</td>
                       
                      </tr>

                   </tbody>
                 </table>
   
                 <table  class="table table-condensed table-bordered small text-center" style="border: none; font-size: 8px">
                  <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                  </tr>
                  <tr>
                   <td style="border: none;"> </td>
                    <td style="border: none;">Date Printed: <br><br> {{ $date_now }} </td>
                    <td style="border: none;">_________________ <br><br> Medical Technologist </td>
                    <td style="border: none;">_________________ <br><br> Pathologist</td>
                  </tr>
                 </table>
                 <table style="border: none; font-size: 8px; padding: 1px;">
                  <tr>
                    <td style="border: none;">Legend : </td>
                    <td style="border: none;"></td>
                 <td></td>
                  <td></td>
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">AMK </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Amikacin </td>

                    <td  style="border: none; padding-right: 50px;">CAZ  </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ceftazidime </td>

                    <td  style="border: none; padding-right: 50px;">IPM </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Imipenem </td>

                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">AMP </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ampicillin </td>

                    <td  style="border: none; padding-right: 50px;">CZO </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefazolin </td>

                    <td  style="border: none; padding-right: 50px;">LVX  </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Levofloxacin </td>

        
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">AMC </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Amoxicillin-clavulanic acid</td>

                    <td  style="border: none; padding-right: 50px;">CZA</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ceftazidime-avibactam </td>

     
                    <td style="border: none; padding-right: 50px;">MEM</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Meropenem </td>
               
                  </tr>

                  <tr>
                    <td  style="border: none; padding-right: 50px;">ATM </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Aztreonam</td>

                    <td  style="border: none; padding-right: 50px;">CZT</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ceftolozane-tazobactam</td>

     
                    <td style="border: none; padding-right: 50px;">TZP</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Piperacillin-Tazobactam </td>
               
                  </tr>

                  <tr>
                    <td  style="border: none; padding-right: 50px;">FEP </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefepime</td>

                    <td  style="border: none; padding-right: 50px;">CRO</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ceftriaxone</td>

     
                    <td style="border: none; padding-right: 50px;">TET</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Tetracycline</td>
               
                  </tr>

                  <tr>
                    <td  style="border: none; padding-right: 50px;">CTX </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefotaxime</td>

                    <td  style="border: none; padding-right: 50px;">CIP</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ciprofloxacin</td>

     
                    <td style="border: none; padding-right: 50px;">TOB</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Tobramycin</td>
               
                  </tr>

                  
                  <tr>
                    <td  style="border: none; padding-right: 50px;">FOX </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefoxitin</td>

                    <td  style="border: none; padding-right: 50px;">ETP</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ertapenem</td>

     
                    <td style="border: none; padding-right: 50px;">SXT</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Trimethoprim-sulfamethoxazole</td>
               
                  </tr>


                  <tr>
                    <td  style="border: none; padding-right: 50px;">CXA </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefuroxime</td>

                    <td  style="border: none; padding-right: 50px;">GEN</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Gentamicin</td>

     
                    <td style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"></td>
               
                  </tr>


{{-- 
                  <tr>
                    <td  style="border: none; padding-right: 50px;"> </td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"></td>

                    <td  style="border: none; padding-right: 50px;"> </td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"> </td>

     
                    <td style="border: none; padding-right: 50px;">U</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Unknown (No established CLSI guidelines) </td>
               
                  </tr> --}}
                 
                </table>
 </div>
</body>
</html>
