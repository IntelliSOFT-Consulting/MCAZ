echo "Assiging permissions to users..."
bin/cake acl_extras aco_sync
bin/cake cache clear_all
echo "*************** Assign Admin Permissions  *******************"
#Admin permissions
bin/cake acl grant Groups.1 controllers
bin/cake acl grant Groups.2 controllers/Admin
bin/cake acl deny Groups.1 controllers/Manager
bin/cake acl deny Groups.1 controllers/Evaluator
bin/cake acl deny  Groups.1 controllers/Sadrs
bin/cake acl deny  Groups.1 controllers/Aefis
bin/cake acl deny  Groups.1 controllers/Saefis
bin/cake acl deny  Groups.1 controllers/Adrs
echo "*************** Assign Manager Permissions *8******************"
#Manager permissions
#TODO: Align to remove mass assignment of permissions
bin/cake acl deny Groups.2 controllers
bin/cake acl grant Groups.2 controllers/Reports
bin/cake acl grant Groups.2 controllers/Manager
bin/cake acl deny  Groups.2 controllers/Sadrs
bin/cake acl deny  Groups.2 controllers/Aefis
bin/cake acl deny  Groups.2 controllers/Saefis
bin/cake acl deny  Groups.2 controllers/Adrs
echo "*************** Assign Evaluator Permissions *******************"
bin/cake acl deny Groups.4 controllers
bin/cake acl grant Groups.4 controllers/Reports
bin/cake acl grant Groups.4 controllers/Evaluator
bin/cake acl deny  Groups.4 controllers/Sadrs
bin/cake acl deny  Groups.4 controllers/Aefis
bin/cake acl deny  Groups.4 controllers/Saefis
bin/cake acl deny  Groups.4 controllers/Adrs
echo "*************** Assign Users Permissions ***********************"
#end Managers
bin/cake acl grant Groups.3 controllers/Aefis
bin/cake acl grant Groups.3 controllers/Saefis
bin/cake acl grant Groups.3 controllers/Adrs
bin/cake acl grant Groups.3 controllers/Sadrs
bin/cake acl grant Groups.3 controllers/AefiListOfVaccines/delete
bin/cake acl grant Groups.3 controllers/SaefiListOfVaccines/delete
bin/cake acl grant Groups.3 controllers/AefiListOfDiluents/delete
bin/cake acl grant Groups.3 controllers/AdrListOfDrugs/delete
bin/cake acl grant Groups.3 controllers/AdrOtherDrugs/delete
bin/cake acl grant Groups.3 controllers/Users/profile
bin/cake acl grant Groups.3 controllers/Users/edit
bin/cake acl grant Groups.3 controllers/Users/dashboard
bin/cake acl grant Groups.3 controllers/Users/home
bin/cake acl grant Groups.3 controllers/SadrListOfDrugs/delete
bin/cake acl grant Groups.3 controllers/SadrOtherDrugs/delete
bin/cake acl grant Groups.3 controllers/Notifications/delete
bin/cake acl grant Groups.3 controllers/Notifications/adelete
bin/cake acl grant Groups.3 controllers/Notifications/index
bin/cake acl grant Groups.3 controllers/Notifications/view

sudo chmod -R 777 .
