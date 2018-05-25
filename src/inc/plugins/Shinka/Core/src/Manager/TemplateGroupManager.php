<?php

class Shinka_Core_Manager_TemplateGroupManager extends Shinka_Core_Manager_Manager
{
    private static $table = "templategroups";

    /**
     * @param DB_Base $db
     * @param Shinka_Core_Entity_TemplateGroup|Shinka_Core_Entity_TemplateGroup[] $template_group
     * @return void
     */
    public static function create(DB_Base $db, $template_groups)
    {
        foreach (self::toArray($template_groups) as $group) {
            $db->insert_query(self::$table, $group->toArray());

            Shinka_Core_Manager_TemplateManager::create($db, $group->asset_dir);
        }
    }

    /**
     * @param DB_Base $db
     * @param string|string[]|Shinka_Core_Entity_TemplateGroup|Shinka_Core_Entity_TemplateGroup[] $prefixes
     */
    public function destroy(DB_Base $db, $template_groups)
    {
        foreach (self::toArray($template_groups) as $template_group) {
            $prefix = $template_group instanceof Shinka_Core_Entity_TemplateGroup ? $template_group->prefix : $template_group;
            $db->delete_query(self::$table, "`prefix` = '$prefix'");

            Shinka_Core_Manager_TemplateManager::destroy($db, $prefix);
        }
    }
}
