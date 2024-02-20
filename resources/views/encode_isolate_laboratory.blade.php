@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <ul class="nav justify-content-center">
        <!-- <li class="nav-item">
            <a class="nav-link" href="/encode/create">Encode New Isolate</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="/isolates">Show All Isolates</a>
        </li>
        </ul>
            <div class="card">
                <div class="card-header">{{ __('Encode Isolate') }}</div>

                <div class="card-body">
      <form action="/lab-isolates" method="POST">
      @csrf
     <div class="form-row">
    <div class="row">
    <div class="form-group col-md-4 mb-3">
      <label for="patient_id">Patient ID</label>
      <input type="text" class="form-control is-valid" name="patient_id" id="patient_id" placeholder="Patient ID" value="{{ $isolate->patient_id }}" disabled>
      <input type="hidden" name="isolate_id" value="{{ $isolate->id }}">
    </div>
    <div class="col-md-4"> </div>
    <div class="form-group col-md-4 mb-3">
      {{-- <label for="acccession_no">Download PDF ({{  $isolate->accession_no }})</label> --}}
      <a class="btn btn-primary" href='/create-pdf/{{ $isolate->id }}'  >Download PDF ({{  $isolate->patient_id }})</a>
      <a class="btn btn-primary" href='/create-pdf-lab/{{ $isolate->id }}'  >Lab-Only PDF ({{  $isolate->patient_id }})</a>
    </div>
  
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Site Details
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-sm">
                  <thead>
                      <tr>
                          <th colspan="4">{{ $isolate->hospital->hospital_name }}</th>
                      </tr> 
                      <tr>
                          <th colspan="4">PATIENT INFORMATION</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Patient ID : {{ $isolate->patient_id }}</td>
                      <td>First Name: {{ $isolate->site_isolate->patient_first_name }}</td>
                      <td>Middle Name: {{ $isolate->site_isolate->patient_middle_name }}</td>
                      <td>Last Name: {{ $isolate->site_isolate->patient_last_name }}</td>
                    </tr>
                    <tr>
                      {{-- <td colspan="2">Date of Birth: {{ isset($isolate->site_isolate->patient_date_of_birth) ? $isolate->site_isolate->patient_date_of_birth->format('m/d/Y') : '' }}</td> --}}
                      <td>Age: {{ $isolate->site_isolate->patient_age }}</td>
                      <td>Sex: {{ $isolate->site_isolate->patient_sex }}</td>
                      <td>Ward: {{ $isolate->site_isolate->ward }}</td>
                      <td>Date of Admission: {{ isset($isolate->site_isolate->date_of_admission) ? $isolate->site_isolate->date_of_admission : '' }}</td>
              
                    </tr>
                    <tr>
                      <td>
                        Attending Physician: {{ $isolate->site_isolate->attending_physician }}
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                   
                    <tr>
                      <th colspan="4">ISOLATE INFORMATION</th>
                    </tr>
                    <tr>
                      <td colspan="2">Specimen type: {{ $isolate->site_isolate->specimen_type }}</td>
                      <td>Date of Sample Collection: {{ isset($isolate->site_isolate->date_of_sample_collection) ? $isolate->site_isolate->date_of_sample_collection->format('m/d/Y') : '' }}</td>
                      <td>Date Received in ARSRL: {{ isset($isolate->site_isolate->date_received_arsrl) ? $isolate->site_isolate->date_received_arsrl->format('m/d/Y') : '' }}</td>
                    </tr>
                    <tr>
                      <th colspan="4">CULTURE RESULTS</th>
                    </tr>
                    <tr>
                      <td colspan="2">Bacterial Identification: {{ $isolate->site_isolate->bacterial_identification }}</td>
                      <td >ESBL: {{ $isolate->site_isolate->esbl }}</td>
                      <td>Date of Testing: {{ isset($isolate->site_isolate->date_of_testing) ? $isolate->site_isolate->date_of_testing->format('m/d/Y') : '' }}</td>
                    </tr>
                  
                    <tr>
                      <th colspan="4">ANTIMICROBIAL SUSCEPTIBILITY TESTS</th>
                    </tr>
                    <tr>
                      <td colspan="4">
                          <div class="table-responsive">
                              <table class="table table-sm align-middle">
                                <thead>
                                  <tr>
                                    <td>Antibiotic</td>
                                    <td>Disk</td>
                                    <td>RIS</td>
                                    <td>MIC</td>
                                    <td>RIS</td>
                                  </tr>
                                </thead>
                                <tbody class="align-middle">
                                  <tr>
                                    <td>Amikacin</td>
                                    <td>{{ isset($isolate->site_isolate->amk_disk) ? $isolate->site_isolate->amk_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amk_disk_ris) ? $isolate->site_isolate->amk_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amk_mic_operand) ? $isolate->site_isolate->amk_mic_operand  : '' }}{{ isset($isolate->site_isolate->amk_mic) ? $isolate->site_isolate->amk_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amk_mic_ris) ? $isolate->site_isolate->amk_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ampicillin</td>
                                    <td>{{ isset($isolate->site_isolate->amp_disk) ? $isolate->site_isolate->amp_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amp_disk_ris) ? $isolate->site_isolate->amp_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amp_mic_operand) ? $isolate->site_isolate->amp_mic_operand  : '' }}{{ isset($isolate->site_isolate->amp_mic) ? $isolate->site_isolate->amp_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amp_mic_ris) ? $isolate->site_isolate->amp_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ampicillin-Sulbactam</td>
                                    <td>{{ isset($isolate->site_isolate->sam_disk) ? $isolate->site_isolate->sam_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->sam_disk_ris) ? $isolate->site_isolate->sam_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->sam_mic_operand) ? $isolate->site_isolate->sam_mic_operand  : '' }}{{ isset($isolate->site_isolate->sam_mic) ? $isolate->site_isolate->sam_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->sam_mic_ris) ? $isolate->site_isolate->sam_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Amoxicillin-clavulanic acid</td>
                                    <td>{{ isset($isolate->site_isolate->amc_disk) ? $isolate->site_isolate->amc_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amc_disk_ris) ? $isolate->site_isolate->amc_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amc_mic_operand) ? $isolate->site_isolate->amc_mic_operand  : '' }}{{ isset($isolate->site_isolate->amc_mic) ? $isolate->site_isolate->amc_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->amc_mic_ris) ? $isolate->site_isolate->amc_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Aztreonam</td>
                                    <td>{{ isset($isolate->site_isolate->atm_disk) ? $isolate->site_isolate->atm_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->atm_disk_ris) ? $isolate->site_isolate->atm_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->atm_mic_operand) ? $isolate->site_isolate->atm_mic_operand  : '' }}{{ isset($isolate->site_isolate->atm_mic) ? $isolate->site_isolate->atm_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->atm_mic_ris) ? $isolate->site_isolate->atm_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cefepime</td>
                                    <td>{{ isset($isolate->site_isolate->fep_disk) ? $isolate->site_isolate->fep_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->fep_disk_ris) ? $isolate->site_isolate->fep_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->fep_mic_operand) ? $isolate->site_isolate->fep_mic_operand  : '' }}{{ isset($isolate->site_isolate->fep_mic) ? $isolate->site_isolate->fep_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->fep_mic_ris) ? $isolate->site_isolate->fep_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cefotaxime</td>
                                    <td>{{ isset($isolate->site_isolate->ctx_disk) ? $isolate->site_isolate->ctx_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->ctx_disk_ris) ? $isolate->site_isolate->ctx_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->ctx_mic_operand) ? $isolate->site_isolate->ctx_mic_operand  : '' }}{{ isset($isolate->site_isolate->ctx_mic) ? $isolate->site_isolate->ctx_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->ctx_mic_ris) ? $isolate->site_isolate->ctx_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cefoxitin</td>
                                    <td>{{ isset($isolate->site_isolate->fox_disk) ? $isolate->site_isolate->fox_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->fox_disk_ris) ? $isolate->site_isolate->fox_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->fox_mic_operand) ? $isolate->site_isolate->fox_mic_operand  : '' }}{{ isset($isolate->site_isolate->fox_mic) ? $isolate->site_isolate->fox_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->fox_mic_ris) ? $isolate->site_isolate->fox_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cefuroxime</td>
                                    <td>{{ isset($isolate->site_isolate->cxa_disk) ? $isolate->site_isolate->cxa_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cxa_disk_ris) ? $isolate->site_isolate->cxa_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cxa_mic_operand) ? $isolate->site_isolate->cxa_mic_operand  : '' }}{{ isset($isolate->site_isolate->cxa_mic) ? $isolate->site_isolate->cxa_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cxa_mic_ris) ? $isolate->site_isolate->cxa_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ceftazidime</td>
                                    <td>{{ isset($isolate->site_isolate->caz_disk) ? $isolate->site_isolate->caz_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->caz_disk_ris) ? $isolate->site_isolate->caz_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->caz_mic_operand) ? $isolate->site_isolate->caz_mic_operand  : '' }}{{ isset($isolate->site_isolate->caz_mic) ? $isolate->site_isolate->caz_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->caz_mic_ris) ? $isolate->site_isolate->caz_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cefazolin</td>
                                    <td>{{ isset($isolate->site_isolate->czo_disk) ? $isolate->site_isolate->czo_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->czo_disk_ris) ? $isolate->site_isolate->czo_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->czo_mic_operand) ? $isolate->site_isolate->czo_mic_operand  : '' }}{{ isset($isolate->site_isolate->czo_mic) ? $isolate->site_isolate->czo_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->czo_mic_ris) ? $isolate->site_isolate->czo_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ceftazidime-avibactam</td>
                                    <td>{{ isset($isolate->site_isolate->cza_disk) ? $isolate->site_isolate->cza_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cza_disk_ris) ? $isolate->site_isolate->cza_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cza_mic_operand) ? $isolate->site_isolate->cza_mic_operand  : '' }}{{ isset($isolate->site_isolate->cza_mic) ? $isolate->site_isolate->cza_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cza_mic_ris) ? $isolate->site_isolate->cza_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ceftolozane-tazobactam</td>
                                    <td>{{ isset($isolate->site_isolate->czt_disk) ? $isolate->site_isolate->czt_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->czt_disk_ris) ? $isolate->site_isolate->czt_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->czt_mic_operand) ? $isolate->site_isolate->czt_mic_operand  : '' }}{{ isset($isolate->site_isolate->czt_mic) ? $isolate->site_isolate->czt_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->czt_mic_ris) ? $isolate->site_isolate->czt_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ceftriaxone</td>
                                    <td>{{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cro_mic_operand) ? $isolate->site_isolate->cro_mic_operand  : '' }}{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Chloramphenicol</td>
                                    <td>{{ isset($isolate->site_isolate->chl_disk) ? $isolate->site_isolate->chl_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->chl_disk_ris) ? $isolate->site_isolate->chl_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->chl_mic_operand) ? $isolate->site_isolate->chl_mic_operand  : '' }}{{ isset($isolate->site_isolate->chl_mic) ? $isolate->site_isolate->chl_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->chl_mic_ris) ? $isolate->site_isolate->chl_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ciprofloxacin</td>
                                    <td>{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cip_mic_operand) ? $isolate->site_isolate->cip_mic_operand  : '' }}{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Colistin</td>
                                    <td>{{ isset($isolate->site_isolate->col_disk) ? $isolate->site_isolate->col_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->col_disk_ris) ? $isolate->site_isolate->col_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->col_mic_operand) ? $isolate->site_isolate->col_mic_operand  : '' }}{{ isset($isolate->site_isolate->col_mic) ? $isolate->site_isolate->col_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->col_mic_ris) ? $isolate->site_isolate->col_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ertapenem</td>
                                    <td>{{ isset($isolate->site_isolate->etp_disk) ? $isolate->site_isolate->etp_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->etp_disk_ris) ? $isolate->site_isolate->etp_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->etp_mic_operand) ? $isolate->site_isolate->etp_mic_operand  : '' }}{{ isset($isolate->site_isolate->etp_mic) ? $isolate->site_isolate->etp_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->etp_mic_ris) ? $isolate->site_isolate->etp_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Gentamicin</td>
                                    <td>{{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->gen_mic_operand) ? $isolate->site_isolate->gen_mic_operand  : '' }}{{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Imipenem</td>
                                    <td>{{ isset($isolate->site_isolate->ipm_disk) ? $isolate->site_isolate->ipm_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->ipm_disk_ris) ? $isolate->site_isolate->ipm_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->ipm_mic_operand) ? $isolate->site_isolate->ipm_mic_operand  : '' }}{{ isset($isolate->site_isolate->ipm_mic) ? $isolate->site_isolate->ipm_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->ipm_mic_ris) ? $isolate->site_isolate->ipm_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Levofloxacin</td>
                                    <td>{{ isset($isolate->site_isolate->lvx_disk) ? $isolate->site_isolate->lvx_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->lvx_disk_ris) ? $isolate->site_isolate->lvx_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->lvx_mic_operand) ? $isolate->site_isolate->lvx_mic_operand  : '' }}{{ isset($isolate->site_isolate->lvx_mic) ? $isolate->site_isolate->lvx_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->lvx_mic_ris) ? $isolate->site_isolate->lvx_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Meropenem</td>
                                    <td>{{ isset($isolate->site_isolate->mem_disk) ? $isolate->site_isolate->mem_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->mem_disk_ris) ? $isolate->site_isolate->mem_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->mem_mic_operand) ? $isolate->site_isolate->mem_mic_operand  : '' }}{{ isset($isolate->site_isolate->mem_mic) ? $isolate->site_isolate->mem_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->mem_mic_ris) ? $isolate->site_isolate->mem_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Piperacillin-Tazobactam</td>
                                    <td>{{ isset($isolate->site_isolate->tzp_disk) ? $isolate->site_isolate->tzp_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tzp_disk_ris) ? $isolate->site_isolate->tzp_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tzp_mic_operand) ? $isolate->site_isolate->tzp_mic_operand  : '' }}{{ isset($isolate->site_isolate->tzp_mic) ? $isolate->site_isolate->tzp_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tzp_mic_ris) ? $isolate->site_isolate->tzp_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Tetracycline</td>
                                    <td>{{ isset($isolate->site_isolate->tet_disk) ? $isolate->site_isolate->tet_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tet_disk_ris) ? $isolate->site_isolate->tet_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tet_mic_operand) ? $isolate->site_isolate->tet_mic_operand  : '' }}{{ isset($isolate->site_isolate->tet_mic) ? $isolate->site_isolate->tet_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tet_mic_ris) ? $isolate->site_isolate->tet_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Tobramycin</td>
                                    <td>{{ isset($isolate->site_isolate->tob_disk) ? $isolate->site_isolate->tob_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tob_disk_ris) ? $isolate->site_isolate->tob_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tob_mic_operand) ? $isolate->site_isolate->tob_mic_operand  : '' }}{{ isset($isolate->site_isolate->tob_mic) ? $isolate->site_isolate->tob_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tob_mic_ris) ? $isolate->site_isolate->tob_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Trimethoprim-sulfamethoxazole</td>
                                    <td>{{ isset($isolate->site_isolate->sxt_disk) ? $isolate->site_isolate->sxt_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->sxt_disk_ris) ? $isolate->site_isolate->sxt_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->sxt_mic_operand) ? $isolate->site_isolate->sxt_mic_operand  : '' }}{{ isset($isolate->site_isolate->sxt_mic) ? $isolate->site_isolate->sxt_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->sxt_mic_ris) ? $isolate->site_isolate->sxt_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Date Released: {{ isset($isolate->site_isolate->date_released) ? $isolate->site_isolate->date_released->format('m/d/Y') : '' }}</td>
                                    <td colspan="2">Verified by: {{ $isolate->site_isolate->verified_by }}</td>
                                    <td colspan="2">Noted by: {{ $isolate->site_isolate->noted_by }}</td>
                                    
                                   
                                  </tr>
                                  <tr>
                                    <td colspan="6">Remarks: {{ $isolate->site_isolate->remarks }}</td>
                                  </tr>
                              
                                </tbody>
                              </table>
                            </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
        
          </div>
        </div>
      </div>
    </div>

     

    {{-- $isolate->lab_isolate->beta_lactamase --}}
    <hr>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="organism_code">Bacterial Identification</label>
        {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->organism_code) ? $isolate->site_isolate->organism_code  : '' }}" id="organism_code" name="organism_code" placeholder="Organism Code"> --}}
        <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->bacterial_identification) & $isolate->lab_isolate->bacterial_identification != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="bacterial_identification" id="bacterial_identification">
          <option selected> </option>
          @forelse($organisms as $organism)
          <option {{ isset($isolate->lab_isolate->bacterial_identification) & $isolate->lab_isolate->bacterial_identification == $organism->ORGANISM ? 'selected'  : '' }} value="{{ $organism->ORGANISM }}">{{ $organism->ORGANISM }}</option>
          @empty
          @endforelse
        </select>
      </div>
      <div class="form-group col-md-4 ">
        <label for="esbl">ESBL</label>
        <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->esbl) & $isolate->lab_isolate->esbl != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="esbl">
          <option selected> </option>
          <option {{ isset($isolate->lab_isolate->esbl) & $isolate->lab_isolate->esbl == 'positive' ? 'selected'  : '' }} value="positive">+</option>
          <option {{ isset($isolate->lab_isolate->esbl) & $isolate->lab_isolate->esbl == 'negative' ? 'selected'  : '' }} value="negative">-</option>
          <option {{ isset($isolate->lab_isolate->esbl) & $isolate->lab_isolate->esbl == 'not tested' ? 'selected'  : '' }} value="not tested">Not Tested</option>
        </select>
      </div>
    </div>
  

   <hr>
    <div class="row">
    <div class="form-group col-md-6 mb-3">
      <label for="date_received">Date of Testing</label>
      <input type="date" class="form-control {{ isset($isolate->lab_isolate->date_of_testing) & $isolate->lab_isolate->date_of_testing != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->lab_isolate->date_of_testing) ? $isolate->lab_isolate->date_of_testing->toDateString()  : '' }}" id="date_test" name='date_of_testing' placeholder="Date of Test (e.g. mm/dd/yyyy)">
    </div>
    </div>
    <div class="row">
        <div class="table-responsive">
          <table class="table table-sm align-middle">
            <thead>
              <tr>
                <td>Antibiotic</td>
                <td>Disk</td>
                <td>RIS</td>
                <td>MIC</td>
                <td> </td>
                <td>RIS</td>
              </tr>
            </thead>
            <tbody class="align-middle">
              <tr>
                <td>Amikacin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amk_disk) & $isolate->lab_isolate->amk_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amk_disk) ? $isolate->lab_isolate->amk_disk  : '' }}" type="number" step="any"  min="0.00" name="amk_disk" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amk_disk_ris) ? $isolate->lab_isolate->amk_disk_ris  : '' }}" type="text" name="amk_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amk_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->amk_disk_ris) & $isolate->lab_isolate->amk_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amk_mic_operand) & $isolate->lab_isolate->amk_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amk_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->lab_isolate->amk_mic_operand) & $isolate->lab_isolate->amk_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->lab_isolate->amk_mic_operand) & $isolate->lab_isolate->amk_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->lab_isolate->amk_mic_operand) & $isolate->lab_isolate->amk_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->lab_isolate->amk_mic_operand) & $isolate->lab_isolate->amk_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amk_mic) & $isolate->lab_isolate->amk_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amk_mic) ? $isolate->lab_isolate->amk_mic  : '' }}" type="number" step="any"  min="0.0001"   name="amk_mic" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amk_mic_ris) ? $isolate->lab_isolate->amk_mic_ris  : '' }}" type="text" name="amk_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amk_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->amk_mic_ris) & $isolate->lab_isolate->amk_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
              </tr>

              <tr>
                <td>Ampicillin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amp_disk) & $isolate->lab_isolate->amp_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amp_disk) ? $isolate->lab_isolate->amp_disk  : '' }}" type="number" step="any"  min="0.0"  name="amp_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amp_disk_ris) ? $isolate->lab_isolate->amp_disk_ris  : '' }}" type="text" name="amp_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amp_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->amp_disk_ris) & $isolate->lab_isolate->amp_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amp_mic_operand) & $isolate->lab_isolate->amp_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amp_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->lab_isolate->amp_mic_operand) & $isolate->lab_isolate->amp_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->lab_isolate->amp_mic_operand) & $isolate->lab_isolate->amp_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->lab_isolate->amp_mic_operand) & $isolate->lab_isolate->amp_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->lab_isolate->amp_mic_operand) & $isolate->lab_isolate->amp_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amp_mic) & $isolate->lab_isolate->amp_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amp_mic) ? $isolate->lab_isolate->amp_mic  : '' }}" type="number" step="any"   name="amp_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amp_mic_ris) ? $isolate->lab_isolate->amp_mic_ris  : '' }}" type="text" name="amp_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amp_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->amp_mic_ris) & $isolate->lab_isolate->amp_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
              </tr>


              <tr>
                <td>Ampicillin-Sulbactam</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sam_disk) & $isolate->lab_isolate->sam_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sam_disk) ? $isolate->lab_isolate->sam_disk  : '' }}" type="number" step="any"  min="0.0"  name="sam_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sam_disk_ris) ? $isolate->lab_isolate->sam_disk_ris  : '' }}" type="text" name="sam_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg exsamle" name="sam_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->sam_disk_ris) & $isolate->lab_isolate->sam_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->sam_mic_operand) & $isolate->lab_isolate->sam_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg exsamle" name="sam_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->lab_isolate->sam_mic_operand) & $isolate->lab_isolate->sam_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->lab_isolate->sam_mic_operand) & $isolate->lab_isolate->sam_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->lab_isolate->sam_mic_operand) & $isolate->lab_isolate->sam_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->lab_isolate->sam_mic_operand) & $isolate->lab_isolate->sam_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sam_mic) & $isolate->lab_isolate->sam_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sam_mic) ? $isolate->lab_isolate->sam_mic  : '' }}" type="number" step="any"   name="sam_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sam_mic_ris) ? $isolate->lab_isolate->sam_mic_ris  : '' }}" type="text" name="sam_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg exsamle" name="sam_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->sam_mic_ris) & $isolate->lab_isolate->sam_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
              </tr>


              <tr>
                <td>Amoxicillin-clavulanic acid</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amc_disk) & $isolate->lab_isolate->amc_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amc_disk) ? $isolate->lab_isolate->amc_disk  : '' }}" type="number" step="any"  min="0.0"  name="amc_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amc_disk_ris) ? $isolate->lab_isolate->amc_disk_ris  : '' }}" type="text" name="amc_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amc_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->amc_disk_ris) & $isolate->lab_isolate->amc_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amc_mic_operand) & $isolate->lab_isolate->amc_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amc_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->lab_isolate->amc_mic_operand) & $isolate->lab_isolate->amc_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->lab_isolate->amc_mic_operand) & $isolate->lab_isolate->amc_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->lab_isolate->amc_mic_operand) & $isolate->lab_isolate->amc_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->lab_isolate->amc_mic_operand) & $isolate->lab_isolate->amc_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amc_mic) & $isolate->lab_isolate->amc_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amc_mic) ? $isolate->lab_isolate->amc_mic  : '' }}" type="number"  step="any"   name="amc_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->amc_mic_ris) ? $isolate->lab_isolate->amc_mic_ris  : '' }}" type="text" name="amc_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amc_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->amc_mic_ris) & $isolate->lab_isolate->amc_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
              </tr>


              <tr>
                <td>Aztreonam</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->atm_disk) & $isolate->lab_isolate->atm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->atm_disk) ? $isolate->lab_isolate->atm_disk  : '' }}" type="number" step="any"  min="0.0"  name="atm_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->atm_disk_ris) ? $isolate->lab_isolate->atm_disk_ris  : '' }}" type="text" name="atm_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="atm_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->atm_disk_ris) & $isolate->lab_isolate->atm_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->atm_mic_operand) & $isolate->lab_isolate->atm_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="atm_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->lab_isolate->atm_mic_operand) & $isolate->lab_isolate->atm_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->lab_isolate->atm_mic_operand) & $isolate->lab_isolate->atm_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->lab_isolate->atm_mic_operand) & $isolate->lab_isolate->atm_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->lab_isolate->atm_mic_operand) & $isolate->lab_isolate->atm_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->atm_mic) & $isolate->lab_isolate->atm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->atm_mic) ? $isolate->lab_isolate->atm_mic  : '' }}" type="number" step="any"   name="atm_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->atm_mic_ris) ? $isolate->lab_isolate->atm_mic_ris  : '' }}" type="text" name="atm_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="atm_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->atm_mic_ris) & $isolate->lab_isolate->atm_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
              </tr>



              <tr>
                <td>Cefepime</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fep_disk) & $isolate->lab_isolate->fep_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fep_disk) ? $isolate->lab_isolate->fep_disk  : '' }}" type="number" step="any"  min="6.00"  name="fep_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fep_disk_ris) ? $isolate->lab_isolate->fep_disk_ris  : '' }}" type="text" name="fep_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fep_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->fep_disk_ris) & $isolate->lab_isolate->fep_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->fep_mic_operand) & $isolate->lab_isolate->fep_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fep_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->lab_isolate->fep_mic_operand) & $isolate->lab_isolate->fep_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->lab_isolate->fep_mic_operand) & $isolate->lab_isolate->fep_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->lab_isolate->fep_mic_operand) & $isolate->lab_isolate->fep_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->lab_isolate->fep_mic_operand) & $isolate->lab_isolate->fep_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fep_mic) & $isolate->lab_isolate->fep_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fep_mic) ? $isolate->lab_isolate->fep_mic  : '' }}" type="number" step="any"   name="fep_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fep_mic_ris) ? $isolate->lab_isolate->fep_mic_ris  : '' }}" type="text" name="fep_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fep_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->lab_isolate->fep_mic_ris) & $isolate->lab_isolate->fep_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
                </select></td>
              </tr>

            
   
            <tr>
              <td>Cefotaxime</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ctx_disk) & $isolate->lab_isolate->ctx_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ctx_disk) ? $isolate->lab_isolate->ctx_disk  : '' }}" type="number" step="any"  min="6.00"  name="ctx_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ctx_disk_ris) ? $isolate->lab_isolate->ctx_disk_ris  : '' }}" type="text" name="ctx_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ctx_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->ctx_disk_ris) & $isolate->lab_isolate->ctx_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ctx_mic_operand) & $isolate->lab_isolate->ctx_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ctx_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->ctx_mic_operand) & $isolate->lab_isolate->ctx_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->ctx_mic_operand) & $isolate->lab_isolate->ctx_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->ctx_mic_operand) & $isolate->lab_isolate->ctx_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->ctx_mic_operand) & $isolate->lab_isolate->ctx_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ctx_mic) & $isolate->lab_isolate->ctx_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ctx_mic) ? $isolate->lab_isolate->ctx_mic  : '' }}" type="number" step="any"   name="ctx_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ctx_mic_ris) ? $isolate->lab_isolate->ctx_mic_ris  : '' }}" type="text" name="ctx_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ctx_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->ctx_mic_ris) & $isolate->lab_isolate->ctx_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Cefotaxime/Cefotaxime + Clavulanic Acid</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ct_ctl_disk) & $isolate->lab_isolate->ct_ctl_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ct_ctl_disk) ? $isolate->lab_isolate->ct_ctl_disk  : '' }}" type="number" step="any"  min="6.00"  name="ct_ctl_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ct_ctl_disk_ris) ? $isolate->lab_isolate->ct_ctl_disk_ris  : '' }}" type="text" name="ct_ctl_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ct_ctl_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_disk_ris) & $isolate->lab_isolate->ct_ctl_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ct_ctl_mic_operand) & $isolate->lab_isolate->ct_ctl_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ct_ctl_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->ct_ctl_mic_operand) & $isolate->lab_isolate->ct_ctl_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->ct_ctl_mic_operand) & $isolate->lab_isolate->ct_ctl_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->ct_ctl_mic_operand) & $isolate->lab_isolate->ct_ctl_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->ct_ctl_mic_operand) & $isolate->lab_isolate->ct_ctl_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ct_ctl_mic) & $isolate->lab_isolate->ct_ctl_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ct_ctl_mic) ? $isolate->lab_isolate->ct_ctl_mic  : '' }}" type="number" step="any"   name="ct_ctl_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ct_ctl_mic_ris) ? $isolate->lab_isolate->ct_ctl_mic_ris  : '' }}" type="text" name="ct_ctl_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ct_ctl_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->ct_ctl_mic_ris) & $isolate->lab_isolate->ct_ctl_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>
  
            <tr>
              <td>Cefoxitin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fox_disk) & $isolate->lab_isolate->fox_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fox_disk) ? $isolate->lab_isolate->fox_disk  : '' }}" type="number" step="any"  min="0.0"  name="fox_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fox_disk_ris) ? $isolate->lab_isolate->fox_disk_ris  : '' }}" type="text" name="fox_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fox_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->fox_disk_ris) & $isolate->lab_isolate->fox_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->fox_mic_operand) & $isolate->lab_isolate->fox_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fox_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->fox_mic_operand) & $isolate->lab_isolate->fox_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->fox_mic_operand) & $isolate->lab_isolate->fox_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->fox_mic_operand) & $isolate->lab_isolate->fox_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->fox_mic_operand) & $isolate->lab_isolate->fox_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fox_mic) & $isolate->lab_isolate->fox_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fox_mic) ? $isolate->lab_isolate->fox_mic  : '' }}" type="number" step="any"    name="fox_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->fox_mic_ris) ? $isolate->lab_isolate->fox_mic_ris  : '' }}" type="text" name="fox_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fox_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->fox_mic_ris) & $isolate->lab_isolate->fox_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>
     
            <tr>
              <td>Cefuroxime</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cxa_disk) & $isolate->lab_isolate->cxa_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cxa_disk) ? $isolate->lab_isolate->cxa_disk  : '' }}" type="number" step="any"  min="0.0"  name="cxa_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cxa_disk_ris) ? $isolate->lab_isolate->cxa_disk_ris  : '' }}" type="text" name="cxa_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cxa_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cxa_disk_ris) & $isolate->lab_isolate->cxa_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cxa_mic_operand) & $isolate->lab_isolate->cxa_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cxa_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cxa_mic_operand) & $isolate->lab_isolate->cxa_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->cxa_mic_operand) & $isolate->lab_isolate->cxa_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->cxa_mic_operand) & $isolate->lab_isolate->cxa_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->cxa_mic_operand) & $isolate->lab_isolate->cxa_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cxa_mic) & $isolate->lab_isolate->cxa_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cxa_mic) ? $isolate->lab_isolate->cxa_mic  : '' }}" type="number" step="any"    name="cxa_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cxa_mic_ris) ? $isolate->lab_isolate->cxa_mic_ris  : '' }}" type="text" name="cxa_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cxa_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cxa_mic_ris) & $isolate->lab_isolate->cxa_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>



            <tr>
              <td>Ceftazidime</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->caz_disk) & $isolate->lab_isolate->caz_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->caz_disk) ? $isolate->lab_isolate->caz_disk  : '' }}" type="number" step="any"  min="0.0"  name="caz_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->caz_disk_ris) ? $isolate->lab_isolate->caz_disk_ris  : '' }}" type="text" name="caz_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="caz_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->caz_disk_ris) & $isolate->lab_isolate->caz_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->caz_mic_operand) & $isolate->lab_isolate->caz_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="caz_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->caz_mic_operand) & $isolate->lab_isolate->caz_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->caz_mic_operand) & $isolate->lab_isolate->caz_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->caz_mic_operand) & $isolate->lab_isolate->caz_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->caz_mic_operand) & $isolate->lab_isolate->caz_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->caz_mic) & $isolate->lab_isolate->caz_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->caz_mic) ? $isolate->lab_isolate->caz_mic  : '' }}" type="number" step="any"    name="caz_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->caz_mic_ris) ? $isolate->lab_isolate->caz_mic_ris  : '' }}" type="text" name="caz_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="caz_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->caz_mic_ris) & $isolate->lab_isolate->caz_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Ceftazidime/Ceftazidime + Clavulanic Acid</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tz_tzl_disk) & $isolate->lab_isolate->tz_tzl_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tz_tzl_disk) ? $isolate->lab_isolate->tz_tzl_disk  : '' }}" type="number" step="any"  min="0.0"  name="tz_tzl_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tz_tzl_disk_ris) ? $isolate->lab_isolate->tz_tzl_disk_ris  : '' }}" type="text" name="tz_tzl_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tz_tzl_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_disk_ris) & $isolate->lab_isolate->tz_tzl_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tz_tzl_mic_operand) & $isolate->lab_isolate->tz_tzl_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tz_tzl_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->tz_tzl_mic_operand) & $isolate->lab_isolate->tz_tzl_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->tz_tzl_mic_operand) & $isolate->lab_isolate->tz_tzl_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->tz_tzl_mic_operand) & $isolate->lab_isolate->tz_tzl_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->tz_tzl_mic_operand) & $isolate->lab_isolate->tz_tzl_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tz_tzl_mic) & $isolate->lab_isolate->tz_tzl_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tz_tzl_mic) ? $isolate->lab_isolate->tz_tzl_mic  : '' }}" type="number" step="any"    name="tz_tzl_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tz_tzl_mic_ris) ? $isolate->lab_isolate->tz_tzl_mic_ris  : '' }}" type="text" name="tz_tzl_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tz_tzl_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tz_tzl_mic_ris) & $isolate->lab_isolate->tz_tzl_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>

            <tr>
              <td>Cefazolin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czo_disk) & $isolate->lab_isolate->czo_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czo_disk) ? $isolate->lab_isolate->czo_disk  : '' }}" type="number" step="any"  min="0.0"  name="czo_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czo_disk_ris) ? $isolate->lab_isolate->czo_disk_ris  : '' }}" type="text" name="czo_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czo_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->czo_disk_ris) & $isolate->lab_isolate->czo_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->czo_mic_operand) & $isolate->lab_isolate->czo_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czo_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->czo_mic_operand) & $isolate->lab_isolate->czo_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->czo_mic_operand) & $isolate->lab_isolate->czo_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->czo_mic_operand) & $isolate->lab_isolate->czo_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->czo_mic_operand) & $isolate->lab_isolate->czo_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czo_mic) & $isolate->lab_isolate->czo_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czo_mic) ? $isolate->lab_isolate->czo_mic  : '' }}" type="number" step="any"    name="czo_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czo_mic_ris) ? $isolate->lab_isolate->czo_mic_ris  : '' }}" type="text" name="czo_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czo_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->czo_mic_ris) & $isolate->lab_isolate->czo_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Ceftazidime-avibactam</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cza_disk) & $isolate->lab_isolate->cza_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cza_disk) ? $isolate->lab_isolate->cza_disk  : '' }}" type="number" step="any"  min="0.0"  name="cza_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cza_disk_ris) ? $isolate->lab_isolate->cza_disk_ris  : '' }}" type="text" name="cza_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cza_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cza_disk_ris) & $isolate->lab_isolate->cza_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cza_mic_operand) & $isolate->lab_isolate->cza_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cza_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cza_mic_operand) & $isolate->lab_isolate->cza_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->cza_mic_operand) & $isolate->lab_isolate->cza_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->cza_mic_operand) & $isolate->lab_isolate->cza_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->cza_mic_operand) & $isolate->lab_isolate->cza_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cza_mic) & $isolate->lab_isolate->cza_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cza_mic) ? $isolate->lab_isolate->cza_mic  : '' }}" type="number" step="any"    name="cza_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cza_mic_ris) ? $isolate->lab_isolate->cza_mic_ris  : '' }}" type="text" name="cza_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cza_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cza_mic_ris) & $isolate->lab_isolate->cza_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Ceftolozane-tazobactam</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czt_disk) & $isolate->lab_isolate->czt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czt_disk) ? $isolate->lab_isolate->czt_disk  : '' }}" type="number" step="any"  min="0.0"  name="czt_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czt_disk_ris) ? $isolate->lab_isolate->czt_disk_ris  : '' }}" type="text" name="czt_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czt_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->czt_disk_ris) & $isolate->lab_isolate->czt_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->czt_mic_operand) & $isolate->lab_isolate->czt_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czt_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->czt_mic_operand) & $isolate->lab_isolate->czt_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->czt_mic_operand) & $isolate->lab_isolate->czt_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->czt_mic_operand) & $isolate->lab_isolate->czt_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->czt_mic_operand) & $isolate->lab_isolate->czt_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czt_mic) & $isolate->lab_isolate->czt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czt_mic) ? $isolate->lab_isolate->czt_mic  : '' }}" type="number" step="any"    name="czt_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->czt_mic_ris) ? $isolate->lab_isolate->czt_mic_ris  : '' }}" type="text" name="czt_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czt_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->czt_mic_ris) & $isolate->lab_isolate->czt_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Ceftriaxone</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_disk) & $isolate->lab_isolate->cro_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}" type="number" step="any"  min="0.0"  name="cro_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}" type="text" name="cro_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cro_mic_operand) & $isolate->lab_isolate->cro_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_operand) & $isolate->lab_isolate->cro_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_operand) & $isolate->lab_isolate->cro_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_operand) & $isolate->lab_isolate->cro_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_operand) & $isolate->lab_isolate->cro_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_mic) & $isolate->lab_isolate->cro_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}" type="number" step="any"    name="cro_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}" type="text" name="cro_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>



            <tr>
              <td>Chloramphenicol</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->chl_disk) & $isolate->lab_isolate->chl_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->chl_disk) ? $isolate->lab_isolate->chl_disk  : '' }}" type="number" step="any"  min="0.0"  name="chl_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->chl_disk_ris) ? $isolate->lab_isolate->chl_disk_ris  : '' }}" type="text" name="chl_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="chl_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->chl_disk_ris) & $isolate->lab_isolate->chl_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->chl_mic_operand) & $isolate->lab_isolate->chl_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="chl_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->chl_mic_operand) & $isolate->lab_isolate->chl_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->chl_mic_operand) & $isolate->lab_isolate->chl_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->chl_mic_operand) & $isolate->lab_isolate->chl_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->chl_mic_operand) & $isolate->lab_isolate->chl_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->chl_mic) & $isolate->lab_isolate->chl_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->chl_mic) ? $isolate->lab_isolate->chl_mic  : '' }}" type="number" step="any"    name="chl_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->chl_mic_ris) ? $isolate->lab_isolate->chl_mic_ris  : '' }}" type="text" name="chl_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="chl_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->chl_mic_ris) & $isolate->lab_isolate->chl_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>



            
            <tr>
              <td>Ciprofloxacin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_disk) & $isolate->lab_isolate->cip_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}" type="number" step="any"  min="0.0"  name="cip_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}" type="text" name="cip_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cip_mic_operand) & $isolate->lab_isolate->cip_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_operand) & $isolate->lab_isolate->cip_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_operand) & $isolate->lab_isolate->cip_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_operand) & $isolate->lab_isolate->cip_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_operand) & $isolate->lab_isolate->cip_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_mic) & $isolate->lab_isolate->cip_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}" type="number" step="any"    name="cip_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}" type="text" name="cip_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>



            <tr>
              <td>Colistin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->col_disk) & $isolate->lab_isolate->col_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->col_disk) ? $isolate->lab_isolate->col_disk  : '' }}" type="number" step="any"  min="0.0"  name="col_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->col_disk_ris) ? $isolate->lab_isolate->col_disk_ris  : '' }}" type="text" name="col_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="col_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->col_disk_ris) & $isolate->lab_isolate->col_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->col_mic_operand) & $isolate->lab_isolate->col_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="col_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->col_mic_operand) & $isolate->lab_isolate->col_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->col_mic_operand) & $isolate->lab_isolate->col_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->col_mic_operand) & $isolate->lab_isolate->col_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->col_mic_operand) & $isolate->lab_isolate->col_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->col_mic) & $isolate->lab_isolate->col_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->col_mic) ? $isolate->lab_isolate->col_mic  : '' }}" type="number" step="any"    name="col_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->col_mic_ris) ? $isolate->lab_isolate->col_mic_ris  : '' }}" type="text" name="col_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="col_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->col_mic_ris) & $isolate->lab_isolate->col_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>

            <tr>
              <td>Ertapenem</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->etp_disk) & $isolate->lab_isolate->etp_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->etp_disk) ? $isolate->lab_isolate->etp_disk  : '' }}" type="number" step="any"  min="0.0"  name="etp_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->etp_disk_ris) ? $isolate->lab_isolate->etp_disk_ris  : '' }}" type="text" name="etp_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="etp_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->etp_disk_ris) & $isolate->lab_isolate->etp_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->etp_mic_operand) & $isolate->lab_isolate->etp_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="etp_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->etp_mic_operand) & $isolate->lab_isolate->etp_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->etp_mic_operand) & $isolate->lab_isolate->etp_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->etp_mic_operand) & $isolate->lab_isolate->etp_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->etp_mic_operand) & $isolate->lab_isolate->etp_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->etp_mic) & $isolate->lab_isolate->etp_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->etp_mic) ? $isolate->lab_isolate->etp_mic  : '' }}" type="number" step="any"    name="etp_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->etp_mic_ris) ? $isolate->lab_isolate->etp_mic_ris  : '' }}" type="text" name="etp_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="etp_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->etp_mic_ris) & $isolate->lab_isolate->etp_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Gentamicin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_disk) & $isolate->lab_isolate->gen_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}" type="number" step="any"  min="0.0"  name="gen_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}" type="text" name="gen_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->gen_mic_operand) & $isolate->lab_isolate->gen_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_operand) & $isolate->lab_isolate->gen_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_operand) & $isolate->lab_isolate->gen_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_operand) & $isolate->lab_isolate->gen_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_operand) & $isolate->lab_isolate->gen_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_mic) & $isolate->lab_isolate->gen_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}" type="number" step="any"    name="gen_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}" type="text" name="gen_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>

            <tr>
              <td>Imipenem</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ipm_disk) & $isolate->lab_isolate->ipm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ipm_disk) ? $isolate->lab_isolate->ipm_disk  : '' }}" type="number" step="any"  min="0.0"  name="ipm_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ipm_disk_ris) ? $isolate->lab_isolate->ipm_disk_ris  : '' }}" type="text" name="ipm_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ipm_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->ipm_disk_ris) & $isolate->lab_isolate->ipm_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ipm_mic_operand) & $isolate->lab_isolate->ipm_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ipm_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->ipm_mic_operand) & $isolate->lab_isolate->ipm_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->ipm_mic_operand) & $isolate->lab_isolate->ipm_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->ipm_mic_operand) & $isolate->lab_isolate->ipm_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->ipm_mic_operand) & $isolate->lab_isolate->ipm_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ipm_mic) & $isolate->lab_isolate->ipm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ipm_mic) ? $isolate->lab_isolate->ipm_mic  : '' }}" type="number" step="any"    name="ipm_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->ipm_mic_ris) ? $isolate->lab_isolate->ipm_mic_ris  : '' }}" type="text" name="ipm_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ipm_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->ipm_mic_ris) & $isolate->lab_isolate->ipm_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Levofloxacin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->lvx_disk) & $isolate->lab_isolate->lvx_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->lvx_disk) ? $isolate->lab_isolate->lvx_disk  : '' }}" type="number" step="any"  min="0.0"  name="lvx_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->lvx_disk_ris) ? $isolate->lab_isolate->lvx_disk_ris  : '' }}" type="text" name="lvx_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="lvx_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->lvx_disk_ris) & $isolate->lab_isolate->lvx_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->lvx_mic_operand) & $isolate->lab_isolate->lvx_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="lvx_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->lvx_mic_operand) & $isolate->lab_isolate->lvx_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->lvx_mic_operand) & $isolate->lab_isolate->lvx_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->lvx_mic_operand) & $isolate->lab_isolate->lvx_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->lvx_mic_operand) & $isolate->lab_isolate->lvx_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->lvx_mic) & $isolate->lab_isolate->lvx_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->lvx_mic) ? $isolate->lab_isolate->lvx_mic  : '' }}" type="number" step="any"    name="lvx_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->lvx_mic_ris) ? $isolate->lab_isolate->lvx_mic_ris  : '' }}" type="text" name="lvx_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="lvx_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->lvx_mic_ris) & $isolate->lab_isolate->lvx_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Meropenem</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->mem_disk) & $isolate->lab_isolate->mem_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->mem_disk) ? $isolate->lab_isolate->mem_disk  : '' }}" type="number" step="any"  min="0.0"  name="mem_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->mem_disk_ris) ? $isolate->lab_isolate->mem_disk_ris  : '' }}" type="text" name="mem_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="mem_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->mem_disk_ris) & $isolate->lab_isolate->mem_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->mem_mic_operand) & $isolate->lab_isolate->mem_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="mem_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->mem_mic_operand) & $isolate->lab_isolate->mem_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->mem_mic_operand) & $isolate->lab_isolate->mem_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->mem_mic_operand) & $isolate->lab_isolate->mem_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->mem_mic_operand) & $isolate->lab_isolate->mem_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->mem_mic) & $isolate->lab_isolate->mem_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->mem_mic) ? $isolate->lab_isolate->mem_mic  : '' }}" type="number" step="any"    name="mem_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->mem_mic_ris) ? $isolate->lab_isolate->mem_mic_ris  : '' }}" type="text" name="mem_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="mem_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->mem_mic_ris) & $isolate->lab_isolate->mem_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Piperacillin-Tazobactam</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tzp_disk) & $isolate->lab_isolate->tzp_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tzp_disk) ? $isolate->lab_isolate->tzp_disk  : '' }}" type="number" step="any"  min="0.0"  name="tzp_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tzp_disk_ris) ? $isolate->lab_isolate->tzp_disk_ris  : '' }}" type="text" name="tzp_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tzp_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tzp_disk_ris) & $isolate->lab_isolate->tzp_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tzp_mic_operand) & $isolate->lab_isolate->tzp_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tzp_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->tzp_mic_operand) & $isolate->lab_isolate->tzp_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->tzp_mic_operand) & $isolate->lab_isolate->tzp_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->tzp_mic_operand) & $isolate->lab_isolate->tzp_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->tzp_mic_operand) & $isolate->lab_isolate->tzp_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tzp_mic) & $isolate->lab_isolate->tzp_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tzp_mic) ? $isolate->lab_isolate->tzp_mic  : '' }}" type="number" step="any"    name="tzp_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tzp_mic_ris) ? $isolate->lab_isolate->tzp_mic_ris  : '' }}" type="text" name="tzp_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tzp_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tzp_mic_ris) & $isolate->lab_isolate->tzp_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Tetracycline</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tet_disk) & $isolate->lab_isolate->tet_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tet_disk) ? $isolate->lab_isolate->tet_disk  : '' }}" type="number" step="any"  min="0.0"  name="tet_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tet_disk_ris) ? $isolate->lab_isolate->tet_disk_ris  : '' }}" type="text" name="tet_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tet_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tet_disk_ris) & $isolate->lab_isolate->tet_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tet_mic_operand) & $isolate->lab_isolate->tet_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tet_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->tet_mic_operand) & $isolate->lab_isolate->tet_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->tet_mic_operand) & $isolate->lab_isolate->tet_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->tet_mic_operand) & $isolate->lab_isolate->tet_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->tet_mic_operand) & $isolate->lab_isolate->tet_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tet_mic) & $isolate->lab_isolate->tet_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tet_mic) ? $isolate->lab_isolate->tet_mic  : '' }}" type="number" step="any"    name="tet_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tet_mic_ris) ? $isolate->lab_isolate->tet_mic_ris  : '' }}" type="text" name="tet_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tet_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tet_mic_ris) & $isolate->lab_isolate->tet_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Tobramycin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tob_disk) & $isolate->lab_isolate->tob_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tob_disk) ? $isolate->lab_isolate->tob_disk  : '' }}" type="number" step="any"  min="0.0"  name="tob_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tob_disk_ris) ? $isolate->lab_isolate->tob_disk_ris  : '' }}" type="text" name="tob_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tob_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tob_disk_ris) & $isolate->lab_isolate->tob_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tob_mic_operand) & $isolate->lab_isolate->tob_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tob_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->tob_mic_operand) & $isolate->lab_isolate->tob_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->tob_mic_operand) & $isolate->lab_isolate->tob_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->tob_mic_operand) & $isolate->lab_isolate->tob_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->tob_mic_operand) & $isolate->lab_isolate->tob_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tob_mic) & $isolate->lab_isolate->tob_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tob_mic) ? $isolate->lab_isolate->tob_mic  : '' }}" type="number" step="any"    name="tob_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tob_mic_ris) ? $isolate->lab_isolate->tob_mic_ris  : '' }}" type="text" name="tob_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tob_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->tob_mic_ris) & $isolate->lab_isolate->tob_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>


            <tr>
              <td>Trimethoprim-sulfamethoxazole</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sxt_disk) & $isolate->lab_isolate->sxt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sxt_disk) ? $isolate->lab_isolate->sxt_disk  : '' }}" type="number" step="any"  min="0.0"  name="sxt_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sxt_disk_ris) ? $isolate->lab_isolate->sxt_disk_ris  : '' }}" type="text" name="sxt_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="sxt_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->sxt_disk_ris) & $isolate->lab_isolate->sxt_disk_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->sxt_mic_operand) & $isolate->lab_isolate->sxt_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="sxt_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->sxt_mic_operand) & $isolate->lab_isolate->sxt_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->lab_isolate->sxt_mic_operand) & $isolate->lab_isolate->sxt_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->lab_isolate->sxt_mic_operand) & $isolate->lab_isolate->sxt_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->lab_isolate->sxt_mic_operand) & $isolate->lab_isolate->sxt_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sxt_mic) & $isolate->lab_isolate->sxt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sxt_mic) ? $isolate->lab_isolate->sxt_mic  : '' }}" type="number" step="any"    name="sxt_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->sxt_mic_ris) ? $isolate->lab_isolate->sxt_mic_ris  : '' }}" type="text" name="sxt_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="sxt_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                <option {{ isset($isolate->lab_isolate->sxt_mic_ris) & $isolate->lab_isolate->sxt_mic_ris == 'SDD' ? 'selected'  : '' }} value="SDD">SDD</option>
              </select></td>
            </tr>
            </tbody>
          </table>
        </div>
        
    </div>
    
    <div class="row mb-3">
    <div class="form-group">
    <label for="comment">Remarks</label>
    <textarea class="form-control  {{ isset($isolate->lab_isolate->remarks) & $isolate->lab_isolate->remarks != '' ? 'is-valid' : '' }}" id="remarks" name='remarks' rows="2">{{ isset($isolate->lab_isolate->remarks) ? $isolate->lab_isolate->remarks  : '' }}</textarea>
    </div>
    </div>

 
   

  </div>

  <button type="submit" class="btn btn-primary right">Submit</button>
  <button type="button" class="btn btn-primary right" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Release</button>
</form>
                 
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Release Result</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you sure you want to release <b>{{ $isolate->accession_no }}</b> result? </h3>
      </div>
      <div class="modal-footer">
        <form action="/release-status" method="POST">
          @csrf
        <button type="submit" class="btn btn-primary">Release Result</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="isolate_id" value="{{ $isolate->id }}">
        <input type="hidden" name="isolate_status" value="released">
      </form>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
    $("#bacterial_identification").select2();
    $("#specimen_type").select2();
    });
</script>
@endsection
