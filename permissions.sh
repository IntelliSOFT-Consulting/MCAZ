echo "Assiging permissions to users..."
bin/cake acl_extras aco_sync
bin/cake cache clear_all
echo "*************** Assign Admin Permissions  *******************"
#Admin permissions
bin/cake acl grant Groups.1 controllers
bin/cake acl grant Groups.1 controllers/Admin
bin/cake acl deny Groups.1 controllers/Manager
bin/cake acl deny Groups.1 controllers/Evaluator
bin/cake acl deny  Groups.1 controllers/Sadrs
bin/cake acl deny  Groups.1 controllers/Aefis
bin/cake acl deny  Groups.1 controllers/Saefis
bin/cake acl deny  Groups.1 controllers/Adrs
bin/cake acl grant Groups.1 controllers/Ce2bs
bin/cake acl grant Groups.1 controllers/CommitteeDates 
echo "*************** Assign Manager Permissions ********************"
#Manager permissions
#TODO: Align to remove mass assignment of permissions
bin/cake acl deny Groups.2 controllers
bin/cake acl grant Groups.2 controllers/Reports
bin/cake acl grant Groups.2 controllers/Manager
bin/cake acl grant  Groups.2 controllers/Sadrs
bin/cake acl grant  Groups.2 controllers/Aefis
bin/cake acl grant  Groups.2 controllers/Saefis
bin/cake acl grant  Groups.2 controllers/Adrs
bin/cake acl grant Groups.2 controllers/Ce2bs
bin/cake acl grant Groups.2 controllers/Notifications/delete
bin/cake acl grant Groups.2 controllers/Notifications/adelete
bin/cake acl grant Groups.2 controllers/Users/profile
bin/cake acl grant Groups.2 controllers/Users/edit
bin/cake acl grant Groups.2 controllers/Users/dashboard
bin/cake acl grant Groups.2 controllers/CommitteeDates
bin/cake acl grant Groups.2 controllers/AefiListOfVaccines/delete
bin/cake acl grant Groups.2 controllers/SaefiListOfVaccines/delete
bin/cake acl grant Groups.2 controllers/AefiListOfDiluents/delete
bin/cake acl grant Groups.2 controllers/AdrListOfDrugs/delete
bin/cake acl grant Groups.2 controllers/AdrOtherDrugs/delete
bin/cake acl grant Groups.2 controllers/Reactions/delete
bin/cake acl grant Groups.2 controllers/SadrListOfDrugs/delete
bin/cake acl grant Groups.2 controllers/SadrOtherDrugs/delete
bin/cake acl grant Groups.2 controllers/Notifications/index
bin/cake acl grant Groups.2 controllers/Notifications/view
echo "*************** Assign Institution Manager Permissions ********************"
#Institution Manager permissions
bin/cake acl deny Groups.5 controllers
bin/cake acl grant Groups.5 controllers/Institution
bin/cake acl grant Groups.5 controllers/AefiListOfVaccines/delete
bin/cake acl grant Groups.5 controllers/SaefiListOfVaccines/delete
bin/cake acl grant Groups.5 controllers/AefiListOfDiluents/delete
bin/cake acl grant Groups.5 controllers/AdrListOfDrugs/delete
bin/cake acl grant Groups.5 controllers/AdrOtherDrugs/delete
bin/cake acl grant Groups.5 controllers/Users/profile
bin/cake acl grant Groups.5 controllers/Users/edit
bin/cake acl grant Groups.5 controllers/Users/dashboard
bin/cake acl deny Groups.5 controllers/Users/home
bin/cake acl grant Groups.5 controllers/Reactions/delete
bin/cake acl grant Groups.5 controllers/SadrListOfDrugs/delete
bin/cake acl grant Groups.5 controllers/SadrOtherDrugs/delete
bin/cake acl grant Groups.5 controllers/Notifications/delete
bin/cake acl grant Groups.5 controllers/Notifications/adelete
bin/cake acl grant Groups.5 controllers/Notifications/index
bin/cake acl grant Groups.5 controllers/Notifications/view
bin/cake acl grant Groups.5 controllers/Comments
echo "*************** Assign Evaluator Permissions *******************"
bin/cake acl deny Groups.4 controllers
bin/cake acl grant Groups.4 controllers/Reports
bin/cake acl grant Groups.4 controllers/Evaluator
bin/cake acl grant  Groups.4 controllers/Sadrs
bin/cake acl grant  Groups.4 controllers/Aefis
bin/cake acl grant  Groups.4 controllers/Saefis
bin/cake acl grant  Groups.4 controllers/Adrs
bin/cake acl grant Groups.4 controllers/Ce2bs
bin/cake acl grant Groups.4 controllers/Notifications/delete
bin/cake acl grant Groups.4 controllers/Notifications/adelete
bin/cake acl grant Groups.4 controllers/Users/profile
bin/cake acl grant Groups.4 controllers/Users/edit
bin/cake acl grant Groups.4 controllers/Users/dashboard
bin/cake acl grant Groups.4 controllers/CommitteeDates
bin/cake acl grant Groups.4 controllers/AefiListOfVaccines/delete
bin/cake acl grant Groups.4 controllers/SaefiListOfVaccines/delete
bin/cake acl grant Groups.4 controllers/AefiListOfDiluents/delete
bin/cake acl grant Groups.4 controllers/AdrListOfDrugs/delete
bin/cake acl grant Groups.4 controllers/AdrOtherDrugs/delete
bin/cake acl grant Groups.4 controllers/Reactions/delete
bin/cake acl grant Groups.4 controllers/SadrListOfDrugs/delete
bin/cake acl grant Groups.4 controllers/SadrOtherDrugs/delete
bin/cake acl grant Groups.4 controllers/Notifications/index
bin/cake acl grant Groups.4 controllers/Notifications/view
#end Managers
echo "*************** Assign Users Permissions ***********************"
bin/cake acl grant Groups.3 controllers/Aefis
bin/cake acl grant Groups.3 controllers/Saefis
bin/cake acl grant Groups.3 controllers/Adrs
bin/cake acl grant Groups.3 controllers/Sadrs
bin/cake acl grant Groups.3 controllers/Ce2bs
bin/cake acl grant Groups.3 controllers/AefiListOfVaccines/delete
bin/cake acl grant Groups.3 controllers/SaefiListOfVaccines/delete
bin/cake acl grant Groups.3 controllers/AefiListOfDiluents/delete
bin/cake acl grant Groups.3 controllers/AdrListOfDrugs/delete
bin/cake acl grant Groups.3 controllers/AdrOtherDrugs/delete
bin/cake acl grant Groups.3 controllers/Users/profile
bin/cake acl grant Groups.3 controllers/Users/edit
bin/cake acl grant Groups.3 controllers/Users/dashboard
bin/cake acl grant Groups.3 controllers/Users/home
bin/cake acl grant Groups.3 controllers/Reactions/delete
bin/cake acl grant Groups.3 controllers/SadrListOfDrugs/delete
bin/cake acl grant Groups.3 controllers/SadrOtherDrugs/delete
bin/cake acl grant Groups.3 controllers/Notifications/delete
bin/cake acl grant Groups.3 controllers/Notifications/adelete
bin/cake acl grant Groups.3 controllers/Notifications/index
bin/cake acl grant Groups.3 controllers/Notifications/view
bin/cake acl grant Groups.3 controllers/Comments

echo "*************** Assign Technical Users *******************"
# bin/cake acl deny Groups.6 controllers
# bin/cake acl grant Groups.6 controllers/Technical
# bin/cake acl grant Groups.6 controllers/Reports
# bin/cake acl grant Groups.6 controllers/Users/profile
# bin/cake acl grant Groups.6 controllers/Users/edit
# bin/cake acl grant Groups.6 controllers/Users/dashboard
# bin/cake acl grant Groups.6 controllers/Users/home

# sudo chmod -R 777 .
