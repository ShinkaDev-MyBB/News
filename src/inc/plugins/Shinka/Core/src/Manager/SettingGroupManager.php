<?php

class Shinka_Core_Manager_SettingGroupManager extends Shinka_Core_Manager_Manager
{
    private static $table = "settinggroups";

    /**
     * @param DB_Base $db
     * @param Shinka_Core_Entity_SettingGroup $setting_group
     * @return int GID of created setting group
     */
    public static function create(DB_Base $db, $setting_group)
    {
        return $db->insert_query(self::$table, $setting_group->toArray());
    }

    /**
     * @param DB_Base $db
     * @param string|string[]|Shinka_Core_Entity_SettingGroup|Shinka_Core_Entity_SettingGroup[] $setting_groups
     */
    public function destroy(DB_Base $db, $setting_groups)
    {
        foreach (self::toArray($setting_groups) as $group) {
            $name = $group instanceof Shinka_Core_Entity_SettingGroup ? $group->name : $group;
            $db->delete_query(self::$table, "`name` = '$name'");
        }
    }
}
