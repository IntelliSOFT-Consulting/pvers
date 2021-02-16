<?php
    $this->assign('PADR', 'active');
    $ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
?>

      <!-- PADR
    ================================================== -->

    <div class="row-fluid">
        <div class="span12">

            <div id="printAreade">
                <div class="pformback">

                <div class="row-fluid">
                    <div class="span12" style="text-align: center;">
                        <?php
                            echo $this->Html->image('confidence.png', array('alt' => 'COA', 'full_base' => true));
                        ?>
                    </div>
                </div>
                <hr>

                <table style="width: 100%;">
                    <tr>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;">REPORT ID: </td>
                        <td>
                            <p><strong><?php echo $padr['Padr']['reference_no'] ?></strong></p>
                        </td>
                    </tr>
                </table>

                <div style="background-color: lightseagreen;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PERSON REPORTING</h5></div>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 25%;">Name of Person Reporting:</td>
                        <td style="width: 25%;"><strong><?php echo $padr['Padr']['reporter_name'] ?>    </strong></td>
                        <td style="width: 25%;">Relation: </td>
                        <td style="width: 25%;"><strong><?php echo $padr['Padr']['relation'] ?>     </strong></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Email Address: </td>
                        <td style="width: 25%;"><strong><?php echo $padr['Padr']['reporter_email'] ?>   </strong></td>
                        <td style="width: 25%;">Phone No.:</td>
                        <td style="width: 25%;"><strong><?php echo $padr['Padr']['reporter_phone'] ?>   </strong></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;">County: </td>
                        <td style="width: 25%;"><strong><?php echo $padr['County']['county_name'] ?>    </strong></td>
                    </tr>
                </table>

                <div style="background-color: lightblue;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PATIENT</h5></div>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 25%;">Patient's Name:</td>
                        <td style="width: 25%;"><strong><?php echo $padr['Padr']['patient_name'] ?> </strong></td>
                        <td style="width: 25%;">Gender: </td>
                        <td style="width: 25%;"><strong><?php echo $padr['Padr']['gender'] ?>   </strong></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Date of Birth:</td>
                        <td><strong><?php
                            $dob = ''; $bod = $padr['Padr']['date_of_birth'];
                            if(isset($bod['day'])) $dob.=$bod['day'].'-';
                            if(isset($bod['month'])) $dob.=$bod['month'].'-';
                            if(isset($bod['year'])) $dob.=$bod['year'];
                            echo $dob; 
                            echo $padr['Padr']['age_group'];
                            ?></strong>
                        </td>
                    </tr>
                </table>

                <table class="table table-bordered table-condensed">
                    <tbody>
                    <tr class="success">
                    <td style="width: 35%;"><label class="required" style="text-align: right;">Select type of report:</label> </td>
                    <td><strong><?php echo $padr['Padr']['report_sadr']; ?></strong>
                    </td>
                    </tr>
                    </tbody>
                </table>

                <div style="background-color: lightpink;"><h5 style="text-align: center; text-decoration: underline;">SIDE EFFECT</h5></div>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 35%;">

                            <h6>Select all side effects experienced</h6>
                            <p> <?php echo ($sadr['Sadr']['sadr_vomiting']   ? $ichecked : $nchecked ); ?> Vomiting or diarrhoea  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_dizziness']   ? $ichecked : $nchecked ); ?> Dizziness or drowsiness   </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_headache']   ? $ichecked : $nchecked ); ?> Headache   </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_joints']   ? $ichecked : $nchecked ); ?> Joints and muscle pain  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_rash']   ? $ichecked : $nchecked ); ?> Rash, itching, swelling on skin  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_mouth']   ? $ichecked : $nchecked ); ?> Pain or bleeding in the mouth  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_stomach']   ? $ichecked : $nchecked ); ?> Pain in the stomach  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_urination']   ? $ichecked : $nchecked ); ?> Abnormal changes with urination  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_eyes']   ? $ichecked : $nchecked ); ?> Red, painful eyes  </p>
                            <p> <?php echo ($sadr['Sadr']['sadr_died']   ? $ichecked : $nchecked ); ?> Patient died  </p>
                            
                        </td>
                        <td style="width: 30%;">
                            Other side effects experienced:
                            <br><strong><?php echo $padr['Padr']['description_of_reaction'] ?></strong>
                        </td>
                        <td>
                            When did the reaction start? 
                            <strong><?php 
                                $rod = $padr['Padr']['date_of_onset_of_reaction']; $dor = '';
                                if(isset($rod['day'])) $dor.=$rod['day'].'-';
                                if(isset($rod['month'])) $dor.=$rod['month'].'-';
                                if(isset($rod['year'])) $dor.=$rod['year'];
                                echo $dor;
                             ?></strong>
                            Is the reaction still on? 
                            <strong><?php echo $padr['Padr']['reaction_on'] ?></strong>
                        </td>
                    </tr>
                </table>

                <div style="background-color: #f5f5a4;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE MEDICINE THAT CAUSED THE REACTION <br><em>(Include all medications)</em></h5></div>
                <table  class="table" style="width: 100%;" >
                    <tbody>
                        <?php
                            $i = 0;
                            foreach ($padr['PadrListOfMedicine'] as $padrListOfMedicine): ?>
                            <tr>
                                <td rowspan="3" class="sailor"><?= $i+1; ?></td>
                                <td>
                                    Name of Medicine <span style="color:red;">*</span>
                                </td>
                                <td>
                                    <?php
                                      echo  $padrListOfMedicine['product_name']; 
                                    ?>
                                </td>
                                <td>
                                  Manufacturer
                                </td>                 
                                <td>
                                    <?php
                                    echo  $padrListOfMedicine['manufacturer']; 
                                    ?>
                                </td> 
                                <td rowspan="3">
                                    
                                </td>
                              </tr>
                              <tr>
                                <td>When did you start taking the medicine? <span style="color:red;">*</span></td>
                                <td>
                                    <?php
                                      echo $padrListOfMedicine['start_date']; 
                                    ?>
                                </td>
                                <td>When did you stop taking the medicine? <span class="help-block">(dd-mm-yyyy)</span> </td>
                                <td>
                                    <?php
                                    echo  $padrListOfMedicine['end_date']; 
                                    ?>
                                </td> 
                              </tr>
                              <tr>
                                <td>Expiry date of the medicine</td>
                                <td>
                                    <?php
                                      echo  $padrListOfMedicine['expiry_date']; 
                                    ?>
                                </td>                    
                                <td>Where did you buy the medicine?  </td> 
                                <td> 
                                    <?php
                                      echo  $padrListOfMedicine['medicine_source']; 
                                    ?> 
                                </td> 
                              </tr>
                        <?php endforeach; ?>
                    </tbody>
              </table>
                <hr>

                </div> <!-- /art-sheet -->
            </div> <!-- /art-sheet -->
        </div>
    </div>

