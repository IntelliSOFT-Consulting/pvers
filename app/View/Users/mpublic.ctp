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
            <h2> What can you report on?</h2><br>
            <p>Any member of the public is able to report any cases of adverse drug<br>reactions or incidents involving medical devices. For minors, parents/gaurdians<br>can report on their behalf.</p>
            <p>
                <a class="btn btn-primary btn-lg" href="/padrs/add">
                    <span style="line-height: 60px;">Submit a Report</span>
                </a>
            </p>

        </div>
        <div class="span4" style="background-color: white; position: relative; padding: 0; margin: 15; min-height: 200px; border-radius: 11px;">

        </div>
    </div>

    <br><br>
    <div class="row-fluid">

        <div class="container">
            <div class="header_">
                <h2>Guidelines</h2>
                <br>
            </div>
            <div id="accordion" class="accordion">
                <!-- <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                        <a class="card-title">
                            What can you report on?
                        </a>
                    </div>
                    <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                        <br>
                        <p style="text-align: left;">i. Adverse reactions caused by Drugs</p>
                        <p style="text-align: left;">ii. Adverse Events Following Immunization</p>
                        <p style="text-align: left;">iii. Poor Quality Medical Products</p>
                        <p style="text-align: left;">iv. Medication Errors</p>
                        <p style="text-align: left;">v. Reactions caused by Transfusion</p>
                        <p style="text-align: left;">vi.Medical Devices Incidences</p>
                    </div>
                </div> -->
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="card-title">
                            Guide to reporting poor quality medical products
                        </a>
                    </div>
                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                        <br>
                        <p style="text-align: left;">i. Indicate your name and county</p>
                        <p style="text-align: left;">ii. Indicate your contact- telephone number (It is important for follow up by the Pharmacy and Poisons Board and to obtain additional information as well as providing you with the feedback)</p>
                        <p style="text-align: left;">iii. Select report on poor quality medicine</p>
                        <p style="text-align: left;">iv.Select the issue with the medicine or medical device e.g., wrong labeling, no label, unusual material in the medicine, color change, unusual smell, medicine is not working, different color shade of the packaging, malfunction of medical device or others (specify),</p>
                        <p style="text-align: left;">v. Indicate name of the product e.g. Xmol syrup</p>
                        <p style="text-align: left;">vi. Indicate where you bought / obtained the medicine from e.g., X Chemist</p>
                        <p style="text-align: left;">vii. If you have any photos or documents you can attach</p>
                        <p style="text-align: left;">viii. Indicate the date for reporting</p>
                    </div>
                </div>
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="card-title"> 
                            Guide to reporting adverse reactions
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <br>
                            <p style="text-align: left;">i. Indicate your name and county</p>
                            <p style="text-align: left;">ii. Indicate your contact- telephone number (It is important for follow up by the Pharmacy and Poisons Board and to obtain additional information as well as providing you with the feedback)</p>
                            <p style="text-align: left;">iii. Select report on adverse reaction.</p>
                            <p style="text-align: left;">iv. Select the symptoms or condition you are experiencing from the list e.g Vomiting or diarrhoea, Dizziness or drowsiness, Headache e.tc</p>
                            <p style="text-align: left;">v. If a symptom or condition is not the list provided, indicate it on the other side effects experienced.</p>
                            <p style="text-align: left;">vi. Indicate the date when the reaction started and select whether or not if you are still experiencing the condition.</p>
                            <p style="text-align: left;">vii. Indicate name of the product e.g. Xmol syrup</p>
                            <p style="text-align: left;">viii. Indicate where you bought / obtained the medicine from e.g., X Chemist</p>
                            <p style="text-align: left;">ix. If you have any photos or documents you can attach</p>
                            <p style="text-align: left;">x. Indicate the date for reporting</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row-fluid">
        <div class="blank_public"></div>
    </div>
</div>