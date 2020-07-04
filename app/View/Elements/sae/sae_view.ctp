<?php
    $checked = '&#9745;';
    $nChecked = '&#x25a2;';
?>

<div class="sae-form">    
    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td><h5> <?php echo $sae['Sae']['reference_no']; ?> </h5> </td>
          <td><h5 style="text-align: center;"> <?php 
                if($sae['Sae']['report_type'] == 'Followup') {
                  echo 'Follow Up <br>';
                  echo 'Initial: '.$this->Html->link(
                      '<label class="label label-info">'.substr($sae['Sae']['reference_no'], 0, strpos($sae['Sae']['reference_no'], '-')).'</label>', 
                      array('action' => 'view', $sae['Sae']['sae_id']), array('escape' => false));   
                }
                
              ?> </h5> 
          </td>
          <td><h5 style="text-align: right;"> <span>CIOMS FORM</span></h5></td>
        </tr>
      </tbody>
    </table>
    <hr>
    <h4 style="text-decoration: underline;">  </h4>
    <?php
      // echo $this->requestAction('/applications/study_title/'.$sae['Sae']['application_id']);
    ?>
    <h4 class="text-center"  style="text-align: center; text-decoration: underline;">REACTION INFORMATION</h4>
    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td class="table-label required" width="25%"><p>Patient Initials <small class="muted">(first, last)</small> <span class="sterix">*</span></p></td>
          <td  width="25%"><?php  echo $sae['Sae']['patient_initials']; ?></td>
          <td colspan="2"><h5 style="text-align: center;">Check All Appropriate to Adverse Reaction</h5></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Country  <span class="sterix">*</span></p></td>
          <td></td>
          <td class="table-label required"><p>Patient Died</p></td>
          <td><?php  echo ($sae['Sae']['patient_died']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Date of Birth <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['Sae']['date_of_birth']; ?></td>
          <td class="table-label required"><p>Involved or Prolonged Inpatient Hospitalization</p></td>
          <td><?php  echo ($sae['Sae']['prolonged_hospitalization']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Years</p></td>
          <td><?php  echo $sae['Sae']['age_years']; ?></td>
          <td class="table-label required"><p>Involved Persistence or Significant Disability or Incapacity</p></td>
          <td><?php  echo ($sae['Sae']['incapacity']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Date of enrollment into the study</p></td>
          <td><?php  echo $sae['Sae']['enrollment_date']; ?></td>
          <td class="table-label required"><p>Life Threatening</p></td>
          <td><?php  echo ($sae['Sae']['life_threatening']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Date of initial administration of investigational product</p></td>
          <td><?php  echo $sae['Sae']['administration_date']; ?></td>
          <td class="table-label required"><p>Other</p></td>
          <td><?php  echo ($sae['Sae']['reaction_other']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Date of the latest administration of the investigational product </p></td>
          <td><?php  echo $sae['Sae']['latest_date']; ?></td>
          <td class="table-label required"></td>
          <td></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Reaction Onset <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['Sae']['reaction_onset']; ?></td>
          <td class="table-label required"></td>
          <td></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Reaction end date</p></td>
          <td><?php  echo $sae['Sae']['reaction_end_date']; ?></td>
          <td class="table-label required"><p>Gender <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['Sae']['gender']; ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td class="table-label required" width="25%"><p>Causality of the reaction <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['Sae']['causality']; ?></td>
        </tr>
        <tr>
          <td class="table-label required" width="25%"><p>Describe Reaction(s) <small class="muted">(including relevant test, lab data)</small> <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['Sae']['reaction_description']; ?></td>
        </tr>
      </tbody>
    </table>
    <hr class="my-view">

    <h4 style="text-align: center; text-decoration: underline;">SUSPECTED DRUG(S) INFORMATION</h4>
    <?php
      for ($i=0; $i < count($sae['SuspectedDrug']); $i++) { 
    ?>
    <span class="badge badge-info"><?php echo $i+1;?></span>
    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td class="table-label required"><p>Generic Name <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['generic_name']; ?></td>
          <td class="table-label required"><p>Therapy Date <small class="muted">(from)</small>  <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['date_from']; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Dose <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['dose']; ?></td>
          <td class="table-label required"><p>Therapy Date <small class="muted">(to)</small>  <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['date_to']; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Administration Route <span class="sterix">*</span></p></td>
          <td><?php  echo isset($sae['SuspectedDrug'][$i]['Route']['name']) ? $sae['SuspectedDrug'][$i]['Route']['name'] : ''; ?></td>
          <td class="table-label required"><p>Therapy duration</p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['therapy_duration']; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Indication for use <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['indication']; ?></td>
          <td class="table-label required"><p>Did reaction reappear after reintroduction? <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['reaction_reappear']; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Did reaction abate after stopping drug? <span class="sterix">*</span> </p></td>
          <td><?php  echo $sae['SuspectedDrug'][$i]['reaction_abate']; ?></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <?php } ?>
    <hr class="my-view">   

    <h4 style="text-align: center; text-decoration: underline;">CONCOMITANT DRUG(S) AND HISTORY</h4>
    <?php
      for ($i=0; $i < count($sae['ConcomittantDrug']); $i++) { 
    ?>
    <span class="badge badge-info"><?php echo $i+1;?></span>
    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td class="table-label required"><p>Generic Name <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['ConcomittantDrug'][$i]['generic_name']; ?></td>
          <td class="table-label required"><p>Therapy Date <small class="muted">(from)</small>  <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['ConcomittantDrug'][$i]['date_from']; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Dose <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['ConcomittantDrug'][$i]['dose']; ?></td>
          <td class="table-label required"><p>Therapy Date <small class="muted">(to)</small>  <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['ConcomittantDrug'][$i]['date_to']; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Administration Route <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['ConcomittantDrug'][$i]['Route']['name']; ?></td>
          <td class="table-label required"><p>Indication for use <span class="sterix">*</span></p></td>
          <td><?php  echo $sae['ConcomittantDrug'][$i]['indication']; ?></td>
        </tr>
      </tbody>
    </table>
    <?php } ?>
    <hr class="my-view">    

    <h4 style="text-align: center; text-decoration: underline;">MANUFACTURER INFORMATION</h4>
    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td class="table-label required" width="25%"><p>Name and Address of Manufacturer</p></td>
          <td  width="25%"><?php  echo $sae['Sae']['manufacturer_name']; ?></td>
          <td colspan="2"><h5 style="text-align: center;">Report Source </h5></td>
        </tr>
        <tr>
          <td class="table-label required"><p>MFR Control No.</p></td>
          <td><?php  echo $sae['Sae']['mfr_no']; ?></td>
          <td class="table-label required"><p>Study</p></td>
          <td><?php  echo ($sae['Sae']['source_study']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td class="table-label required"><p>Date Received by Manufacturer</p></td>
          <td><?php  echo $sae['Sae']['manufacturer_date']; ?></td>
          <td class="table-label required"><p>Literature</p></td>
          <td><?php  echo ($sae['Sae']['source_literature']) ? $checked : $nChecked; ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="table-label required"><p>Health Professional</p></td>
          <td><?php  echo ($sae['Sae']['source_health_professional']) ? $checked : $nChecked; ?></td>
        </tr>
      </tbody>
    </table>
    <hr class="my-view">    

    <h4 style="text-align: center; text-decoration: underline;">REPORTER</h4>
    <table class="table  table-condensed">
      <tbody>
        <tr>
          <td class="table-label required"><p>Name </p></td>
          <td><?php  echo $sae['Sae']['reporter_name']; ?></td>
          <td class="table-label required"><p>Phone</p></td>
          <td><?php  echo $sae['Sae']['reporter_phone']; ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td class="table-label required"><p>Email</p></td>
          <td><?php  echo $sae['Sae']['reporter_email']; ?></td>
        </tr>
      </tbody>
    </table>

</div>