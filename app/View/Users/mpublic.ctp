<?php
$this->assign('Home', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
?>
<hr>


<div class="container marketing">
    <br> <br> <br>

    <div class="row-fluid">
        <div class="span8">
            <h2>Who can report?</h2><br>
            <h5> Any member of the public or patient </h5>
            <p>Any member of the public is able to report any cases of adverse drug<br>reactions or incidents involving medical devices. For minors, parents/gaurdians<br>can report on their behalf.</p>
            <p><a class="btn btn-primary " href="/padrs/add">Submit a Report</a></p>
        </div>
        <div class="span4" style="background-color: #F7F7F7; position: relative; padding: 0; margin: 15; min-height: 200px; border-radius: 11px;">

        </div>
    </div>

    <br><br>
    <div class="row-fluid">
        <div class="accordion" id="accordionExample">
            <div class="card" id="parent_card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link ml-auto" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What can you report on? 
                            <!-- <i class="fa fa-chevron-down float-right"></i> -->
                        </button>
                    </h5>
                </div>
                <hr>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p style="text-align: left;">Adverse reactions caused by Drugs</p>
                        <p style="text-align: left;">Adverse Events Following Immunization</p>
                        <p style="text-align: left;">Poor Quality Medical Products</p>
                        <p style="text-align: left;">Medication Errors</p>
                        <p style="text-align: left;">Reactions caused by Transfusion</p>
                        <p style="text-align: left;">Medical Devices Incidences</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="card" id="parent_card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseheadingTwo" aria-expanded="true" aria-controls="collapseheadingTwo">
                            Guide to reporting poor quality medical products by members of the public
                            <!-- <i class="fa fa-chevron-down float-left"></i> -->
                        </button>
                    </h5>
                </div>
                <hr>
                <div id="collapseheadingTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <p style="text-align: left;">Indicate your name and county</p>
                        <p style="text-align: left;">Indicate your contact- telephone number (It is important for follow up by the Pharmacy and Poisons Board and to obtain additional information as well as providing you with the feedback)</p>
                        <p style="text-align: left;">Select report on poor quality medicine</p>
                        <p style="text-align: left;">Select the issue with the medicine or medical device e.g., wrong labeling, no label, unusual material in the medicine, color change, unusual smell, medicine is not working, different color shade of the packaging, malfunction of medical device or others (specify),</p>
                        <p style="text-align: left;">Indicate name of the product e.g. Xmol syrup</p>
                        <p style="text-align: left;">Indicate where you bought / obtained the medicine from e.g., Harambee Chemist</p>
                        <p style="text-align: left;">If you have any photos or documents you can attach</p>
                        <p style="text-align: left;">Indicate the date for reporting</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="card" id="parent_card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Guide to reporting poor quality medical products by healthcare professionals
                            <!-- <i class="fa fa-chevron-down float-left"></i> -->
                        </button>
                    </h5>
                </div>
                <hr>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <p style="text-align: left;">Once on the PvERS page, click on “PQMP”</p>
                        <p style="text-align: left;">Clink on “new PQMP” and fill the details on the pink form</p>
                        <p style="text-align: left;">Select the product category i.e., medicine, herbal product, vaccine, medical device, others (specify)</p>
                        <p style="text-align: left;">Indicate facility details i.e., name of facility, name of county and sub-county, contact of facility (email and telephone)</p>
                        <p style="text-align: left;">Indicate product details i.e., the brand name, batch number or lot number, date of manufacture and date of expiry, INN name, name of manufacturer, name of supplier</p>
                        <p style="text-align: left;">Describe product formulation e.g., oral tablets/capsules, oral suspension/syrup, eye drops, cream, ointment injection, others (specify)</p>
                        <p style="text-align: left;">Select the quality defect from the drop down i.e., color change, powdering, crumbling, caking, molding, change of odor, mislabeling, others (specify)</p>
                        <p style="text-align: left;">Describe the complaint in detail</p>
                        <p style="text-align: left;">Describe storage conditions of the medical product e.g., stored under cold chain, stored in room temperature, others (specify)</p>
                        <p style="text-align: left;">State whether the medical product was dispensed and returned by the patient / client (where applicable)</p>
                        <p style="text-align: left;">If you have any photos or documents you can attach</p>
                        <p style="text-align: left;">Write your name, contact (email address and telephone number) and the date for reporting</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="blank_public"></div>
    </div>
</div>
 