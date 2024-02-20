<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_isolates', function (Blueprint $table) {
            $table->id();
            // ~~~~~~ PATIENT INFORMATION
            $table->foreignId('isolate_id')->constrained();
            // $table->date('referral_date')->nullable();
            // $table->text('patient_id')->nullable();
            $table->text('patient_first_name')->nullable();
            $table->text('patient_middle_name')->nullable();
            $table->text('patient_last_name')->nullable();
            // $table->date('patient_date_of_birth')->nullable();
            $table->text('patient_age')->nullable();
            $table->text('patient_sex')->nullable();
            $table->text('ward')->nullable();
            // $table->text('anatomic_collection')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->text('attending_physician')->nullable();
            // ~~~~~~ END PATIENT INFORMATION


            // ~~~~~~ ISOLATE INFORMATION
            $table->text('specimen_type')->nullable();
            $table->date('date_of_sample_collection')->nullable();
            $table->date('date_received_arsrl')->nullable();
            // ~~~~~~ END ISOLATE INFORMATION


            // ~~~~~~ CULTURE RESULTS
            $table->text('bacterial_identification')->nullable();
            $table->text('esbl')->nullable();
            $table->date('date_of_testing')->nullable();
            $table->text('amk_disk')->nullable();
            $table->text('amk_disk_ris')->nullable();
            $table->text('amk_mic_operand')->nullable();
            $table->text('amk_mic')->nullable();
            $table->text('amk_mic_ris')->nullable();

            $table->text('amp_disk')->nullable();
            $table->text('amp_disk_ris')->nullable();
            $table->text('amp_mic_operand')->nullable();
            $table->text('amp_mic')->nullable();
            $table->text('amp_mic_ris')->nullable();


            $table->text('sam_disk')->nullable();
            $table->text('sam_disk_ris')->nullable();
            $table->text('sam_mic_operand')->nullable();
            $table->text('sam_mic')->nullable();
            $table->text('sam_mic_ris')->nullable();


            $table->text('chl_disk')->nullable();
            $table->text('chl_disk_ris')->nullable();
            $table->text('chl_mic_operand')->nullable();
            $table->text('chl_mic')->nullable();
            $table->text('chl_mic_ris')->nullable();


            $table->text('ct_ctl_disk')->nullable();
            $table->text('ct_ctl_disk_ris')->nullable();
            $table->text('ct_ctl_mic_operand')->nullable();
            $table->text('ct_ctl_mic')->nullable();
            $table->text('ct_ctl_mic_ris')->nullable();


            $table->text('tz_tzl_disk')->nullable();
            $table->text('tz_tzl_disk_ris')->nullable();
            $table->text('tz_tzl_mic_operand')->nullable();
            $table->text('tz_tzl_mic')->nullable();
            $table->text('tz_tzl_mic_ris')->nullable();

            $table->text('amc_disk')->nullable();
            $table->text('amc_disk_ris')->nullable();
            $table->text('amc_mic_operand')->nullable();
            $table->text('amc_mic')->nullable();
            $table->text('amc_mic_ris')->nullable();

            $table->text('atm_disk')->nullable();
            $table->text('atm_disk_ris')->nullable();
            $table->text('atm_mic_operand')->nullable();
            $table->text('atm_mic')->nullable();
            $table->text('atm_mic_ris')->nullable();

            $table->text('fep_disk')->nullable();
            $table->text('fep_disk_ris')->nullable();
            $table->text('fep_mic_operand')->nullable();
            $table->text('fep_mic')->nullable();
            $table->text('fep_mic_ris')->nullable();

            $table->text('ctx_disk')->nullable();
            $table->text('ctx_disk_ris')->nullable();
            $table->text('ctx_mic_operand')->nullable();
            $table->text('ctx_mic')->nullable();
            $table->text('ctx_mic_ris')->nullable();

            $table->text('fox_disk')->nullable();
            $table->text('fox_disk_ris')->nullable();
            $table->text('fox_mic_operand')->nullable();
            $table->text('fox_mic')->nullable();
            $table->text('fox_mic_ris')->nullable();

            $table->text('cxa_disk')->nullable();
            $table->text('cxa_disk_ris')->nullable();
            $table->text('cxa_mic_operand')->nullable();
            $table->text('cxa_mic')->nullable();
            $table->text('cxa_mic_ris')->nullable();

            $table->text('caz_disk')->nullable();
            $table->text('caz_disk_ris')->nullable();
            $table->text('caz_mic_operand')->nullable();
            $table->text('caz_mic')->nullable();
            $table->text('caz_mic_ris')->nullable();
            
            $table->text('czo_disk')->nullable();
            $table->text('czo_disk_ris')->nullable();
            $table->text('czo_mic_operand')->nullable();
            $table->text('czo_mic')->nullable();
            $table->text('czo_mic_ris')->nullable();
            
            $table->text('cza_disk')->nullable();
            $table->text('cza_disk_ris')->nullable();
            $table->text('cza_mic_operand')->nullable();
            $table->text('cza_mic')->nullable();
            $table->text('cza_mic_ris')->nullable();
            
            $table->text('czt_disk')->nullable();
            $table->text('czt_disk_ris')->nullable();
            $table->text('czt_mic_operand')->nullable();
            $table->text('czt_mic')->nullable();
            $table->text('czt_mic_ris')->nullable();
            
            $table->text('cro_disk')->nullable();
            $table->text('cro_disk_ris')->nullable();
            $table->text('cro_mic_operand')->nullable();
            $table->text('cro_mic')->nullable();
            $table->text('cro_mic_ris')->nullable();
            
            $table->text('cip_disk')->nullable();
            $table->text('cip_disk_ris')->nullable();
            $table->text('cip_mic_operand')->nullable();
            $table->text('cip_mic')->nullable();
            $table->text('cip_mic_ris')->nullable();
            
            $table->text('etp_disk')->nullable();
            $table->text('etp_disk_ris')->nullable();
            $table->text('etp_mic_operand')->nullable();
            $table->text('etp_mic')->nullable();
            $table->text('etp_mic_ris')->nullable();
            
            $table->text('gen_disk')->nullable();
            $table->text('gen_disk_ris')->nullable();
            $table->text('gen_mic_operand')->nullable();
            $table->text('gen_mic')->nullable();
            $table->text('gen_mic_ris')->nullable();
            
            $table->text('ipm_disk')->nullable();
            $table->text('ipm_disk_ris')->nullable();
            $table->text('ipm_mic_operand')->nullable();
            $table->text('ipm_mic')->nullable();
            $table->text('ipm_mic_ris')->nullable();
            
            $table->text('lvx_disk')->nullable();
            $table->text('lvx_disk_ris')->nullable();
            $table->text('lvx_mic_operand')->nullable();
            $table->text('lvx_mic')->nullable();
            $table->text('lvx_mic_ris')->nullable();
            
            $table->text('mem_disk')->nullable();
            $table->text('mem_disk_ris')->nullable();
            $table->text('mem_mic_operand')->nullable();
            $table->text('mem_mic')->nullable();
            $table->text('mem_mic_ris')->nullable();
            
            $table->text('tzp_disk')->nullable();
            $table->text('tzp_disk_ris')->nullable();
            $table->text('tzp_mic_operand')->nullable();
            $table->text('tzp_mic')->nullable();
            $table->text('tzp_mic_ris')->nullable();
            
            $table->text('tet_disk')->nullable();
            $table->text('tet_disk_ris')->nullable();
            $table->text('tet_mic_operand')->nullable();
            $table->text('tet_mic')->nullable();
            $table->text('tet_mic_ris')->nullable();
            
            $table->text('tob_disk')->nullable();
            $table->text('tob_disk_ris')->nullable();
            $table->text('tob_mic_operand')->nullable();
            $table->text('tob_mic')->nullable();
            $table->text('tob_mic_ris')->nullable();
            
            $table->text('sxt_disk')->nullable();
            $table->text('sxt_disk_ris')->nullable();
            $table->text('sxt_mic_operand')->nullable();
            $table->text('sxt_mic')->nullable();
            $table->text('sxt_mic_ris')->nullable();


            $table->text('col_disk')->nullable();
            $table->text('col_disk_ris')->nullable();
            $table->text('col_mic_operand')->nullable();
            $table->text('col_mic')->nullable();
            $table->text('col_mic_ris')->nullable();

            
            $table->date('date_released')->nullable();
            $table->text('verified_by')->nullable();
            $table->text('noted_by')->nullable();
            $table->text('remarks')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('created_by')->references('id')->on('users')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_isolates');
    }
};
