bin/cake acl_extras aco_sync
bin/cake acl grant Groups.1 controllers
#Manager permissions
#TODO: Align to remove mass assignment of permissions
bin/cake acl grant Groups.2 controllers
bin/cake acl grant Groups.2 controllers/Manager/Sadrs
#end Managers
bin/cake acl grant Groups.4 controllers
bin/cake acl grant Groups.3 controllers/Aefis/index
bin/cake acl grant Groups.3 controllers/Aefis/add
bin/cake acl grant Groups.3 controllers/Aefis/edit
bin/cake acl grant Groups.3 controllers/Aefis/view
bin/cake acl grant Groups.3 controllers/Aefis/followup
bin/cake acl grant Groups.3 controllers/Aefis/delete
bin/cake acl grant Groups.3 controllers/Saefis/index
bin/cake acl grant Groups.3 controllers/Saefis/add
bin/cake acl grant Groups.3 controllers/Saefis/edit
bin/cake acl grant Groups.3 controllers/Saefis/view
bin/cake acl grant Groups.3 controllers/Saefis/delete
bin/cake acl grant Groups.3 controllers/Adrs/index
bin/cake acl grant Groups.3 controllers/Adrs/add
bin/cake acl grant Groups.3 controllers/Adrs/edit
bin/cake acl grant Groups.3 controllers/Adrs/view
bin/cake acl grant Groups.3 controllers/Adrs/delete
bin/cake acl grant Groups.3 controllers/Sadrs/index
bin/cake acl grant Groups.3 controllers/Sadrs/add
bin/cake acl grant Groups.3 controllers/Sadrs/edit
bin/cake acl grant Groups.3 controllers/Sadrs/view
bin/cake acl grant Groups.3 controllers/Sadrs/followup
bin/cake acl grant Groups.3 controllers/Sadrs/delete
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

