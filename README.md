To setup, just
1) add EightdChoiceListBugBundle to you AppKernel
2) add this to you routing.yml:
eightd_choice_list_bug:
    resource: "@EightdChoiceListBugBundle/Resources/config/routing.yml"
    prefix:   /ChoiceListBug
    
You can now access the bug demo at /ChoiceListBug/
