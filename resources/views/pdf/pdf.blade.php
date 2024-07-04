<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ $isolate->patient_id }} - {!! \Carbon\Carbon::now()->timezone('Asia/Manila')->toDayDateTimeString() !!}</title>
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

            <div class="small" style="position: absolute; top:15px; left: 880px; font-size: 9px;">
              <span><b>TRICYCLE WP1 RESULT FORM</b></span><br>
              <span><b>FORM # 2</b></span><br>
              <span><b>REV. # 0</b></span><br>
          </div>
      
                <br><br>
                <div><h6><center>CONFIRMATORY TEST RESULT</center></h6></div>
               <table class="table table-condensed table-bordered small" style="font-size: 9px;">
                   <thead>
                       <tr>
                           <th colspan="13">NAME OF INSTITUTION: {{ Str::of($isolate->hospital->hospital_name)->upper() }}</th>
                           <th class="text-right" colspan="14">PATIENT ID : {{ $isolate->patient_id }}</th>
                       </tr> 
                       
                   </thead>
                   <tbody>
                    <tr>
                      
                  </tr>
                  <tr>
                    <th colspan="3" rowspan="2" style="background-color: #D3D3D3; color: black; text-align:center !important">PATIENT INFORMATION</th>
                     {{-- <td colspan="3">Patient ID : {{ $isolate->patient_id }}</td> --}}
                     <td colspan="5">First Name: {{ $isolate->site_isolate->patient_first_name }}</td>
                     <td colspan="5">Middle Name: {{ $isolate->site_isolate->patient_middle_name }}</td>
                     <td colspan="5">Last Name: {{ $isolate->site_isolate->patient_last_name }}</td>
                     <td colspan="4">Age: {{ $isolate->site_isolate->patient_age }}</td>
                     <td colspan="5">Sex: {{ $isolate->site_isolate->patient_sex }}</td>
                   </tr>


                   <tr>
                    {{-- <th colspan="2" style="background-color: #D3D3D3; color: black;"> </th> --}}
                    <td colspan="8">Date of Admission: {{ isset($isolate->site_isolate->date_of_admission) ? $isolate->site_isolate->date_of_admission : '' }}</td>
                    <td colspan="8">Ward: {{ $isolate->site_isolate->ward }}</td>
                    <td colspan="8">Attending Physician: {{ $isolate->site_isolate->attending_physician }}</td>
                   </tr>

                   <tr>
                    <th colspan="3" style="background-color: #D3D3D3; color: black; text-align:center !important">ISOLATE INFORMATION</th>
                     <td colspan="6">Specimen Type: {{ $isolate->site_isolate->specimen_type }}</td>
                     <td colspan="6">Laboratory Number: {{ $isolate->site_isolate->laboratory_number }}</td>
                     <td colspan="6">Date of Sample Collection: {{ isset($isolate->site_isolate->date_of_sample_collection) ? $isolate->site_isolate->date_of_sample_collection->format('m/d/Y') : '' }}</td>
                     <td colspan="6">Date received in ARSRL: {{ isset($isolate->site_isolate->date_received_arsrl) ? $isolate->site_isolate->date_received_arsrl->format('m/d/Y') : '' }}</td>
                   </tr>
                     
                     {{-- <tr >
                      <th rowspan="2" colspan="2" style="background-color: #D3D3D3; color: black;">CULTURE RESULT</th>
                      <td colspan="8"><b>Organism({{ $isolate->hospital->hospital_code }}): </b> {!! $isolate->site_isolate->organism_code !!}</td>
                      <td colspan="7">Beta-lactamase ({{ $isolate->hospital->hospital_code }}): {{ $isolate->site_isolate->beta_lactamase }}</td>
                     </tr> --}}
                     <tr >
                      <th rowspan="3" colspan="2" style="background-color: #D3D3D3; color: black; text-align:center !important">CULTURE RESULTS</th>
                      <td colspan="12">Bacterial Identification ({{ $isolate->hospital->hospital_code }}): {!! $isolate->site_isolate->bacterial_identification !!}</td>
                      <td colspan="13">ESBL ({{ $isolate->hospital->hospital_code }}): {{ $isolate->site_isolate->esbl }}</td>
                      {{-- <td colspan="8">Date of Testing: {{ isset($isolate->site_isolate->date_of_testing) ? $isolate->site_isolate->date_of_testing->format('m/d/Y') : '' }}</td> --}}
                     </tr>
                     <tr>
                      {{-- <th rowspan="2" colspan="2" style="background-color: #D3D3D3; color: black;">CULTURE RESULT</th> --}}
                      <td colspan="12">Bacterial Identification(ARSRL): {!! $isolate->lab_isolate->bacterial_identification !!}</td>
                      <td colspan="13">ESBL (ARSRL): {{ $isolate->lab_isolate->esbl }}</td>
                     </tr>
                    
                    
                  
                     <tr>
                      <th colspan="7" style="background-color: #D3D3D3; color: black;">ANTIMICROBIAL SUSCEPTIBILITY TEST (AST) RESULTS</th>
                        <td colspan="9">Date of Testing ({{ $isolate->hospital->hospital_code }}): {{ isset($isolate->site_isolate->date_of_testing) ? $isolate->site_isolate->date_of_testing->format('m/d/Y') : '' }}</td>
                        <td colspan="9">Date of Testing (ARSRL): {{ isset($isolate->lab_isolate->date_of_testing) ? $isolate->lab_isolate->date_of_testing->format('m/d/Y') : '' }}</td>
                    </tr>
                    <tr align="center">
                      {{-- <td colspan="6" rowspan="5" align="center"> Date of Testing : {{ isset($isolate->site_isolate->date_of_susceptibility) ? $isolate->site_isolate->date_of_susceptibility->format('m/d/Y') : '' }} <br>  <b>{{ $isolate->hospital->hospital_code }}</b> </td> --}}
                      <td> </td>
                      <td>AMK</td>
                      <td>AMP</td>
                      <td>SAM</td>
                      <td>AMC</td>
                      <td>ATM</td>
                      <td>FEP</td>
                      <td>CTX</td>
                      {{-- <td>CT/CTL</td> --}}
                      <td>FOX</td>
                      <td>CXA</td>
                      <td>CAZ</td>
                      {{-- <td>TZ/TZL</td> --}}
                      <td>CZO</td>
                      <td>CZA</td>
                      <td>CZT</td>
                      <td>CRO</td>
                      <td>CHL</td>
                      <td>CIP</td>
                      <td>COL</td>
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
                      <td rowspan="2" style="font-size: 8px">Disk (mm) <br>[<b>{{ $isolate->hospital->hospital_code }}</b>] </td>
                      <td> {{ isset($isolate->site_isolate->amk_disk) ? $isolate->site_isolate->amk_disk: '' }}</td>
                      <td> {{ isset($isolate->site_isolate->amp_disk) ? $isolate->site_isolate->amp_disk: '' }}</td>
                      <td> {{ isset($isolate->site_isolate->sam_disk) ? $isolate->site_isolate->sam_disk: '' }}</td>
                      <td> {{ isset($isolate->site_isolate->amc_disk) ? $isolate->site_isolate->amc_disk: '' }}</td>
                      <td> {{ isset($isolate->site_isolate->atm_disk) ? $isolate->site_isolate->atm_disk: '' }}</td>
                      <td> {{ isset($isolate->site_isolate->fep_disk) ? $isolate->site_isolate->fep_disk: '' }}</td>
                      <td> {{ isset($isolate->site_isolate->ctx_disk) ? $isolate->site_isolate->ctx_disk: '' }}</td>
                      {{-- <td> {{ isset($isolate->site_isolate->ct_ctl_disk) ? $isolate->site_isolate->ct_ctl_disk: '' }}</td> --}}
                      <td> {{ isset($isolate->site_isolate->fox_disk) ? $isolate->site_isolate->fox_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cxa_disk) ? $isolate->site_isolate->cxa_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->caz_disk) ? $isolate->site_isolate->caz_disk : '' }}</td>
                      {{-- <td> {{ isset($isolate->site_isolate->tz_tzl_disk) ? $isolate->site_isolate->tz_tzl_disk : '' }}</td> --}}
                      <td> {{ isset($isolate->site_isolate->czo_disk) ? $isolate->site_isolate->czo_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cza_disk) ? $isolate->site_isolate->cza_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->czt_disk) ? $isolate->site_isolate->czt_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->chl_disk) ? $isolate->site_isolate->chl_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->col_disk) ? $isolate->site_isolate->col_disk : '' }}</td>
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
                      <td>{{ isset($isolate->site_isolate->sam_disk_ris) ? $isolate->site_isolate->sam_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amc_disk_ris) ? $isolate->site_isolate->amc_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->atm_disk_ris) ? $isolate->site_isolate->atm_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fep_disk_ris) ? $isolate->site_isolate->fep_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ctx_disk_ris) ? $isolate->site_isolate->ctx_disk_ris: '' }}</td>
                      {{-- <td>{{ isset($isolate->site_isolate->ct_ctl_disk_ris) ? $isolate->site_isolate->ct_ctl_disk_ris: '' }}</td> --}}
                      <td>{{ isset($isolate->site_isolate->fox_disk_ris) ? $isolate->site_isolate->fox_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cxa_disk_ris) ? $isolate->site_isolate->cxa_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->caz_disk_ris) ? $isolate->site_isolate->caz_disk_ris: '' }}</td>
                      {{-- <td>{{ isset($isolate->site_isolate->tz_tzl_disk_ris) ? $isolate->site_isolate->tz_tzl_disk_ris: '' }}</td> --}}
                      <td>{{ isset($isolate->site_isolate->czo_disk_ris) ? $isolate->site_isolate->czo_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cza_disk_ris) ? $isolate->site_isolate->cza_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czt_disk_ris) ? $isolate->site_isolate->czt_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->chl_disk_ris) ? $isolate->site_isolate->chl_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->site_isolate->col_disk_ris) ? $isolate->site_isolate->col_disk_ris: '' }}</td>
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
                      <td rowspan="2" style="font-size: 8px">MIC (ug/ml)<br>[<b>{{ $isolate->hospital->hospital_code }}</b>]</td>
                      <td>{{ isset($isolate->site_isolate->amk_mic_operand) ? $isolate->site_isolate->amk_mic_operand : '' }}{{ isset($isolate->site_isolate->amk_mic) ? $isolate->site_isolate->amk_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amp_mic_operand) ? $isolate->site_isolate->amp_mic_operand : '' }}{{ isset($isolate->site_isolate->amp_mic) ? $isolate->site_isolate->amp_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->sam_mic_operand) ? $isolate->site_isolate->sam_mic_operand : '' }}{{ isset($isolate->site_isolate->sam_mic) ? $isolate->site_isolate->sam_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amc_mic_operand) ? $isolate->site_isolate->amc_mic_operand : '' }}{{ isset($isolate->site_isolate->amc_mic) ? $isolate->site_isolate->amc_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->atm_mic_operand) ? $isolate->site_isolate->atm_mic_operand : '' }}{{ isset($isolate->site_isolate->atm_mic) ? $isolate->site_isolate->atm_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fep_mic_operand) ? $isolate->site_isolate->fep_mic_operand : '' }}{{ isset($isolate->site_isolate->fep_mic) ? $isolate->site_isolate->fep_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ctx_mic_operand) ? $isolate->site_isolate->ctx_mic_operand : '' }}{{ isset($isolate->site_isolate->ctx_mic) ? $isolate->site_isolate->ctx_mic : '' }}</td>
                      {{-- <td>{{ isset($isolate->site_isolate->ct_ctl_mic_operand) ? $isolate->site_isolate->ct_ctl_mic_operand : '' }}{{ isset($isolate->site_isolate->ct_ctl_mic) ? $isolate->site_isolate->ct_ctl_mic : '' }}</td> --}}
                      <td>{{ isset($isolate->site_isolate->fox_mic_operand) ? $isolate->site_isolate->fox_mic_operand : '' }}{{ isset($isolate->site_isolate->fox_mic) ? $isolate->site_isolate->fox_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cxa_mic_operand) ? $isolate->site_isolate->cxa_mic_operand : '' }}{{ isset($isolate->site_isolate->cxa_mic) ? $isolate->site_isolate->cxa_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->caz_mic_operand) ? $isolate->site_isolate->caz_mic_operand : '' }}{{ isset($isolate->site_isolate->caz_mic) ? $isolate->site_isolate->caz_mic : '' }}</td>
                      {{-- <td>{{ isset($isolate->site_isolate->tz_tzl_mic_operand) ? $isolate->site_isolate->tz_tzl_mic_operand : '' }}{{ isset($isolate->site_isolate->tz_tzl_mic) ? $isolate->site_isolate->tz_tzl_mic : '' }}</td> --}}
                      <td>{{ isset($isolate->site_isolate->czo_mic_operand) ? $isolate->site_isolate->czo_mic_operand : '' }}{{ isset($isolate->site_isolate->czo_mic) ? $isolate->site_isolate->czo_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cza_mic_operand) ? $isolate->site_isolate->cza_mic_operand : '' }}{{ isset($isolate->site_isolate->cza_mic) ? $isolate->site_isolate->cza_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czt_mic_operand) ? $isolate->site_isolate->czt_mic_operand : '' }}{{ isset($isolate->site_isolate->czt_mic) ? $isolate->site_isolate->czt_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cro_mic_operand) ? $isolate->site_isolate->cro_mic_operand : '' }}{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->chl_mic_operand) ? $isolate->site_isolate->chl_mic_operand : '' }}{{ isset($isolate->site_isolate->chl_mic) ? $isolate->site_isolate->chl_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_mic_operand) ? $isolate->site_isolate->cip_mic_operand : '' }}{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->col_mic_operand) ? $isolate->site_isolate->col_mic_operand : '' }}{{ isset($isolate->site_isolate->col_mic) ? $isolate->site_isolate->col_mic : '' }}</td>
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
                      <td>{{ isset($isolate->site_isolate->sam_mic_ris) ? $isolate->site_isolate->sam_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->amc_mic_ris) ? $isolate->site_isolate->amc_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->atm_mic_ris) ? $isolate->site_isolate->atm_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->fep_mic_ris) ? $isolate->site_isolate->fep_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->ctx_mic_ris) ? $isolate->site_isolate->ctx_mic_ris : '' }}</td>
                      {{-- <td>{{ isset($isolate->site_isolate->ct_ctl_mic_ris) ? $isolate->site_isolate->ct_ctl_mic_ris : '' }}</td> --}}
                      <td>{{ isset($isolate->site_isolate->fox_mic_ris) ? $isolate->site_isolate->fox_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cxa_mic_ris) ? $isolate->site_isolate->cxa_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->caz_mic_ris) ? $isolate->site_isolate->caz_mic_ris : '' }}</td>
                      {{-- <td>{{ isset($isolate->site_isolate->tz_tzl_mic_ris) ? $isolate->site_isolate->tz_tzl_mic_ris : '' }}</td> --}}
                      <td>{{ isset($isolate->site_isolate->czo_mic_ris) ? $isolate->site_isolate->czo_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cza_mic_ris) ? $isolate->site_isolate->cza_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->czt_mic_ris) ? $isolate->site_isolate->czt_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->chl_mic_ris) ? $isolate->site_isolate->chl_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->col_mic_ris) ? $isolate->site_isolate->col_mic_ris : '' }}</td>
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

                
                    <tr align="center">
                      {{-- <td colspan="6" rowspan="4" align="center"> Date of Confirmation : {{ isset($isolate->lab_isolate->date_of_susceptibility) ? $isolate->lab_isolate->date_of_susceptibility->format('m/d/Y') : '' }} <br>  <b>ARSRL</b> </td> --}}
                      <td rowspan="2" style="font-size: 8px">Disk (mm)<br>[<b>ARSRL</b>] </td>
                      <td> {{ isset($isolate->lab_isolate->amk_disk) ? $isolate->lab_isolate->amk_disk: '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->amp_disk) ? $isolate->lab_isolate->amp_disk: '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->sam_disk) ? $isolate->lab_isolate->sam_disk: '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->amc_disk) ? $isolate->lab_isolate->amc_disk: '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->atm_disk) ? $isolate->lab_isolate->atm_disk: '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->fep_disk) ? $isolate->lab_isolate->fep_disk: '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->ctx_disk) ? $isolate->lab_isolate->ctx_disk: '' }}</td>
                      {{-- <td> {{ isset($isolate->lab_isolate->ct_ctl_disk) ? $isolate->lab_isolate->ct_ctl_disk: '' }}</td> --}}
                      <td> {{ isset($isolate->lab_isolate->fox_disk) ? $isolate->lab_isolate->fox_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cxa_disk) ? $isolate->lab_isolate->cxa_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->caz_disk) ? $isolate->lab_isolate->caz_disk : '' }}</td>
                      {{-- <td> {{ isset($isolate->lab_isolate->tz_tzl_disk) ? $isolate->lab_isolate->tz_tzl_disk : '' }}</td> --}}
                      <td> {{ isset($isolate->lab_isolate->czo_disk) ? $isolate->lab_isolate->czo_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cza_disk) ? $isolate->lab_isolate->cza_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->czt_disk) ? $isolate->lab_isolate->czt_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->chl_disk) ? $isolate->lab_isolate->chl_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->col_disk) ? $isolate->lab_isolate->col_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->etp_disk) ? $isolate->lab_isolate->etp_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->ipm_disk) ? $isolate->lab_isolate->ipm_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->lvx_disk) ? $isolate->lab_isolate->lvx_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->mem_disk) ? $isolate->lab_isolate->mem_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->tzp_disk) ? $isolate->lab_isolate->tzp_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->tet_disk) ? $isolate->lab_isolate->tet_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->tob_disk) ? $isolate->lab_isolate->tob_disk : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->sxt_disk) ? $isolate->lab_isolate->sxt_disk : '' }}</td>
                     
                    </tr>
                    <tr  align="center">
                      <td>{{ isset($isolate->lab_isolate->amk_disk_ris) ? $isolate->lab_isolate->amk_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->amp_disk_ris) ? $isolate->lab_isolate->amp_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->sam_disk_ris) ? $isolate->lab_isolate->sam_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->amc_disk_ris) ? $isolate->lab_isolate->amc_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->atm_disk_ris) ? $isolate->lab_isolate->atm_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->fep_disk_ris) ? $isolate->lab_isolate->fep_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->ctx_disk_ris) ? $isolate->lab_isolate->ctx_disk_ris: '' }}</td>
                      {{-- <td>{{ isset($isolate->lab_isolate->ct_ctl_disk_ris) ? $isolate->lab_isolate->ct_ctl_disk_ris: '' }}</td> --}}
                      <td>{{ isset($isolate->lab_isolate->fox_disk_ris) ? $isolate->lab_isolate->fox_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cxa_disk_ris) ? $isolate->lab_isolate->cxa_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->caz_disk_ris) ? $isolate->lab_isolate->caz_disk_ris: '' }}</td>
                      {{-- <td>{{ isset($isolate->lab_isolate->tz_tzl_disk_ris) ? $isolate->lab_isolate->tz_tzl_disk_ris: '' }}</td> --}}
                      <td>{{ isset($isolate->lab_isolate->czo_disk_ris) ? $isolate->lab_isolate->czo_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cza_disk_ris) ? $isolate->lab_isolate->cza_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->czt_disk_ris) ? $isolate->lab_isolate->czt_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->chl_disk_ris) ? $isolate->lab_isolate->chl_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->col_disk_ris) ? $isolate->lab_isolate->col_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->etp_disk_ris) ? $isolate->lab_isolate->etp_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->ipm_disk_ris) ? $isolate->lab_isolate->ipm_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->lvx_disk_ris) ? $isolate->lab_isolate->lvx_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->mem_disk_ris) ? $isolate->lab_isolate->mem_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tzp_disk_ris) ? $isolate->lab_isolate->tzp_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tet_disk_ris) ? $isolate->lab_isolate->tet_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tob_disk_ris) ? $isolate->lab_isolate->tob_disk_ris: '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->sxt_disk_ris) ? $isolate->lab_isolate->sxt_disk_ris: '' }}</td>
                    </tr>
                    <tr align="center">
                      <td rowspan="2" style="font-size: 8px">MIC (ug/ml)<br>[<b>ARSRL</b>] </td>
                      <td>{{ isset($isolate->lab_isolate->amk_mic_operand) ? $isolate->lab_isolate->amk_mic_operand : '' }}{{ isset($isolate->lab_isolate->amk_mic) ? $isolate->lab_isolate->amk_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->amp_mic_operand) ? $isolate->lab_isolate->amp_mic_operand : '' }}{{ isset($isolate->lab_isolate->amp_mic) ? $isolate->lab_isolate->amp_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->sam_mic_operand) ? $isolate->lab_isolate->sam_mic_operand : '' }}{{ isset($isolate->lab_isolate->sam_mic) ? $isolate->lab_isolate->sam_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->amc_mic_operand) ? $isolate->lab_isolate->amc_mic_operand : '' }}{{ isset($isolate->lab_isolate->amc_mic) ? $isolate->lab_isolate->amc_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->atm_mic_operand) ? $isolate->lab_isolate->atm_mic_operand : '' }}{{ isset($isolate->lab_isolate->atm_mic) ? $isolate->lab_isolate->atm_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->fep_mic_operand) ? $isolate->lab_isolate->fep_mic_operand : '' }}{{ isset($isolate->lab_isolate->fep_mic) ? $isolate->lab_isolate->fep_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->ctx_mic_operand) ? $isolate->lab_isolate->ctx_mic_operand : '' }}{{ isset($isolate->lab_isolate->ctx_mic) ? $isolate->lab_isolate->ctx_mic : '' }}</td>
                      {{-- <td>{{ isset($isolate->lab_isolate->ct_ctl_mic_operand) ? $isolate->lab_isolate->ct_ctl_mic_operand : '' }}{{ isset($isolate->lab_isolate->ct_ctl_mic) ? $isolate->lab_isolate->ct_ctl_mic : '' }}</td> --}}
                      <td>{{ isset($isolate->lab_isolate->fox_mic_operand) ? $isolate->lab_isolate->fox_mic_operand : '' }}{{ isset($isolate->lab_isolate->fox_mic) ? $isolate->lab_isolate->fox_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cxa_mic_operand) ? $isolate->lab_isolate->cxa_mic_operand : '' }}{{ isset($isolate->lab_isolate->cxa_mic) ? $isolate->lab_isolate->cxa_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->caz_mic_operand) ? $isolate->lab_isolate->caz_mic_operand : '' }}{{ isset($isolate->lab_isolate->caz_mic) ? $isolate->lab_isolate->caz_mic : '' }}</td>
                      {{-- <td>{{ isset($isolate->lab_isolate->tz_tzl_mic_operand) ? $isolate->lab_isolate->tz_tzl_mic_operand : '' }}{{ isset($isolate->lab_isolate->tz_tzl_mic) ? $isolate->lab_isolate->tz_tzl_mic : '' }}</td> --}}
                      <td>{{ isset($isolate->lab_isolate->czo_mic_operand) ? $isolate->lab_isolate->czo_mic_operand : '' }}{{ isset($isolate->lab_isolate->czo_mic) ? $isolate->lab_isolate->czo_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cza_mic_operand) ? $isolate->lab_isolate->cza_mic_operand : '' }}{{ isset($isolate->lab_isolate->cza_mic) ? $isolate->lab_isolate->cza_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->czt_mic_operand) ? $isolate->lab_isolate->czt_mic_operand : '' }}{{ isset($isolate->lab_isolate->czt_mic) ? $isolate->lab_isolate->czt_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cro_mic_operand) ? $isolate->lab_isolate->cro_mic_operand : '' }}{{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->chl_mic_operand) ? $isolate->lab_isolate->chl_mic_operand : '' }}{{ isset($isolate->lab_isolate->chl_mic) ? $isolate->lab_isolate->chl_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_mic_operand) ? $isolate->lab_isolate->cip_mic_operand : '' }}{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->col_mic_operand) ? $isolate->lab_isolate->col_mic_operand : '' }}{{ isset($isolate->lab_isolate->col_mic) ? $isolate->lab_isolate->col_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->etp_mic_operand) ? $isolate->lab_isolate->etp_mic_operand : '' }}{{ isset($isolate->lab_isolate->etp_mic) ? $isolate->lab_isolate->etp_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->gen_mic_operand) ? $isolate->lab_isolate->gen_mic_operand : '' }}{{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->ipm_mic_operand) ? $isolate->lab_isolate->ipm_mic_operand : '' }}{{ isset($isolate->lab_isolate->ipm_mic) ? $isolate->lab_isolate->ipm_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->lvx_mic_operand) ? $isolate->lab_isolate->lvx_mic_operand : '' }}{{ isset($isolate->lab_isolate->lvx_mic) ? $isolate->lab_isolate->lvx_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->mem_mic_operand) ? $isolate->lab_isolate->mem_mic_operand : '' }}{{ isset($isolate->lab_isolate->mem_mic) ? $isolate->lab_isolate->mem_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tzp_mic_operand) ? $isolate->lab_isolate->tzp_mic_operand : '' }}{{ isset($isolate->lab_isolate->tzp_mic) ? $isolate->lab_isolate->tzp_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tet_mic_operand) ? $isolate->lab_isolate->tet_mic_operand : '' }}{{ isset($isolate->lab_isolate->tet_mic) ? $isolate->lab_isolate->tet_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tob_mic_operand) ? $isolate->lab_isolate->tob_mic_operand : '' }}{{ isset($isolate->lab_isolate->tob_mic) ? $isolate->lab_isolate->tob_mic : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->sxt_mic_operand) ? $isolate->lab_isolate->sxt_mic_operand : '' }}{{ isset($isolate->lab_isolate->sxt_mic) ? $isolate->lab_isolate->sxt_mic : '' }}</td>



                    </tr>
                    <tr align="center">
                      <td>{{ isset($isolate->lab_isolate->amk_mic_ris) ? $isolate->lab_isolate->amk_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->amp_mic_ris) ? $isolate->lab_isolate->amp_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->sam_mic_ris) ? $isolate->lab_isolate->sam_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->amc_mic_ris) ? $isolate->lab_isolate->amc_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->atm_mic_ris) ? $isolate->lab_isolate->atm_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->fep_mic_ris) ? $isolate->lab_isolate->fep_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->ctx_mic_ris) ? $isolate->lab_isolate->ctx_mic_ris : '' }}</td>
                      {{-- <td>{{ isset($isolate->lab_isolate->ct_ctl_mic_ris) ? $isolate->lab_isolate->ct_ctl_mic_ris : '' }}</td> --}}
                      <td>{{ isset($isolate->lab_isolate->fox_mic_ris) ? $isolate->lab_isolate->fox_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cxa_mic_ris) ? $isolate->lab_isolate->cxa_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->caz_mic_ris) ? $isolate->lab_isolate->caz_mic_ris : '' }}</td>
                      {{-- <td>{{ isset($isolate->lab_isolate->tz_tzl_mic_ris) ? $isolate->lab_isolate->tz_tzl_mic_ris : '' }}</td> --}}
                      <td>{{ isset($isolate->lab_isolate->czo_mic_ris) ? $isolate->lab_isolate->czo_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cza_mic_ris) ? $isolate->lab_isolate->cza_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->czt_mic_ris) ? $isolate->lab_isolate->czt_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->chl_mic_ris) ? $isolate->lab_isolate->chl_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->col_mic_ris) ? $isolate->lab_isolate->col_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->etp_mic_ris) ? $isolate->lab_isolate->etp_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->ipm_mic_ris) ? $isolate->lab_isolate->ipm_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->lvx_mic_ris) ? $isolate->lab_isolate->lvx_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->mem_mic_ris) ? $isolate->lab_isolate->mem_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tzp_mic_ris) ? $isolate->lab_isolate->tzp_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tet_mic_ris) ? $isolate->lab_isolate->tet_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tob_mic_ris) ? $isolate->lab_isolate->tob_mic_ris : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->sxt_mic_ris) ? $isolate->lab_isolate->sxt_mic_ris : '' }}</td>
                    </tr>

                      {{-- <tr>
                        <th colspan="2" style="background-color: #D3D3D3; color: black;">LABORATORY PERSONNEL</th>
                        <td colspan="5">Name of Staff: {{ $isolate->site_isolate->laboratory_personnel }}</td>
                        <td colspan="4">Email Address: {{ $isolate->site_isolate->laboratory_personnel_email }}</td>
                        <td colspan="3">Contact Number: {{ $isolate->site_isolate->laboratory_personnel_contact }}</td>
                        <td colspan="3">Date Accomplished: {{ isset($isolate->site_isolate->date_accomplished) ? $isolate->site_isolate->date_accomplished->format('m/d/Y') : '' }}</td>
                      </tr>
                      <tr>
                        <td colspan="17">Notes: {{ $isolate->site_isolate->notes }}</td>
                      </tr>
                      --}}
                      {{-- <tr>
                        <td colspan="13">Remarks (Site): {{ $isolate->site_isolate->remarks }}</td>
                        <td colspan="14">Remarks (ARSP): {{ $isolate->lab_isolate->remarks }}</td>
                      </tr> --}}
                      <tr>
                        <td colspan="3"> <b>CT/CTL (ARSRL)</b> </td>
                        <td colspan="12">{{ isset($isolate->lab_isolate->ct_ctl_disk) ? $isolate->lab_isolate->ct_ctl_disk: '' }}{{ isset($isolate->lab_isolate->ct_ctl_disk_ris) ? $isolate->lab_isolate->ct_ctl_disk_ris: '' }}{{ isset($isolate->lab_isolate->ct_ctl_mic_operand) ? $isolate->lab_isolate->ct_ctl_mic_operand : '' }}{{ isset($isolate->lab_isolate->ct_ctl_mic) ? $isolate->lab_isolate->ct_ctl_mic : '' }}  {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) ? $isolate->lab_isolate->ct_ctl_mic_ris : '' }}</td>

                        <td colspan="12" rowspan="2">Remarks: {{ $isolate->lab_isolate->remarks }}</td>
                      </tr>
                      <tr>
                        <td colspan="3"> <b>TZ/TZL (ARSRL)</b> </td>
                        {{-- <td colspan="12">Disk: {{ isset($isolate->lab_isolate->tz_tzl_disk) ? $isolate->lab_isolate->tz_tzl_disk : '' }} - {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) ? $isolate->lab_isolate->tz_tzl_disk_ris: '' }}</td> --}}
                        <td colspan="12">{{ isset($isolate->lab_isolate->tz_tzl_mic_operand) ? $isolate->lab_isolate->tz_tzl_mic_operand : '' }}{{ isset($isolate->lab_isolate->tz_tzl_mic) ? $isolate->lab_isolate->tz_tzl_mic : '' }}  {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) ? $isolate->lab_isolate->tz_tzl_mic_ris : '' }}</td>
                      </tr>
                   </tbody>
                 </table>
               
                 <table  class="table table-condensed table-bordered small text-center" style="border: none; font-size: 8px">
                  {{-- <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                  </tr> --}}
                  <tr>
                   <td style="border: none;  padding: 1px;  "> </td>
                    <td style="border: none;  padding: 1px;  ">Date Released: <br><br> _________________  </td>
                    <td style="border: none;  padding: 1px; ">Verified By: <br><br> Polle Krystle Macaranas, RMT / Marietta M. Lagrada, RMT </td>
                    <td style="border: none;  padding: 1px;  ">Noted By: <br><br> Sonia B. Sia, MD</td>
                  </tr>
                 </table>
                 <div class="page-break"></div>
                 <br><br><br><br><br><br><br>
                 <table style="border: none; font-size: 7px; padding: 1px;">
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

     
                    <td style="border: none; padding-right: 50px;">COL</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Colistin</td>
               
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">SAM </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ampicilin-Sulbactam</td>

                    <td  style="border: none; padding-right: 50px;">CHL</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Chloramphenicol</td>

     
                    <td style="border: none; padding-right: 50px;">CT/CTL</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefotaxime/Cefotaxime + Clavulanic Acid</td>
               
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">TZ/TZL</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ceftazidime/Ceftazidime + Clavulanic Acid</td>

                    <td  style="border: none; padding-right: 50px;"> </td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"> </td>

     
                    <td style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"></td>
               
                  </tr>
                 
                </table>
 </div>
</body>
</html>
