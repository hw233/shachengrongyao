@set root=%cd%
cd C:\php-5.5.30

# guide_step.xml
php C:\tool\mconfig\config_script.php guide_step
@echo "creat complete"
copy C:\tool\tag\config\guide_stepConfig.lua C:\

# guide_operate.xml
php C:\tool\mconfig\config_script.php guide_operate
@echo "creat complete"
copy C:\tool\tag\config\guide_operateConfig.lua C:\

# guide_body_click_type.xml
php C:\tool\mconfig\config_script.php guide_body_click_type
@echo "creat complete"
copy C:\tool\tag\config\guide_body_click_typeConfig.lua C:\

# guide_target_abs_of_click.xml
php C:\tool\mconfig\config_script.php guide_target_abs_of_click
@echo "creat complete"
copy C:\tool\tag\config\guide_target_abs_of_clickConfig.lua C:\

# guide_target_auto_of_click.xml
php C:\tool\mconfig\config_script.php guide_target_auto_of_click
@echo "creat complete"
copy C:\tool\tag\config\guide_target_auto_of_clickConfig.lua C:\

# guide_trigger.xml
php C:\tool\mconfig\config_script.php guide_trigger
@echo "creat complete"
copy C:\tool\tag\config\guide_triggerConfig.lua C:\

# guide_body_slide_type.xml
php C:\tool\mconfig\config_script.php guide_body_slide_type
@echo "creat complete"
copy C:\tool\tag\config\guide_body_slide_typeConfig.lua C:\

pause