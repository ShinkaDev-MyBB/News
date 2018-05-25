<?php

class Shinka_News_Service_UninstallService
{
    public static function handle(DB_Base $db)
    {

        require_once MYBB_ROOT . "inc/adminfunctions_templates.php";

        $tables = array("news");
        $setting_groups = array("newsgroup");
        $prefix = "news";
        $stylesheets = Shinka_Core_Entity_Stylesheet::fromDirectory(MYBB_ROOT . "inc/plugins/Shinka/News/resources/themestylesheets");

        Shinka_Core_Manager_TableManager::drop($db, $tables);
        $gid = Shinka_Core_Manager_SettingGroupManager::destroy($db, $setting_groups);
        Shinka_Core_Manager_SettingManager::destroy($db, $prefix);
        Shinka_Core_Manager_TemplateGroupManager::destroy($db, $prefix);
        Shinka_Core_Manager_StylesheetManager::destroy($db, $stylesheets);

        find_replace_templatesets(
            "index",
            "#" . preg_quote('{$latest_news}') . "#i",
            ""
        );

        rebuild_settings();
    }
}
