@set root=%cd%
cd C:\php-5.5.30

# arena_reward.xml
php C:\tool\mconfig\config_script.php arena_reward
@echo "creat complete"
copy C:\tool\tag\config\arena_rewardConfig.lua C:\

# arena_shop.xml
php C:\tool\mconfig\config_script.php arena_shop
@echo "creat complete"
copy C:\tool\tag\config\arena_shopConfig.lua C:\

# city_officer.xml
php C:\tool\mconfig\config_script.php city_officer
@echo "creat complete"
copy C:\tool\tag\config\city_officerConfig.lua C:\

# random_first_name.xml
php C:\tool\mconfig\config_script.php random_first_name
@echo "creat complete"
copy C:\tool\tag\config\random_first_nameConfig.lua C:\

# random_last_name.xml
php C:\tool\mconfig\config_script.php random_last_name
@echo "creat complete"
copy C:\tool\tag\config\random_last_nameConfig.lua C:\

# transfer.xml
php C:\tool\mconfig\config_script.php transfer
@echo "creat complete"
copy C:\tool\tag\config\transferConfig.lua C:\

# monster_area.xml
php C:\tool\mconfig\config_script.php monster_area
@echo "creat complete"
copy C:\tool\tag\config\monster_areaConfig.lua C:\

# notice.xml
php C:\tool\mconfig\config_script.php notice
@echo "creat complete"
copy C:\tool\tag\config\noticeConfig.lua C:\

# npc.xml
php C:\tool\mconfig\config_script.php npc
@echo "creat complete"
copy C:\tool\tag\config\npcConfig.lua C:\

# task.xml
php C:\tool\mconfig\config_script.php task
@echo "creat complete"
copy C:\tool\tag\config\taskConfig.lua C:\

# scene.xml
php C:\tool\mconfig\config_script.php scene
@echo "creat complete"
copy C:\tool\tag\config\sceneConfig.lua C:\

# guild_activity.xml
php C:\tool\mconfig\config_script.php guild_activity
@echo "creat complete"
copy C:\tool\tag\config\guild_activityConfig.lua C:\

# guild_activity_boss.xml
php C:\tool\mconfig\config_script.php guild_activity_boss
@echo "creat complete"
copy C:\tool\tag\config\guild_activity_bossConfig.lua C:\

# activity_list.xml
php C:\tool\mconfig\config_script.php activity_list
@echo "creat complete"
copy C:\tool\tag\config\activity_listConfig.lua C:\

# function.xml
php C:\tool\mconfig\config_script.php function
@echo "creat complete"
copy C:\tool\tag\config\functionConfig.lua C:\

# top_navigation_menu.xml
php C:\tool\mconfig\config_script.php top_navigation_menu
@echo "creat complete"
copy C:\tool\tag\config\top_navigation_menuConfig.lua C:\

# active_reward.xml
php C:\tool\mconfig\config_script.php active_reward
@echo "creat complete"
copy C:\tool\tag\config\active_rewardConfig.lua C:\

# welfare_type.xml
php C:\tool\mconfig\config_script.php welfare_type
@echo "creat complete"
copy C:\tool\tag\config\welfare_typeConfig.lua C:\

# word_map.xml
php C:\tool\mconfig\config_script.php word_map
@echo "creat complete"
copy C:\tool\tag\config\word_mapConfig.lua C:\

# strategy.xml
php C:\tool\mconfig\config_script.php strategy
@echo "creat complete"
copy C:\tool\tag\config\strategyConfig.lua C:\

# strategy_chapter.xml
php C:\tool\mconfig\config_script.php strategy_chapter
@echo "creat complete"
copy C:\tool\tag\config\strategy_chapterConfig.lua C:\

pause