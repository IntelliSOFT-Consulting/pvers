echo "Assiging permissions to users..."
app/Console/cake acl_extras aco_sync
# app/Console/cake cache clear_all
echo "*************** Assign Admin Permissions  *******************"
#Admin permissions
app/Console/cake acl grant Group.1 controllers
# Allow managers to some controllers
echo "*************** Assign Managers Permissions  *******************"
app/Console/cake acl deny Group.2 controllers
app/Console/cake acl grant Group.2 controllers/Users/manager_dashboard
app/Console/cake acl grant Group.2 controllers/Sadrs
app/Console/cake acl grant Group.2 controllers/Aefis
app/Console/cake acl grant Group.2 controllers/SadrFollowups
app/Console/cake acl grant Group.2 controllers/Pqmps
app/Console/cake acl grant Group.2 controllers/Devices
app/Console/cake acl grant Group.2 controllers/Medications
app/Console/cake acl grant Group.2 controllers/Transfusions
app/Console/cake acl grant Group.2 controllers/Padrs
app/Console/cake acl grant Group.2 controllers/Saes
app/Console/cake acl grant Group.2 controllers/Attachments
app/Console/cake acl grant Group.2 controllers/Counties
app/Console/cake acl grant Group.2 controllers/Countries
app/Console/cake acl grant Group.2 controllers/Designations
app/Console/cake acl grant Group.2 controllers/Doses
app/Console/cake acl grant Group.2 controllers/DrugDictionaries
app/Console/cake acl grant Group.2 controllers/FacilityCodes
app/Console/cake acl grant Group.2 controllers/Feedbacks
app/Console/cake acl grant Group.2 controllers/Frequencies
app/Console/cake acl grant Group.2 controllers/HelpInfos
app/Console/cake acl grant Group.2 controllers/Messages
app/Console/cake acl grant Group.2 controllers/Routes
app/Console/cake acl grant Group.2 controllers/SadrListOfDrugs
app/Console/cake acl grant Group.2 controllers/SadrListOfMedicines
app/Console/cake acl grant Group.2 controllers/AefiListOfVaccines
app/Console/cake acl grant Group.2 controllers/ListOfDevices
app/Console/cake acl grant Group.2 controllers/MedicationProducts
app/Console/cake acl grant Group.2 controllers/Pints
app/Console/cake acl grant Group.2 controllers/WhoDrugs
app/Console/cake acl grant Group.2 controllers/Pages
app/Console/cake acl grant Group.2 controllers/Users/changePassword
app/Console/cake acl grant Group.2 controllers/Users/edit
app/Console/cake acl grant Group.2 controllers/Users/admin_index
app/Console/cake acl grant Group.2 controllers/Users/admin_add
app/Console/cake acl grant Group.2 controllers/Notifications
app/Console/cake acl grant Group.2 controllers/Comments 
app/Console/cake acl grant Group.2 controllers/Reports
app/Console/cake acl grant Group.2 controllers/AefiDescriptions

# Allow reporters to some 
echo "*************** Assign Reporter Permissions  *******************"
app/Console/cake acl deny Group.3 controllers
app/Console/cake acl grant Group.3 controllers/Users/reporter_dashboard
app/Console/cake acl grant Group.3 controllers/Users/edit
        
app/Console/cake acl grant Group.3 controllers/Sadrs/sadrIndex
app/Console/cake acl grant Group.3 controllers/Sadrs/reporter_index
app/Console/cake acl grant Group.3 controllers/Sadrs/reporter_add
app/Console/cake acl grant Group.3 controllers/Sadrs/reporter_followup
app/Console/cake acl grant Group.3 controllers/Sadrs/reporter_edit
app/Console/cake acl grant Group.3 controllers/Sadrs/reporter_view
app/Console/cake acl grant Group.3 controllers/Sadrs/institutionCodes
app/Console/cake acl grant Group.3 controllers/Sadrs/reporter_delete

app/Console/cake acl grant Group.3 controllers/Aefis/aefiIndex
app/Console/cake acl grant Group.3 controllers/Aefis/institutionCodes
app/Console/cake acl grant Group.3 controllers/Aefis/reporter_index
app/Console/cake acl grant Group.3 controllers/Aefis/reporter_add
app/Console/cake acl grant Group.3 controllers/Aefis/reporter_followup
app/Console/cake acl grant Group.3 controllers/Aefis/reporter_edit
app/Console/cake acl grant Group.3 controllers/Aefis/reporter_view
app/Console/cake acl grant Group.3 controllers/Aefis/reporter_delete

app/Console/cake acl grant Group.3 controllers/Pqmps/reporter_index
app/Console/cake acl grant Group.3 controllers/Pqmps/reporter_add
app/Console/cake acl grant Group.3 controllers/Pqmps/reporter_edit
app/Console/cake acl grant Group.3 controllers/Pqmps/reporter_view
app/Console/cake acl grant Group.3 controllers/Pqmps/reporter_delete

app/Console/cake acl grant Group.3 controllers/Devices/reporter_index
app/Console/cake acl grant Group.3 controllers/Devices/reporter_add
app/Console/cake acl grant Group.3 controllers/Devices/reporter_followup
app/Console/cake acl grant Group.3 controllers/Devices/reporter_edit
app/Console/cake acl grant Group.3 controllers/Devices/reporter_view
app/Console/cake acl grant Group.3 controllers/Devices/reporter_delete

app/Console/cake acl grant Group.3 controllers/Medications/reporter_index
app/Console/cake acl grant Group.3 controllers/Medications/reporter_add
app/Console/cake acl grant Group.3 controllers/Medications/reporter_followup
app/Console/cake acl grant Group.3 controllers/Medications/reporter_edit
app/Console/cake acl grant Group.3 controllers/Medications/reporter_view
app/Console/cake acl grant Group.3 controllers/Medications/reporter_delete

app/Console/cake acl grant Group.3 controllers/Transfusions/reporter_index
app/Console/cake acl grant Group.3 controllers/Transfusions/reporter_add
app/Console/cake acl grant Group.3 controllers/Transfusions/reporter_followup
app/Console/cake acl grant Group.3 controllers/Transfusions/reporter_edit
app/Console/cake acl grant Group.3 controllers/Transfusions/reporter_view
app/Console/cake acl grant Group.3 controllers/Transfusions/reporter_delete

app/Console/cake acl grant Group.3 controllers/SadrFollowups/sadrIndex
app/Console/cake acl grant Group.3 controllers/SadrFollowups/followupIndex

app/Console/cake acl grant Group.3 controllers/Pqmps/pqmpIndex
app/Console/cake acl grant Group.3 controllers/Users/changePassword

app/Console/cake acl grant Group.3 controllers/Notifications/reporter_index
app/Console/cake acl grant Group.3 controllers/Notifications/delete

app/Console/cake acl grant Group.3 controllers/SadrListOfDrugs/delete
app/Console/cake acl grant Group.3 controllers/SadrListOfMedicines/delete

app/Console/cake acl grant Group.3 controllers/AefiListOfVaccines/delete
app/Console/cake acl grant Group.3 controllers/ListOfDevices/delete
app/Console/cake acl grant Group.3 controllers/MedicationProducts/delete
app/Console/cake acl grant Group.3 controllers/Pints/delete
app/Console/cake acl grant Group.3 controllers/Comments
app/Console/cake acl grant Group.3 controllers/Reports
app/Console/cake acl grant Group.3 controllers/AefiDescriptions

# Allow institution administrators to some 
echo "*************** Assign Institution Managers Permissions  *******************"
app/Console/cake acl deny Group.4 controllers
app/Console/cake acl grant Group.4 controllers/Users/partner_dashboard
app/Console/cake acl grant Group.4 controllers/Sadrs/sadrIndex
app/Console/cake acl grant Group.4 controllers/Sadrs/institutionCodes
app/Console/cake acl grant Group.4 controllers/Sadrs/partner_index
app/Console/cake acl grant Group.4 controllers/Sadrs/partner_view
app/Console/cake acl grant Group.4 controllers/Sadrs/institutionCodes
app/Console/cake acl grant Group.4 controllers/Aefis/aefiIndex
app/Console/cake acl grant Group.4 controllers/Aefis/institutionCodes
app/Console/cake acl grant Group.4 controllers/Aefis/partner_index
app/Console/cake acl grant Group.4 controllers/Aefis/partner_view
app/Console/cake acl grant Group.4 controllers/SadrFollowups/sadrIndex
app/Console/cake acl grant Group.4 controllers/SadrFollowups/followupIndex
app/Console/cake acl grant Group.4 controllers/Pqmps/pqmpIndex
app/Console/cake acl grant Group.4 controllers/Pqmps/partner_index
app/Console/cake acl grant Group.4 controllers/Pqmps/partner_view
app/Console/cake acl grant Group.4 controllers/Devices/partner_index
app/Console/cake acl grant Group.4 controllers/Devices/partner_view
app/Console/cake acl grant Group.4 controllers/Medications/partner_index
app/Console/cake acl grant Group.4 controllers/Medications/partner_view
app/Console/cake acl grant Group.4 controllers/Transfusions/partner_index
app/Console/cake acl grant Group.4 controllers/Transfusions/partner_view
app/Console/cake acl grant Group.4 controllers/Users/changePassword
app/Console/cake acl grant Group.4 controllers/Users/edit
app/Console/cake acl grant Group.4 controllers/Users/partner_index
app/Console/cake acl grant Group.4 controllers/Notifications/partner_index
app/Console/cake acl grant Group.4 controllers/Notifications/delete
app/Console/cake acl grant Group.4 controllers/Comments
app/Console/cake acl grant Group.4 controllers/Reports
echo "*************** Completed  *******************"
