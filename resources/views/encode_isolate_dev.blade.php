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
        </div>

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
           @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }}" role="alert">
              <h4 class="alert-heading">Success</h4>
              <p>{!! Session::get('alert-' . $msg) !!}</p>
             
            </div>
          @endif
        @endforeach
        



        <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Encoding for Sentinel Site
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="/site-isolates" method="POST">
          @csrf
          <div class="card  mb-2">
            <div class="card-header text-white" style="background-color: #198754"><h4>Patient Demographics Section</h4></div>

            <div class="card-body">

<div class="row mb-2">
<div class="form-group col-md-4">
  <label for="acccession_no">Patient ID</label>
  <input type="text" class="form-control form-control-sm is-valid" name="patient_id" id="patient_id" placeholder="Accession number" value="{{ $isolate->patient_id }}" autocomplete="off" disabled>
  <input type="hidden" name="isolate_id" value="{{ $isolate->id }}">
</div>

<div class="qc form-group col-md-4">
  <label for="date_of_admission">Date of Admission</label>
  <input type="date" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->date_of_admission) & $isolate->site_isolate->date_of_admission != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_of_admission) ? $isolate->site_isolate->date_of_admission->toDateString()  : '' }}" id="date_of_admission" name="date_of_admission" placeholder="Date of Birth (e.g. mm/dd/yyyy)" autocomplete="off">
</div>

<div class="form-group col-md-2">
  <label for="patient_age">Age</label>
  <input type="text" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->patient_age) & $isolate->site_isolate->patient_age != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_age) ? $isolate->site_isolate->patient_age  : '' }}" id="patient_age" name="patient_age" placeholder="Age" autocomplete="off">
</div>
<div class="form-group col-md-2">
  <label for="patient_sex">Sex</label>
  <select class="qc form-select form-select-sm   {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex != '' ? 'is-valid' : '' }}" aria-label=".form-select-lg example" name="patient_sex">
    <option selected> </option>
    <option {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex == 'M' ? 'selected'  : '' }} value="M">M</option>
    <option {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex == 'F' ? 'selected'  : '' }} value="F">F</option>
  </select>
</div>

{{-- <div class="form-group col-md-4">
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="qc_chk" {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == 'atcc49226' ? 'checked'  : '' }}>
    <label class="form-check-label" for="qc_chk">QC Isolate</label>
  </div>
</div> --}}


</div>


<div class="row mb-2">

</div>
<div class="row mb-2">
<div class="form-group col-md-4  ">
  <label for="first_name">Patient Name</label>
  <input type="text" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->patient_first_name) & $isolate->site_isolate->patient_first_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_first_name) ? $isolate->site_isolate->patient_first_name  : '' }}" id="first_name" name="patient_first_name" placeholder="First name" autocomplete="off">
</div>
<div class="form-group col-md-4  ">
  <label for="middle_name"> </label>
  <input type="text" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->patient_middle_name) & $isolate->site_isolate->patient_middle_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_middle_name) ? $isolate->site_isolate->patient_middle_name  : '' }}" id="middle_name" name="patient_middle_name" placeholder="Middle name" autocomplete="off">
</div>
<div class="form-group col-md-4  ">
  <label for="last_name"> </label>
  <input type="text" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->patient_last_name) & $isolate->site_isolate->patient_last_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_last_name) ? $isolate->site_isolate->patient_last_name  : '' }}" id="last_name" name="patient_last_name" placeholder="Last name" autocomplete="off">
</div>
</div>


<div class="row mb-2">
<div class="form-group col-md-4  ">
  <label for="ward">Ward</label>
  <input type="text" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->ward) & $isolate->site_isolate->ward != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ward) ? $isolate->site_isolate->ward  : '' }}" id="ward" name="ward" placeholder="Ward" autocomplete="off">
</div>
<div class="form-group col-md-4  ">
  <label for="attending_physician">Attending Physician</label>
  <input type="text" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->attending_physician) & $isolate->site_isolate->attending_physician != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->attending_physician) ? $isolate->site_isolate->attending_physician  : '' }}" id="attending_physician" name="attending_physician" placeholder="Attending Physician" autocomplete="off">
</div>

</div>
{{-- <div class="row  ">
<div class="form-group col-md-4">
<label for="reason_for_referral">Reason for Referral</label>
<select class="qc form-select form-select-sm   {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="reason_for_referral">
  <option selected> </option>
  <option {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral == 'A' ? 'selected'  : '' }} value="A">A - For confirmation of organism and antimicrobial susceptibility test</option>
  <option {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral == 'G' ? 'selected'  : '' }} value="G">G - GARLRN samples</option>
  <option {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral == 'O' ? 'selected'  : '' }} value="O">O - Others</option>
  
</select>
</div>
</div> --}}
 </div>
  </div> 



  <div class="card mb-2">
    <div class="card-header text-white" style="background-color: #198754"><h4>Isolate Information</h4></div>
  
    <div class="card-body">   
      <div class="row mb-2">
        <div class="form-group col-md-4">
          <label for="specimen_type">Specimen Type</label>
          <select class="qc form-select form-select-sm   {{ isset($isolate->site_isolate->specimen_type) & $isolate->site_isolate->specimen_type != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="specimen_type">
            <option selected> </option>
            @forelse($specimen_types as $specimen_type)
            <option {{ isset($isolate->site_isolate->specimen_type) & $isolate->site_isolate->specimen_type == $specimen_type->english ? 'selected'  : '' }} value="{{ $specimen_type->english }}">{{ $specimen_type->code . " - " . $specimen_type->english }}</option>
            @empty
            @endforelse
          
            {{-- <option {{ isset($isolate->site_isolate->specimen_type) & $isolate->site_isolate->specimen_type == 'G' ? 'selected'  : '' }} value="G">G - GARLRN samples</option>
            <option {{ isset($isolate->site_isolate->specimen_type) & $isolate->site_isolate->specimen_type == 'O' ? 'selected'  : '' }} value="O">O - Others</option> --}}
            
          </select>
          </div>
          <div class="qc form-group col-md-4">
            <label for="date_of_sample_collection">Date of sample collection</label>
            <input type="date" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->date_of_sample_collection) & $isolate->site_isolate->date_of_sample_collection != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_of_sample_collection) ? $isolate->site_isolate->date_of_sample_collection->toDateString()  : '' }}" id="date_of_sample_collection" name="date_of_sample_collection" placeholder="Date of sample collection" autocomplete="off">
          </div>
          <div class="qc form-group col-md-4">
            <label for="date_received_arsrl">Date Received in ARSRL</label>
            <input type="date" class="qc form-control form-control-sm {{ isset($isolate->site_isolate->date_received_arsrl) & $isolate->site_isolate->date_received_arsrl != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_received_arsrl) ? $isolate->site_isolate->date_received_arsrl->toDateString()  : '' }}" id="date_received_arsrl" name="date_received_arsrl" placeholder="Date Received in ARSRL" autocomplete="off">
          </div>
       
        </div>
    </div>
  </div>


  <div class="card mb-2">
    <div class="card-header text-white" style="background-color: #198754"><h4>Antimicrobial Susceptibility Test Section</h4></div>

    <div class="card-body">   
<div class="row mb-2">
  <div class="form-group col-md-4">
    <label for="organism_code">Bacterial Identification</label>
    {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->organism_code) ? $isolate->site_isolate->organism_code  : '' }}" id="organism_code" name="organism_code" placeholder="Organism Code"> --}}
    <select class="qc form-select form-select-sm {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="bacterial_identification" id="bacterial_identification">
      <option selected> </option>
      @forelse($organisms as $organism)
      <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == $organism->ORGANISM ? 'selected'  : '' }} value="{{ $organism->ORGANISM }}">{{ $organism->ORGANISM }}</option>
      @empty
      @endforelse
      
      {{-- <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == '<i>Haemophilus influenzae</i>' ? 'selected'  : '' }} value="<i>Haemophilus influenzae</i>">hin</option>
      <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == '<i>Haemophilus parainfluenzae</i>' ? 'selected'  : '' }} value="<i>Haemophilus parainfluenzae</i>">hpi</option>
      <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == '<i>Neisseria meningitidis</i>' ? 'selected'  : '' }} value="<i>Neisseria meningitidis</i>">nme</option>
      <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == 'No Growth' ? 'selected'  : '' }} value="No Growth">xxx</option>
      <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == 'No <i>Neisseria gonorrhoeae</i> found' ? 'selected'  : '' }} value="No <i>Neisseria gonorrhoeae</i> found">xgo</option>
      <option {{ isset($isolate->site_isolate->bacterial_identification) & $isolate->site_isolate->bacterial_identification == 'atcc49226' ? 'selected'  : '' }} value="atcc49226">atcc49226</option> --}}
    </select>
  </div>
  <div class="form-group col-md-4 ">
    <label for="esbl">ESBL</label>
    <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->esbl) & $isolate->site_isolate->esbl != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="esbl">
      <option selected> </option>
      <option {{ isset($isolate->site_isolate->esbl) & $isolate->site_isolate->esbl == 'positive' ? 'selected'  : '' }} value="positive">+</option>
      <option {{ isset($isolate->site_isolate->esbl) & $isolate->site_isolate->esbl == 'negative' ? 'selected'  : '' }} value="negative">-</option>
      <option {{ isset($isolate->site_isolate->esbl) & $isolate->site_isolate->esbl == 'not tested' ? 'selected'  : '' }} value="not tested">Not Tested</option>
    </select>
  </div>
<div class="form-group col-md-4">
  <label for="date_received">Date of Testing</label>
  <div class="input-group date" id="datepicker">
    <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->date_of_testing) & $isolate->site_isolate->date_of_testing != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_of_testing) ? $isolate->site_isolate->date_of_testing->toDateString()  : '' }}" id="date_of_testing" name='date_of_testing' placeholder="Date of Testing" autocomplete="off">
  </div>
  
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
            <td colspan="2">MIC</td>
            <td>RIS</td>
          </tr>
        </thead>
        <tbody class="align-middle">
          <tr>
            <td>Amikacin</td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amk_disk) & $isolate->site_isolate->amk_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amk_disk) ? $isolate->site_isolate->amk_disk  : '' }}" type="number" step="any"  min="0.00" name="amk_disk" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amk_disk_ris) & $isolate->site_isolate->amk_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amk_disk_ris) ? $isolate->site_isolate->amk_disk_ris  : '' }}" type="text" name="amk_disk_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amk_disk_ris) & $isolate->site_isolate->amk_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amk_disk_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->amk_disk_ris) & $isolate->site_isolate->amk_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->amk_disk_ris) & $isolate->site_isolate->amk_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->amk_disk_ris) & $isolate->site_isolate->amk_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->amk_disk_ris) & $isolate->site_isolate->amk_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
            <td>
              <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amk_mic_operand) & $isolate->site_isolate->amk_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amk_mic_operand">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->amk_mic_operand) & $isolate->site_isolate->amk_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                <option {{ isset($isolate->site_isolate->amk_mic_operand) & $isolate->site_isolate->amk_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                <option {{ isset($isolate->site_isolate->amk_mic_operand) & $isolate->site_isolate->amk_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                <option {{ isset($isolate->site_isolate->amk_mic_operand) & $isolate->site_isolate->amk_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
              </select>
            </td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amk_mic) & $isolate->site_isolate->amk_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amk_mic) ? $isolate->site_isolate->amk_mic  : '' }}" type="number" step="any"  min="0.0001"   name="amk_mic" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amk_mic_ris) & $isolate->site_isolate->amk_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amk_mic_ris) ? $isolate->site_isolate->amk_mic_ris  : '' }}" type="text" name="amk_mic_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amk_mic_ris) & $isolate->site_isolate->amk_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amk_mic_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->amk_mic_ris) & $isolate->site_isolate->amk_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->amk_mic_ris) & $isolate->site_isolate->amk_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->amk_mic_ris) & $isolate->site_isolate->amk_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->amk_mic_ris) & $isolate->site_isolate->amk_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
          </tr>

          <tr>
            <td>Ampicillin</td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amp_disk) & $isolate->site_isolate->amp_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amp_disk) ? $isolate->site_isolate->amp_disk  : '' }}" type="number" step="any"  min="0.0"  name="amp_disk" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amp_disk_ris) & $isolate->site_isolate->amp_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amp_disk_ris) ? $isolate->site_isolate->amp_disk_ris  : '' }}" type="text" name="amp_disk_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amp_disk_ris) & $isolate->site_isolate->amp_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amp_disk_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->amp_disk_ris) & $isolate->site_isolate->amp_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->amp_disk_ris) & $isolate->site_isolate->amp_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->amp_disk_ris) & $isolate->site_isolate->amp_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->amp_disk_ris) & $isolate->site_isolate->amp_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
            <td>
              <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amp_mic_operand) & $isolate->site_isolate->amp_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amp_mic_operand">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->amp_mic_operand) & $isolate->site_isolate->amp_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                <option {{ isset($isolate->site_isolate->amp_mic_operand) & $isolate->site_isolate->amp_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                <option {{ isset($isolate->site_isolate->amp_mic_operand) & $isolate->site_isolate->amp_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                <option {{ isset($isolate->site_isolate->amp_mic_operand) & $isolate->site_isolate->amp_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
              </select>
            </td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amp_mic) & $isolate->site_isolate->amp_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amp_mic) ? $isolate->site_isolate->amp_mic  : '' }}" type="number" step="any"   name="amp_mic" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amp_mic_ris) & $isolate->site_isolate->amp_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amp_mic_ris) ? $isolate->site_isolate->amp_mic_ris  : '' }}" type="text" name="amp_mic_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amp_mic_ris) & $isolate->site_isolate->amp_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amp_mic_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->amp_mic_ris) & $isolate->site_isolate->amp_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->amp_mic_ris) & $isolate->site_isolate->amp_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->amp_mic_ris) & $isolate->site_isolate->amp_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->amp_mic_ris) & $isolate->site_isolate->amp_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
          </tr>


          <tr>
            <td>Amoxicillin-clavulanic acid</td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amc_disk) & $isolate->site_isolate->amc_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amc_disk) ? $isolate->site_isolate->amc_disk  : '' }}" type="number" step="any"  min="0.0"  name="amc_disk" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amc_disk_ris) & $isolate->site_isolate->amc_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amc_disk_ris) ? $isolate->site_isolate->amc_disk_ris  : '' }}" type="text" name="amc_disk_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amc_disk_ris) & $isolate->site_isolate->amc_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amc_disk_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->amc_disk_ris) & $isolate->site_isolate->amc_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->amc_disk_ris) & $isolate->site_isolate->amc_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->amc_disk_ris) & $isolate->site_isolate->amc_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->amc_disk_ris) & $isolate->site_isolate->amc_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
            <td>
              <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amc_mic_operand) & $isolate->site_isolate->amc_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amc_mic_operand">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->amc_mic_operand) & $isolate->site_isolate->amc_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                <option {{ isset($isolate->site_isolate->amc_mic_operand) & $isolate->site_isolate->amc_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                <option {{ isset($isolate->site_isolate->amc_mic_operand) & $isolate->site_isolate->amc_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                <option {{ isset($isolate->site_isolate->amc_mic_operand) & $isolate->site_isolate->amc_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
              </select>
            </td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amc_mic) & $isolate->site_isolate->amc_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amc_mic) ? $isolate->site_isolate->amc_mic  : '' }}" type="number"  step="any"   name="amc_mic" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->amc_mic_ris) & $isolate->site_isolate->amc_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->amc_mic_ris) ? $isolate->site_isolate->amc_mic_ris  : '' }}" type="text" name="amc_mic_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->amc_mic_ris) & $isolate->site_isolate->amc_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="amc_mic_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->amc_mic_ris) & $isolate->site_isolate->amc_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->amc_mic_ris) & $isolate->site_isolate->amc_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->amc_mic_ris) & $isolate->site_isolate->amc_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->amc_mic_ris) & $isolate->site_isolate->amc_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
          </tr>


          <tr>
            <td>Aztreonam</td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->atm_disk) & $isolate->site_isolate->atm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->atm_disk) ? $isolate->site_isolate->atm_disk  : '' }}" type="number" step="any"  min="0.0"  name="atm_disk" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->atm_disk_ris) & $isolate->site_isolate->atm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->atm_disk_ris) ? $isolate->site_isolate->atm_disk_ris  : '' }}" type="text" name="atm_disk_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->atm_disk_ris) & $isolate->site_isolate->atm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="atm_disk_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->atm_disk_ris) & $isolate->site_isolate->atm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->atm_disk_ris) & $isolate->site_isolate->atm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->atm_disk_ris) & $isolate->site_isolate->atm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->atm_disk_ris) & $isolate->site_isolate->atm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
            <td>
              <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->atm_mic_operand) & $isolate->site_isolate->atm_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="atm_mic_operand">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->atm_mic_operand) & $isolate->site_isolate->atm_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                <option {{ isset($isolate->site_isolate->atm_mic_operand) & $isolate->site_isolate->atm_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                <option {{ isset($isolate->site_isolate->atm_mic_operand) & $isolate->site_isolate->atm_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                <option {{ isset($isolate->site_isolate->atm_mic_operand) & $isolate->site_isolate->atm_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
              </select>
            </td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->atm_mic) & $isolate->site_isolate->atm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->atm_mic) ? $isolate->site_isolate->atm_mic  : '' }}" type="number" step="any"   name="atm_mic" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->atm_mic_ris) & $isolate->site_isolate->atm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->atm_mic_ris) ? $isolate->site_isolate->atm_mic_ris  : '' }}" type="text" name="atm_mic_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->atm_mic_ris) & $isolate->site_isolate->atm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="atm_mic_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->atm_mic_ris) & $isolate->site_isolate->atm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->atm_mic_ris) & $isolate->site_isolate->atm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->atm_mic_ris) & $isolate->site_isolate->atm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->atm_mic_ris) & $isolate->site_isolate->atm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
          </tr>



          <tr>
            <td>Cefepime</td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fep_disk) & $isolate->site_isolate->fep_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fep_disk) ? $isolate->site_isolate->fep_disk  : '' }}" type="number" step="any"  min="6.00"  name="fep_disk" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fep_disk_ris) & $isolate->site_isolate->fep_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fep_disk_ris) ? $isolate->site_isolate->fep_disk_ris  : '' }}" type="text" name="fep_disk_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->fep_disk_ris) & $isolate->site_isolate->fep_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fep_disk_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->fep_disk_ris) & $isolate->site_isolate->fep_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->fep_disk_ris) & $isolate->site_isolate->fep_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->fep_disk_ris) & $isolate->site_isolate->fep_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->fep_disk_ris) & $isolate->site_isolate->fep_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
            <td>
              <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->fep_mic_operand) & $isolate->site_isolate->fep_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fep_mic_operand">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->fep_mic_operand) & $isolate->site_isolate->fep_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                <option {{ isset($isolate->site_isolate->fep_mic_operand) & $isolate->site_isolate->fep_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                <option {{ isset($isolate->site_isolate->fep_mic_operand) & $isolate->site_isolate->fep_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                <option {{ isset($isolate->site_isolate->fep_mic_operand) & $isolate->site_isolate->fep_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
              </select>
            </td>
            <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fep_mic) & $isolate->site_isolate->fep_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fep_mic) ? $isolate->site_isolate->fep_mic  : '' }}" type="number" step="any"   name="fep_mic" id="" autocomplete="off"></td>
            {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fep_mic_ris) & $isolate->site_isolate->fep_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fep_mic_ris) ? $isolate->site_isolate->fep_mic_ris  : '' }}" type="text" name="fep_mic_ris" id=""></td> --}}
            <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->fep_mic_ris) & $isolate->site_isolate->fep_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fep_mic_ris">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->fep_mic_ris) & $isolate->site_isolate->fep_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
              <option {{ isset($isolate->site_isolate->fep_mic_ris) & $isolate->site_isolate->fep_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
              <option {{ isset($isolate->site_isolate->fep_mic_ris) & $isolate->site_isolate->fep_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
              <option {{ isset($isolate->site_isolate->fep_mic_ris) & $isolate->site_isolate->fep_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
            </select></td>
          </tr>

        

        <tr>
          <td>Cefotaxime</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ctx_disk) & $isolate->site_isolate->ctx_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ctx_disk) ? $isolate->site_isolate->ctx_disk  : '' }}" type="number" step="any"  min="6.00"  name="ctx_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ctx_disk_ris) & $isolate->site_isolate->ctx_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ctx_disk_ris) ? $isolate->site_isolate->ctx_disk_ris  : '' }}" type="text" name="ctx_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->ctx_disk_ris) & $isolate->site_isolate->ctx_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ctx_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->ctx_disk_ris) & $isolate->site_isolate->ctx_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->ctx_disk_ris) & $isolate->site_isolate->ctx_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->ctx_disk_ris) & $isolate->site_isolate->ctx_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->ctx_disk_ris) & $isolate->site_isolate->ctx_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->ctx_mic_operand) & $isolate->site_isolate->ctx_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ctx_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->ctx_mic_operand) & $isolate->site_isolate->ctx_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->ctx_mic_operand) & $isolate->site_isolate->ctx_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->ctx_mic_operand) & $isolate->site_isolate->ctx_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->ctx_mic_operand) & $isolate->site_isolate->ctx_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ctx_mic) & $isolate->site_isolate->ctx_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ctx_mic) ? $isolate->site_isolate->ctx_mic  : '' }}" type="number" step="any"   name="ctx_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ctx_mic_ris) & $isolate->site_isolate->ctx_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ctx_mic_ris) ? $isolate->site_isolate->ctx_mic_ris  : '' }}" type="text" name="ctx_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->ctx_mic_ris) & $isolate->site_isolate->ctx_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ctx_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->ctx_mic_ris) & $isolate->site_isolate->ctx_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->ctx_mic_ris) & $isolate->site_isolate->ctx_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->ctx_mic_ris) & $isolate->site_isolate->ctx_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->ctx_mic_ris) & $isolate->site_isolate->ctx_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>

        <tr>
          <td>Cefoxitin</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fox_disk) & $isolate->site_isolate->fox_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fox_disk) ? $isolate->site_isolate->fox_disk  : '' }}" type="number" step="any"  min="0.0"  name="fox_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fox_disk_ris) & $isolate->site_isolate->fox_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fox_disk_ris) ? $isolate->site_isolate->fox_disk_ris  : '' }}" type="text" name="fox_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->fox_disk_ris) & $isolate->site_isolate->fox_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fox_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->fox_disk_ris) & $isolate->site_isolate->fox_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->fox_disk_ris) & $isolate->site_isolate->fox_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->fox_disk_ris) & $isolate->site_isolate->fox_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->fox_disk_ris) & $isolate->site_isolate->fox_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->fox_mic_operand) & $isolate->site_isolate->fox_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fox_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->fox_mic_operand) & $isolate->site_isolate->fox_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->fox_mic_operand) & $isolate->site_isolate->fox_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->fox_mic_operand) & $isolate->site_isolate->fox_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->fox_mic_operand) & $isolate->site_isolate->fox_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fox_mic) & $isolate->site_isolate->fox_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fox_mic) ? $isolate->site_isolate->fox_mic  : '' }}" type="number" step="any"    name="fox_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->fox_mic_ris) & $isolate->site_isolate->fox_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->fox_mic_ris) ? $isolate->site_isolate->fox_mic_ris  : '' }}" type="text" name="fox_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->fox_mic_ris) & $isolate->site_isolate->fox_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="fox_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->fox_mic_ris) & $isolate->site_isolate->fox_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->fox_mic_ris) & $isolate->site_isolate->fox_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->fox_mic_ris) & $isolate->site_isolate->fox_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->fox_mic_ris) & $isolate->site_isolate->fox_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>
 
        <tr>
          <td>Cefuroxime</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cxa_disk) & $isolate->site_isolate->cxa_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cxa_disk) ? $isolate->site_isolate->cxa_disk  : '' }}" type="number" step="any"  min="0.0"  name="cxa_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cxa_disk_ris) & $isolate->site_isolate->cxa_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cxa_disk_ris) ? $isolate->site_isolate->cxa_disk_ris  : '' }}" type="text" name="cxa_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cxa_disk_ris) & $isolate->site_isolate->cxa_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cxa_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cxa_disk_ris) & $isolate->site_isolate->cxa_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cxa_disk_ris) & $isolate->site_isolate->cxa_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cxa_disk_ris) & $isolate->site_isolate->cxa_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cxa_disk_ris) & $isolate->site_isolate->cxa_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cxa_mic_operand) & $isolate->site_isolate->cxa_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cxa_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->cxa_mic_operand) & $isolate->site_isolate->cxa_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->cxa_mic_operand) & $isolate->site_isolate->cxa_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->cxa_mic_operand) & $isolate->site_isolate->cxa_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->cxa_mic_operand) & $isolate->site_isolate->cxa_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cxa_mic) & $isolate->site_isolate->cxa_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cxa_mic) ? $isolate->site_isolate->cxa_mic  : '' }}" type="number" step="any"    name="cxa_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cxa_mic_ris) & $isolate->site_isolate->cxa_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cxa_mic_ris) ? $isolate->site_isolate->cxa_mic_ris  : '' }}" type="text" name="cxa_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cxa_mic_ris) & $isolate->site_isolate->cxa_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cxa_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cxa_mic_ris) & $isolate->site_isolate->cxa_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cxa_mic_ris) & $isolate->site_isolate->cxa_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cxa_mic_ris) & $isolate->site_isolate->cxa_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cxa_mic_ris) & $isolate->site_isolate->cxa_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>



        <tr>
          <td>Ceftazidime</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->caz_disk) & $isolate->site_isolate->caz_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->caz_disk) ? $isolate->site_isolate->caz_disk  : '' }}" type="number" step="any"  min="0.0"  name="caz_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->caz_disk_ris) & $isolate->site_isolate->caz_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->caz_disk_ris) ? $isolate->site_isolate->caz_disk_ris  : '' }}" type="text" name="caz_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->caz_disk_ris) & $isolate->site_isolate->caz_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="caz_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->caz_disk_ris) & $isolate->site_isolate->caz_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->caz_disk_ris) & $isolate->site_isolate->caz_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->caz_disk_ris) & $isolate->site_isolate->caz_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->caz_disk_ris) & $isolate->site_isolate->caz_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->caz_mic_operand) & $isolate->site_isolate->caz_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="caz_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->caz_mic_operand) & $isolate->site_isolate->caz_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->caz_mic_operand) & $isolate->site_isolate->caz_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->caz_mic_operand) & $isolate->site_isolate->caz_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->caz_mic_operand) & $isolate->site_isolate->caz_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->caz_mic) & $isolate->site_isolate->caz_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->caz_mic) ? $isolate->site_isolate->caz_mic  : '' }}" type="number" step="any"    name="caz_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->caz_mic_ris) & $isolate->site_isolate->caz_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->caz_mic_ris) ? $isolate->site_isolate->caz_mic_ris  : '' }}" type="text" name="caz_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->caz_mic_ris) & $isolate->site_isolate->caz_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="caz_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->caz_mic_ris) & $isolate->site_isolate->caz_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->caz_mic_ris) & $isolate->site_isolate->caz_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->caz_mic_ris) & $isolate->site_isolate->caz_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->caz_mic_ris) & $isolate->site_isolate->caz_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>

        <tr>
          <td>Cefazolin</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czo_disk) & $isolate->site_isolate->czo_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czo_disk) ? $isolate->site_isolate->czo_disk  : '' }}" type="number" step="any"  min="0.0"  name="czo_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czo_disk_ris) & $isolate->site_isolate->czo_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czo_disk_ris) ? $isolate->site_isolate->czo_disk_ris  : '' }}" type="text" name="czo_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->czo_disk_ris) & $isolate->site_isolate->czo_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czo_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->czo_disk_ris) & $isolate->site_isolate->czo_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->czo_disk_ris) & $isolate->site_isolate->czo_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->czo_disk_ris) & $isolate->site_isolate->czo_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->czo_disk_ris) & $isolate->site_isolate->czo_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->czo_mic_operand) & $isolate->site_isolate->czo_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czo_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->czo_mic_operand) & $isolate->site_isolate->czo_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->czo_mic_operand) & $isolate->site_isolate->czo_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->czo_mic_operand) & $isolate->site_isolate->czo_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->czo_mic_operand) & $isolate->site_isolate->czo_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czo_mic) & $isolate->site_isolate->czo_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czo_mic) ? $isolate->site_isolate->czo_mic  : '' }}" type="number" step="any"    name="czo_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czo_mic_ris) & $isolate->site_isolate->czo_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czo_mic_ris) ? $isolate->site_isolate->czo_mic_ris  : '' }}" type="text" name="czo_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->czo_mic_ris) & $isolate->site_isolate->czo_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czo_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->czo_mic_ris) & $isolate->site_isolate->czo_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->czo_mic_ris) & $isolate->site_isolate->czo_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->czo_mic_ris) & $isolate->site_isolate->czo_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->czo_mic_ris) & $isolate->site_isolate->czo_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Ceftazidime-avibactam</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cza_disk) & $isolate->site_isolate->cza_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cza_disk) ? $isolate->site_isolate->cza_disk  : '' }}" type="number" step="any"  min="0.0"  name="cza_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cza_disk_ris) & $isolate->site_isolate->cza_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cza_disk_ris) ? $isolate->site_isolate->cza_disk_ris  : '' }}" type="text" name="cza_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cza_disk_ris) & $isolate->site_isolate->cza_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cza_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cza_disk_ris) & $isolate->site_isolate->cza_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cza_disk_ris) & $isolate->site_isolate->cza_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cza_disk_ris) & $isolate->site_isolate->cza_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cza_disk_ris) & $isolate->site_isolate->cza_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cza_mic_operand) & $isolate->site_isolate->cza_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cza_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->cza_mic_operand) & $isolate->site_isolate->cza_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->cza_mic_operand) & $isolate->site_isolate->cza_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->cza_mic_operand) & $isolate->site_isolate->cza_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->cza_mic_operand) & $isolate->site_isolate->cza_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cza_mic) & $isolate->site_isolate->cza_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cza_mic) ? $isolate->site_isolate->cza_mic  : '' }}" type="number" step="any"    name="cza_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cza_mic_ris) & $isolate->site_isolate->cza_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cza_mic_ris) ? $isolate->site_isolate->cza_mic_ris  : '' }}" type="text" name="cza_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cza_mic_ris) & $isolate->site_isolate->cza_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cza_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cza_mic_ris) & $isolate->site_isolate->cza_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cza_mic_ris) & $isolate->site_isolate->cza_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cza_mic_ris) & $isolate->site_isolate->cza_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cza_mic_ris) & $isolate->site_isolate->cza_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Ceftolozane-tazobactam</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czt_disk) & $isolate->site_isolate->czt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czt_disk) ? $isolate->site_isolate->czt_disk  : '' }}" type="number" step="any"  min="0.0"  name="czt_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czt_disk_ris) & $isolate->site_isolate->czt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czt_disk_ris) ? $isolate->site_isolate->czt_disk_ris  : '' }}" type="text" name="czt_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->czt_disk_ris) & $isolate->site_isolate->czt_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czt_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->czt_disk_ris) & $isolate->site_isolate->czt_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->czt_disk_ris) & $isolate->site_isolate->czt_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->czt_disk_ris) & $isolate->site_isolate->czt_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->czt_disk_ris) & $isolate->site_isolate->czt_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->czt_mic_operand) & $isolate->site_isolate->czt_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czt_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->czt_mic_operand) & $isolate->site_isolate->czt_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->czt_mic_operand) & $isolate->site_isolate->czt_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->czt_mic_operand) & $isolate->site_isolate->czt_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->czt_mic_operand) & $isolate->site_isolate->czt_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czt_mic) & $isolate->site_isolate->czt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czt_mic) ? $isolate->site_isolate->czt_mic  : '' }}" type="number" step="any"    name="czt_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->czt_mic_ris) & $isolate->site_isolate->czt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->czt_mic_ris) ? $isolate->site_isolate->czt_mic_ris  : '' }}" type="text" name="czt_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->czt_mic_ris) & $isolate->site_isolate->czt_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="czt_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->czt_mic_ris) & $isolate->site_isolate->czt_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->czt_mic_ris) & $isolate->site_isolate->czt_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->czt_mic_ris) & $isolate->site_isolate->czt_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->czt_mic_ris) & $isolate->site_isolate->czt_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Ceftriaxone</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_disk) & $isolate->site_isolate->cro_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}" type="number" step="any"  min="0.0"  name="cro_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}" type="text" name="cro_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_mic) & $isolate->site_isolate->cro_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}" type="number" step="any"    name="cro_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}" type="text" name="cro_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        
        <tr>
          <td>Ciprofloxacin</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_disk) & $isolate->site_isolate->cip_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}" type="number" step="any"  min="0.0"  name="cip_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}" type="text" name="cip_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_mic) & $isolate->site_isolate->cip_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}" type="number" step="any"    name="cip_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}" type="text" name="cip_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Ertapenem</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->etp_disk) & $isolate->site_isolate->etp_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->etp_disk) ? $isolate->site_isolate->etp_disk  : '' }}" type="number" step="any"  min="0.0"  name="etp_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->etp_disk_ris) & $isolate->site_isolate->etp_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->etp_disk_ris) ? $isolate->site_isolate->etp_disk_ris  : '' }}" type="text" name="etp_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->etp_disk_ris) & $isolate->site_isolate->etp_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="etp_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->etp_disk_ris) & $isolate->site_isolate->etp_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->etp_disk_ris) & $isolate->site_isolate->etp_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->etp_disk_ris) & $isolate->site_isolate->etp_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->etp_disk_ris) & $isolate->site_isolate->etp_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->etp_mic_operand) & $isolate->site_isolate->etp_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="etp_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->etp_mic_operand) & $isolate->site_isolate->etp_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->etp_mic_operand) & $isolate->site_isolate->etp_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->etp_mic_operand) & $isolate->site_isolate->etp_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->etp_mic_operand) & $isolate->site_isolate->etp_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->etp_mic) & $isolate->site_isolate->etp_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->etp_mic) ? $isolate->site_isolate->etp_mic  : '' }}" type="number" step="any"    name="etp_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->etp_mic_ris) & $isolate->site_isolate->etp_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->etp_mic_ris) ? $isolate->site_isolate->etp_mic_ris  : '' }}" type="text" name="etp_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->etp_mic_ris) & $isolate->site_isolate->etp_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="etp_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->etp_mic_ris) & $isolate->site_isolate->etp_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->etp_mic_ris) & $isolate->site_isolate->etp_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->etp_mic_ris) & $isolate->site_isolate->etp_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->etp_mic_ris) & $isolate->site_isolate->etp_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Gentamicin</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_disk) & $isolate->site_isolate->gen_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}" type="number" step="any"  min="0.0"  name="gen_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}" type="text" name="gen_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_mic) & $isolate->site_isolate->gen_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}" type="number" step="any"    name="gen_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}" type="text" name="gen_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>

        <tr>
          <td>Imipenem</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ipm_disk) & $isolate->site_isolate->ipm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ipm_disk) ? $isolate->site_isolate->ipm_disk  : '' }}" type="number" step="any"  min="0.0"  name="ipm_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ipm_disk_ris) & $isolate->site_isolate->ipm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ipm_disk_ris) ? $isolate->site_isolate->ipm_disk_ris  : '' }}" type="text" name="ipm_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->ipm_disk_ris) & $isolate->site_isolate->ipm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ipm_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->ipm_disk_ris) & $isolate->site_isolate->ipm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->ipm_disk_ris) & $isolate->site_isolate->ipm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->ipm_disk_ris) & $isolate->site_isolate->ipm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->ipm_disk_ris) & $isolate->site_isolate->ipm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->ipm_mic_operand) & $isolate->site_isolate->ipm_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ipm_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->ipm_mic_operand) & $isolate->site_isolate->ipm_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->ipm_mic_operand) & $isolate->site_isolate->ipm_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->ipm_mic_operand) & $isolate->site_isolate->ipm_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->ipm_mic_operand) & $isolate->site_isolate->ipm_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ipm_mic) & $isolate->site_isolate->ipm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ipm_mic) ? $isolate->site_isolate->ipm_mic  : '' }}" type="number" step="any"    name="ipm_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->ipm_mic_ris) & $isolate->site_isolate->ipm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->ipm_mic_ris) ? $isolate->site_isolate->ipm_mic_ris  : '' }}" type="text" name="ipm_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->ipm_mic_ris) & $isolate->site_isolate->ipm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="ipm_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->ipm_mic_ris) & $isolate->site_isolate->ipm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->ipm_mic_ris) & $isolate->site_isolate->ipm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->ipm_mic_ris) & $isolate->site_isolate->ipm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->ipm_mic_ris) & $isolate->site_isolate->ipm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Levofloxacin</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->lvx_disk) & $isolate->site_isolate->lvx_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->lvx_disk) ? $isolate->site_isolate->lvx_disk  : '' }}" type="number" step="any"  min="0.0"  name="lvx_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->lvx_disk_ris) & $isolate->site_isolate->lvx_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->lvx_disk_ris) ? $isolate->site_isolate->lvx_disk_ris  : '' }}" type="text" name="lvx_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->lvx_disk_ris) & $isolate->site_isolate->lvx_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="lvx_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->lvx_disk_ris) & $isolate->site_isolate->lvx_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->lvx_disk_ris) & $isolate->site_isolate->lvx_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->lvx_disk_ris) & $isolate->site_isolate->lvx_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->lvx_disk_ris) & $isolate->site_isolate->lvx_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->lvx_mic_operand) & $isolate->site_isolate->lvx_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="lvx_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->lvx_mic_operand) & $isolate->site_isolate->lvx_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->lvx_mic_operand) & $isolate->site_isolate->lvx_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->lvx_mic_operand) & $isolate->site_isolate->lvx_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->lvx_mic_operand) & $isolate->site_isolate->lvx_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->lvx_mic) & $isolate->site_isolate->lvx_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->lvx_mic) ? $isolate->site_isolate->lvx_mic  : '' }}" type="number" step="any"    name="lvx_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->lvx_mic_ris) & $isolate->site_isolate->lvx_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->lvx_mic_ris) ? $isolate->site_isolate->lvx_mic_ris  : '' }}" type="text" name="lvx_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->lvx_mic_ris) & $isolate->site_isolate->lvx_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="lvx_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->lvx_mic_ris) & $isolate->site_isolate->lvx_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->lvx_mic_ris) & $isolate->site_isolate->lvx_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->lvx_mic_ris) & $isolate->site_isolate->lvx_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->lvx_mic_ris) & $isolate->site_isolate->lvx_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Meropenem</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->mem_disk) & $isolate->site_isolate->mem_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->mem_disk) ? $isolate->site_isolate->mem_disk  : '' }}" type="number" step="any"  min="0.0"  name="mem_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->mem_disk_ris) & $isolate->site_isolate->mem_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->mem_disk_ris) ? $isolate->site_isolate->mem_disk_ris  : '' }}" type="text" name="mem_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->mem_disk_ris) & $isolate->site_isolate->mem_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="mem_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->mem_disk_ris) & $isolate->site_isolate->mem_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->mem_disk_ris) & $isolate->site_isolate->mem_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->mem_disk_ris) & $isolate->site_isolate->mem_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->mem_disk_ris) & $isolate->site_isolate->mem_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->mem_mic_operand) & $isolate->site_isolate->mem_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="mem_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->mem_mic_operand) & $isolate->site_isolate->mem_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->mem_mic_operand) & $isolate->site_isolate->mem_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->mem_mic_operand) & $isolate->site_isolate->mem_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->mem_mic_operand) & $isolate->site_isolate->mem_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->mem_mic) & $isolate->site_isolate->mem_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->mem_mic) ? $isolate->site_isolate->mem_mic  : '' }}" type="number" step="any"    name="mem_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->mem_mic_ris) & $isolate->site_isolate->mem_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->mem_mic_ris) ? $isolate->site_isolate->mem_mic_ris  : '' }}" type="text" name="mem_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->mem_mic_ris) & $isolate->site_isolate->mem_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="mem_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->mem_mic_ris) & $isolate->site_isolate->mem_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->mem_mic_ris) & $isolate->site_isolate->mem_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->mem_mic_ris) & $isolate->site_isolate->mem_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->mem_mic_ris) & $isolate->site_isolate->mem_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Piperacillin-Tazobactam</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tzp_disk) & $isolate->site_isolate->tzp_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tzp_disk) ? $isolate->site_isolate->tzp_disk  : '' }}" type="number" step="any"  min="0.0"  name="tzp_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tzp_disk_ris) & $isolate->site_isolate->tzp_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tzp_disk_ris) ? $isolate->site_isolate->tzp_disk_ris  : '' }}" type="text" name="tzp_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tzp_disk_ris) & $isolate->site_isolate->tzp_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tzp_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->tzp_disk_ris) & $isolate->site_isolate->tzp_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->tzp_disk_ris) & $isolate->site_isolate->tzp_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->tzp_disk_ris) & $isolate->site_isolate->tzp_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->tzp_disk_ris) & $isolate->site_isolate->tzp_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tzp_mic_operand) & $isolate->site_isolate->tzp_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tzp_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->tzp_mic_operand) & $isolate->site_isolate->tzp_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->tzp_mic_operand) & $isolate->site_isolate->tzp_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->tzp_mic_operand) & $isolate->site_isolate->tzp_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->tzp_mic_operand) & $isolate->site_isolate->tzp_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tzp_mic) & $isolate->site_isolate->tzp_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tzp_mic) ? $isolate->site_isolate->tzp_mic  : '' }}" type="number" step="any"    name="tzp_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tzp_mic_ris) & $isolate->site_isolate->tzp_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tzp_mic_ris) ? $isolate->site_isolate->tzp_mic_ris  : '' }}" type="text" name="tzp_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tzp_mic_ris) & $isolate->site_isolate->tzp_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tzp_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->tzp_mic_ris) & $isolate->site_isolate->tzp_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->tzp_mic_ris) & $isolate->site_isolate->tzp_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->tzp_mic_ris) & $isolate->site_isolate->tzp_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->tzp_mic_ris) & $isolate->site_isolate->tzp_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Tetracycline</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tet_disk) & $isolate->site_isolate->tet_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tet_disk) ? $isolate->site_isolate->tet_disk  : '' }}" type="number" step="any"  min="0.0"  name="tet_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tet_disk_ris) & $isolate->site_isolate->tet_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tet_disk_ris) ? $isolate->site_isolate->tet_disk_ris  : '' }}" type="text" name="tet_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tet_disk_ris) & $isolate->site_isolate->tet_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tet_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->tet_disk_ris) & $isolate->site_isolate->tet_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->tet_disk_ris) & $isolate->site_isolate->tet_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->tet_disk_ris) & $isolate->site_isolate->tet_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->tet_disk_ris) & $isolate->site_isolate->tet_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tet_mic_operand) & $isolate->site_isolate->tet_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tet_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->tet_mic_operand) & $isolate->site_isolate->tet_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->tet_mic_operand) & $isolate->site_isolate->tet_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->tet_mic_operand) & $isolate->site_isolate->tet_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->tet_mic_operand) & $isolate->site_isolate->tet_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tet_mic) & $isolate->site_isolate->tet_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tet_mic) ? $isolate->site_isolate->tet_mic  : '' }}" type="number" step="any"    name="tet_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tet_mic_ris) & $isolate->site_isolate->tet_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tet_mic_ris) ? $isolate->site_isolate->tet_mic_ris  : '' }}" type="text" name="tet_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tet_mic_ris) & $isolate->site_isolate->tet_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tet_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->tet_mic_ris) & $isolate->site_isolate->tet_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->tet_mic_ris) & $isolate->site_isolate->tet_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->tet_mic_ris) & $isolate->site_isolate->tet_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->tet_mic_ris) & $isolate->site_isolate->tet_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Tobramycin</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tob_disk) & $isolate->site_isolate->tob_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tob_disk) ? $isolate->site_isolate->tob_disk  : '' }}" type="number" step="any"  min="0.0"  name="tob_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tob_disk_ris) & $isolate->site_isolate->tob_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tob_disk_ris) ? $isolate->site_isolate->tob_disk_ris  : '' }}" type="text" name="tob_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tob_disk_ris) & $isolate->site_isolate->tob_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tob_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->tob_disk_ris) & $isolate->site_isolate->tob_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->tob_disk_ris) & $isolate->site_isolate->tob_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->tob_disk_ris) & $isolate->site_isolate->tob_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->tob_disk_ris) & $isolate->site_isolate->tob_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tob_mic_operand) & $isolate->site_isolate->tob_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tob_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->tob_mic_operand) & $isolate->site_isolate->tob_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->tob_mic_operand) & $isolate->site_isolate->tob_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->tob_mic_operand) & $isolate->site_isolate->tob_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->tob_mic_operand) & $isolate->site_isolate->tob_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tob_mic) & $isolate->site_isolate->tob_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tob_mic) ? $isolate->site_isolate->tob_mic  : '' }}" type="number" step="any"    name="tob_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tob_mic_ris) & $isolate->site_isolate->tob_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tob_mic_ris) ? $isolate->site_isolate->tob_mic_ris  : '' }}" type="text" name="tob_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tob_mic_ris) & $isolate->site_isolate->tob_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tob_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->tob_mic_ris) & $isolate->site_isolate->tob_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->tob_mic_ris) & $isolate->site_isolate->tob_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->tob_mic_ris) & $isolate->site_isolate->tob_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->tob_mic_ris) & $isolate->site_isolate->tob_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>


        <tr>
          <td>Trimethoprim-sulfamethoxazole</td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->sxt_disk) & $isolate->site_isolate->sxt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->sxt_disk) ? $isolate->site_isolate->sxt_disk  : '' }}" type="number" step="any"  min="0.0"  name="sxt_disk" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->sxt_disk_ris) & $isolate->site_isolate->sxt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->sxt_disk_ris) ? $isolate->site_isolate->sxt_disk_ris  : '' }}" type="text" name="sxt_disk_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->sxt_disk_ris) & $isolate->site_isolate->sxt_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="sxt_disk_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->sxt_disk_ris) & $isolate->site_isolate->sxt_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->sxt_disk_ris) & $isolate->site_isolate->sxt_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->sxt_disk_ris) & $isolate->site_isolate->sxt_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->sxt_disk_ris) & $isolate->site_isolate->sxt_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
          <td>
            <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->sxt_mic_operand) & $isolate->site_isolate->sxt_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="sxt_mic_operand">
              <option selected> </option>
              <option {{ isset($isolate->site_isolate->sxt_mic_operand) & $isolate->site_isolate->sxt_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
              <option {{ isset($isolate->site_isolate->sxt_mic_operand) & $isolate->site_isolate->sxt_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
              <option {{ isset($isolate->site_isolate->sxt_mic_operand) & $isolate->site_isolate->sxt_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
              <option {{ isset($isolate->site_isolate->sxt_mic_operand) & $isolate->site_isolate->sxt_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
            </select>
          </td>
          <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->sxt_mic) & $isolate->site_isolate->sxt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->sxt_mic) ? $isolate->site_isolate->sxt_mic  : '' }}" type="number" step="any"    name="sxt_mic" id="" autocomplete="off"></td>
          {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->sxt_mic_ris) & $isolate->site_isolate->sxt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->sxt_mic_ris) ? $isolate->site_isolate->sxt_mic_ris  : '' }}" type="text" name="sxt_mic_ris" id=""></td> --}}
          <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->sxt_mic_ris) & $isolate->site_isolate->sxt_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="sxt_mic_ris">
            <option selected> </option>
            <option {{ isset($isolate->site_isolate->sxt_mic_ris) & $isolate->site_isolate->sxt_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
            <option {{ isset($isolate->site_isolate->sxt_mic_ris) & $isolate->site_isolate->sxt_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
            <option {{ isset($isolate->site_isolate->sxt_mic_ris) & $isolate->site_isolate->sxt_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
            <option {{ isset($isolate->site_isolate->sxt_mic_ris) & $isolate->site_isolate->sxt_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
          </select></td>
        </tr>







        </tbody>
      </table>
    </div>
    
</div>

<div class="row mb-2">
  <div class="form-group col-md-3">
    <label for="verified_by">Verified by:</label>
    <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->verified_by) & $isolate->site_isolate->verified_by != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->verified_by) ? $isolate->site_isolate->verified_by  : '' }}" id="verified_by" name="verified_by" placeholder="Verified by:">
  </div>
  <div class="form-group col-md-3">
    <label for="noted_by">Noted by:</label>
    <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->noted_by) & $isolate->site_isolate->noted_by != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->noted_by) ? $isolate->site_isolate->noted_by  : '' }}" id="noted_by" name="noted_by" placeholder="Noted by:">
  </div>
  <div class="form-group col-md-3">
    <label for="date_released">Date Released</label>
    <input type="date"class="form-control form-control-sm {{ isset($isolate->site_isolate->date_released) & $isolate->site_isolate->date_released != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_released) ? $isolate->site_isolate->date_released->toDateString()  : '' }}" id="date_released" name="date_released" placeholder="Date Released (e.g. mm/dd/yyyy)">
  </div>
  </div>
  <div class="row  mb-2">
  <div class="form-group">
    <button type="submit" class="btn btn-success right">Submit</button>
    <a class="btn btn-success" href='/create-pdf-site/{{ $isolate->id }}'  >Download PDF ({{  $isolate->patient_id }})</a>
  </div>
  </div>

 
  
</div>

@if($isolate->release_status()->exists())
<div class="card mb-2">
<div class="card-header text-white bg-primary"><h4>Antimicrobial Susceptibility Test Section (A.R.S.R.L.)</h4></div>

<div class="card-body">   
<div class="table-responsive">
  <table class="table table-sm">
      <tbody>
        <tr>
          <td colspan="2">Organism Code: {!! $isolate->lab_isolate->organism_code !!}</td>
          <td colspan="1">Beta-lactamase: {{ $isolate->lab_isolate->esbl }}</td>
          <td colspan="1">Date tested: {{ isset($isolate->lab_isolate->date_of_susceptibility) ? $isolate->lab_isolate->date_of_susceptibility->format('m/d/Y') : '' }}</td>
        </tr>
 
        <tr>
          <th align="center" colspan="4">ANTIMICROBIAL SUSCEPTIBILITY TESTS</th>
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
                        <td>{{ isset($isolate->lab_isolate->amk_disk) ? $isolate->lab_isolate->amk_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amk_disk_ris) ? $isolate->lab_isolate->amk_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amk_mic_operand) ? $isolate->lab_isolate->amk_mic_operand  : '' }}{{ isset($isolate->lab_isolate->amk_mic) ? $isolate->lab_isolate->amk_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amk_mic_ris) ? $isolate->lab_isolate->amk_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ampicillin</td>
                        <td>{{ isset($isolate->lab_isolate->amp_disk) ? $isolate->lab_isolate->amp_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amp_disk_ris) ? $isolate->lab_isolate->amp_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amp_mic_operand) ? $isolate->lab_isolate->amp_mic_operand  : '' }}{{ isset($isolate->lab_isolate->amp_mic) ? $isolate->lab_isolate->amp_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amp_mic_ris) ? $isolate->lab_isolate->amp_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Amoxicillin-clavulanic acid</td>
                        <td>{{ isset($isolate->lab_isolate->amc_disk) ? $isolate->lab_isolate->amc_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amc_disk_ris) ? $isolate->lab_isolate->amc_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amc_mic_operand) ? $isolate->lab_isolate->amc_mic_operand  : '' }}{{ isset($isolate->lab_isolate->amc_mic) ? $isolate->lab_isolate->amc_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->amc_mic_ris) ? $isolate->lab_isolate->amc_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Aztreonam</td>
                        <td>{{ isset($isolate->lab_isolate->atm_disk) ? $isolate->lab_isolate->atm_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->atm_disk_ris) ? $isolate->lab_isolate->atm_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->atm_mic_operand) ? $isolate->lab_isolate->atm_mic_operand  : '' }}{{ isset($isolate->lab_isolate->atm_mic) ? $isolate->lab_isolate->atm_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->atm_mic_ris) ? $isolate->lab_isolate->atm_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Cefepime</td>
                        <td>{{ isset($isolate->lab_isolate->fep_disk) ? $isolate->lab_isolate->fep_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->fep_disk_ris) ? $isolate->lab_isolate->fep_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->fep_mic_operand) ? $isolate->lab_isolate->fep_mic_operand  : '' }}{{ isset($isolate->lab_isolate->fep_mic) ? $isolate->lab_isolate->fep_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->fep_mic_ris) ? $isolate->lab_isolate->fep_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Cefotaxime</td>
                        <td>{{ isset($isolate->lab_isolate->ctx_disk) ? $isolate->lab_isolate->ctx_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->ctx_disk_ris) ? $isolate->lab_isolate->ctx_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->ctx_mic_operand) ? $isolate->lab_isolate->ctx_mic_operand  : '' }}{{ isset($isolate->lab_isolate->ctx_mic) ? $isolate->lab_isolate->ctx_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->ctx_mic_ris) ? $isolate->lab_isolate->ctx_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Cefoxitin</td>
                        <td>{{ isset($isolate->lab_isolate->fox_disk) ? $isolate->lab_isolate->fox_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->fox_disk_ris) ? $isolate->lab_isolate->fox_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->fox_mic_operand) ? $isolate->lab_isolate->fox_mic_operand  : '' }}{{ isset($isolate->lab_isolate->fox_mic) ? $isolate->lab_isolate->fox_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->fox_mic_ris) ? $isolate->lab_isolate->fox_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Cefuroxime</td>
                        <td>{{ isset($isolate->lab_isolate->cxa_disk) ? $isolate->lab_isolate->cxa_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cxa_disk_ris) ? $isolate->lab_isolate->cxa_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cxa_mic_operand) ? $isolate->lab_isolate->cxa_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cxa_mic) ? $isolate->lab_isolate->cxa_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cxa_mic_ris) ? $isolate->lab_isolate->cxa_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ceftazidime</td>
                        <td>{{ isset($isolate->lab_isolate->caz_disk) ? $isolate->lab_isolate->caz_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->caz_disk_ris) ? $isolate->lab_isolate->caz_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->caz_mic_operand) ? $isolate->lab_isolate->caz_mic_operand  : '' }}{{ isset($isolate->lab_isolate->caz_mic) ? $isolate->lab_isolate->caz_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->caz_mic_ris) ? $isolate->lab_isolate->caz_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Cefazolin</td>
                        <td>{{ isset($isolate->lab_isolate->czo_disk) ? $isolate->lab_isolate->czo_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->czo_disk_ris) ? $isolate->lab_isolate->czo_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->czo_mic_operand) ? $isolate->lab_isolate->czo_mic_operand  : '' }}{{ isset($isolate->lab_isolate->czo_mic) ? $isolate->lab_isolate->czo_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->czo_mic_ris) ? $isolate->lab_isolate->czo_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ceftazidime-avibactam</td>
                        <td>{{ isset($isolate->lab_isolate->cza_disk) ? $isolate->lab_isolate->cza_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cza_disk_ris) ? $isolate->lab_isolate->cza_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cza_mic_operand) ? $isolate->lab_isolate->cza_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cza_mic) ? $isolate->lab_isolate->cza_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cza_mic_ris) ? $isolate->lab_isolate->cza_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ceftolozane-tazobactam</td>
                        <td>{{ isset($isolate->lab_isolate->czt_disk) ? $isolate->lab_isolate->czt_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->czt_disk_ris) ? $isolate->lab_isolate->czt_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->czt_mic_operand) ? $isolate->lab_isolate->czt_mic_operand  : '' }}{{ isset($isolate->lab_isolate->czt_mic) ? $isolate->lab_isolate->czt_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->czt_mic_ris) ? $isolate->lab_isolate->czt_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ceftriaxone</td>
                        <td>{{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cro_mic_operand) ? $isolate->lab_isolate->cro_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ciprofloxacin</td>
                        <td>{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cip_mic_operand) ? $isolate->lab_isolate->cip_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Ertapenem</td>
                        <td>{{ isset($isolate->lab_isolate->etp_disk) ? $isolate->lab_isolate->etp_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->etp_disk_ris) ? $isolate->lab_isolate->etp_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->etp_mic_operand) ? $isolate->lab_isolate->etp_mic_operand  : '' }}{{ isset($isolate->lab_isolate->etp_mic) ? $isolate->lab_isolate->etp_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->etp_mic_ris) ? $isolate->lab_isolate->etp_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Gentamicin</td>
                        <td>{{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->gen_mic_operand) ? $isolate->lab_isolate->gen_mic_operand  : '' }}{{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Imipenem</td>
                        <td>{{ isset($isolate->lab_isolate->ipm_disk) ? $isolate->lab_isolate->ipm_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->ipm_disk_ris) ? $isolate->lab_isolate->ipm_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->ipm_mic_operand) ? $isolate->lab_isolate->ipm_mic_operand  : '' }}{{ isset($isolate->lab_isolate->ipm_mic) ? $isolate->lab_isolate->ipm_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->ipm_mic_ris) ? $isolate->lab_isolate->ipm_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Levofloxacin</td>
                        <td>{{ isset($isolate->lab_isolate->lvx_disk) ? $isolate->lab_isolate->lvx_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->lvx_disk_ris) ? $isolate->lab_isolate->lvx_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->lvx_mic_operand) ? $isolate->lab_isolate->lvx_mic_operand  : '' }}{{ isset($isolate->lab_isolate->lvx_mic) ? $isolate->lab_isolate->lvx_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->lvx_mic_ris) ? $isolate->lab_isolate->lvx_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Meropenem</td>
                        <td>{{ isset($isolate->lab_isolate->mem_disk) ? $isolate->lab_isolate->mem_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->mem_disk_ris) ? $isolate->lab_isolate->mem_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->mem_mic_operand) ? $isolate->lab_isolate->mem_mic_operand  : '' }}{{ isset($isolate->lab_isolate->mem_mic) ? $isolate->lab_isolate->mem_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->mem_mic_ris) ? $isolate->lab_isolate->mem_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Piperacillin-Tazobactam</td>
                        <td>{{ isset($isolate->lab_isolate->tzp_disk) ? $isolate->lab_isolate->tzp_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tzp_disk_ris) ? $isolate->lab_isolate->tzp_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tzp_mic_operand) ? $isolate->lab_isolate->tzp_mic_operand  : '' }}{{ isset($isolate->lab_isolate->tzp_mic) ? $isolate->lab_isolate->tzp_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tzp_mic_ris) ? $isolate->lab_isolate->tzp_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Tetracycline</td>
                        <td>{{ isset($isolate->lab_isolate->tet_disk) ? $isolate->lab_isolate->tet_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tet_disk_ris) ? $isolate->lab_isolate->tet_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tet_mic_operand) ? $isolate->lab_isolate->tet_mic_operand  : '' }}{{ isset($isolate->lab_isolate->tet_mic) ? $isolate->lab_isolate->tet_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tet_mic_ris) ? $isolate->lab_isolate->tet_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Tobramycin</td>
                        <td>{{ isset($isolate->lab_isolate->tob_disk) ? $isolate->lab_isolate->tob_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tob_disk_ris) ? $isolate->lab_isolate->tob_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tob_mic_operand) ? $isolate->lab_isolate->tob_mic_operand  : '' }}{{ isset($isolate->lab_isolate->tob_mic) ? $isolate->lab_isolate->tob_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->tob_mic_ris) ? $isolate->lab_isolate->tob_mic_ris  : '' }}</td>
                      </tr>
                      <tr>
                        <td>Trimethoprim-sulfamethoxazole</td>
                        <td>{{ isset($isolate->lab_isolate->sxt_disk) ? $isolate->lab_isolate->sxt_disk  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->sxt_disk_ris) ? $isolate->lab_isolate->sxt_disk_ris  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->sxt_mic_operand) ? $isolate->lab_isolate->sxt_mic_operand  : '' }}{{ isset($isolate->lab_isolate->sxt_mic) ? $isolate->lab_isolate->sxt_mic  : '' }}</td>
                        <td>{{ isset($isolate->lab_isolate->sxt_mic_ris) ? $isolate->lab_isolate->sxt_mic_ris  : '' }}</td>
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
@endif





{{-- <div class="card mb-2">
<div class="card-header text-white" style="background-color: #198754"><h4>Laboratory Personnel Section</h4></div>

<div class="card-body">
<div class="row mb-2">
<div class="form-group col-md-3">
  <label for="laboratory_personnel">Laboratory Personnel</label>
  <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->laboratory_personnel) & $isolate->site_isolate->laboratory_personnel != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel) ? $isolate->site_isolate->laboratory_personnel  : '' }}" id="laboratory_personnel" name="laboratory_personnel" placeholder="Laboratory Personnel">
</div>
<div class="form-group col-md-3">
  <label for="personnel_email">Email Address</label>
  <input type="email" class="form-control form-control-sm {{ isset($isolate->site_isolate->laboratory_personnel_email) & $isolate->site_isolate->laboratory_personnel_email != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel_email) ? $isolate->site_isolate->laboratory_personnel_email  : '' }}" id="personnel_email" name="laboratory_personnel_email" placeholder="Personnel Email">
</div>
<div class="form-group col-md-3">
  <label for="contact_number">Contact Number</label>
  <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->laboratory_personnel_contact) & $isolate->site_isolate->laboratory_personnel_contact != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel_contact) ? $isolate->site_isolate->laboratory_personnel_contact  : '' }}" id="contact_number" name="laboratory_personnel_contact" placeholder="Personnel Contact Number">
</div>
<div class="form-group col-md-3">
  <label for="date_accomplished">Date Accomlished</label>
  <input type="date"class="form-control form-control-sm {{ isset($isolate->site_isolate->date_accomplished) & $isolate->site_isolate->date_accomplished != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_accomplished) ? $isolate->site_isolate->date_accomplished->toDateString()  : '' }}" id="date_accomplished" name="date_accomplished" placeholder="Date Accomplished (e.g. mm/dd/yyyy)">
</div>
</div>
<div class="row  mb-2">
<div class="form-group">
<label for="notes">Notes</label>
<textarea class="form-control form-control-sm {{ isset($isolate->site_isolate->comments) & $isolate->site_isolate->notes != '' ? 'is-valid' : '' }}" id="notes" name="notes" rows="2">{{ isset($isolate->site_isolate->comments) ? $isolate->site_isolate->notes  : '' }}</textarea>
</div>
</div>
<button type="submit" class="btn btn-success right">Submit</button>
<a class="btn btn-success" href='/create-pdf-site/{{ $isolate->id }}'  >Download PDF ({{  $isolate->patient_id }})</a>
</div>
</div> --}}
</div>

</form>
{{-- <! -- end accordion #1 --> --}}
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Encoding for Laboratory
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
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
            </div>
          
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label for="organism_code">Bacterial Identification</label>
                {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->organism_code) ? $isolate->site_isolate->organism_code  : '' }}" id="organism_code" name="organism_code" placeholder="Organism Code"> --}}
                <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->bacterial_identification) & $isolate->lab_isolate->bacterial_identification != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="bacterial_identification" id="bacterial_identification1" >
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
                        <td colspan="2">MIC</td>
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
                      </select></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                
            </div>

            {{-- <div class="row mb-3">
              <div class="form-group">
              <label for="comment">Comments</label>
              <textarea class="form-control  {{ isset($isolate->lab_isolate->comments) & $isolate->lab_isolate->comments != '' ? 'is-valid' : '' }}" id="comment" name='comments' rows="2">{{ isset($isolate->lab_isolate->comments) ? $isolate->lab_isolate->comments  : '' }}</textarea>
              </div>
              </div> --}}
          

            {{-- end dito --}}
         </div>
         <button type="submit" class="btn btn-primary right">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>
      
       
     


  

                 
                </div>
            </div>
        </div>
        <script>
          $(document).ready(function() {
            $("#bacterial_identification").select2();
            $("#bacterial_identification1").select2();
            $("#specimen_type").select2();
            if("{!! $isolate->site_isolate->organism_code !!}" == "atcc49226")
            {
              document.getElementsByClassName('qc')[0].disabled  = true;
              document.getElementsByClassName('qc')[1].disabled  = true;
              document.getElementsByClassName('qc')[2].disabled  = true;
              document.getElementsByClassName('qc')[3].disabled = true;
              document.getElementsByClassName('qc')[4].disabled  = true;
              document.getElementsByClassName('qc')[5].disabled  = true;
              document.getElementsByClassName('qc')[6].disabled  = true;
              document.getElementsByClassName('qc')[7].disabled  = true;
              document.getElementsByClassName('qc')[8].disabled  = true;
              document.getElementsByClassName('qc')[9].disabled  = true;
              document.getElementsByClassName('qc')[10].disabled  = true;
              document.getElementsByClassName('qc')[11].disabled  = true;
              document.getElementsByClassName('qc')[12].disabled  = true;
              document.getElementsByClassName('qc')[13].disabled  = true;
              document.getElementsByClassName('qc')[14].disabled  = true;
              document.getElementsByClassName('qc')[15].disabled  = true;
              document.getElementsByClassName('qc')[16].disabled  = true;
              document.getElementsByClassName('qc')[17].disabled  = true;
              // document.getElementsByClassName('qc')[18].disabled  = true;
            }
           });
        </script>
        <script>
          document.getElementById('qc_chk').onchange = function() {
            document.getElementsByClassName('qc')[0].disabled  = this.checked;
            document.getElementsByClassName('qc')[1].disabled  = this.checked;
            document.getElementsByClassName('qc')[2].disabled  = this.checked;
            document.getElementsByClassName('qc')[3].disabled = this.checked;
            document.getElementsByClassName('qc')[4].disabled  = this.checked;
            document.getElementsByClassName('qc')[5].disabled  = this.checked;
            document.getElementsByClassName('qc')[6].disabled  = this.checked;
            document.getElementsByClassName('qc')[7].disabled  = this.checked;
            document.getElementsByClassName('qc')[8].disabled  = this.checked;
            document.getElementsByClassName('qc')[9].disabled  = this.checked;
            document.getElementsByClassName('qc')[10].disabled  = this.checked;
            document.getElementsByClassName('qc')[11].disabled  = this.checked;
            document.getElementsByClassName('qc')[12].disabled  = this.checked;
            document.getElementsByClassName('qc')[13].disabled  = this.checked;
            document.getElementsByClassName('qc')[14].disabled  = this.checked;
            document.getElementsByClassName('qc')[15].disabled  = this.checked;
            document.getElementsByClassName('qc')[16].disabled  = this.checked;
            document.getElementsByClassName('qc')[17].disabled  = this.checked;
            // document.getElementsByClassName('qc')[18].disabled  = this.checked;
            if(this.checked){
              document.getElementById('organism_code').selectedIndex = 8;
            }else{
              document.getElementById('organism_code').selectedIndex = 0;
            }
            
        };
        </script>
@endsection
