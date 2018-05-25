<?php

class Shinka_Core_Manager_SettingManager extends Shinka_Core_Manager_Manager
{
    private static $table = "settings";

    /**
     * @param DB_Base $db
     * @param Shinka_Core_Entity_Setting|Shinka_Core_Entity_Setting[] $settings
     * @param int $gid
     * @return void
     */
    public static function create(DB_Base $db, $settings, int $gid)
    {
        foreach ((array) $settings as $ndx => $setting) {
            $setting->gid = $setting->gid ?: $gid;
            $setting->disporder = $setting->disporder ?: $ndx;

            $db->insert_query(self::$table, $setting->toArray());
        }
    }

    /**
     * @param DB_Base $db
     * @param string|string[] $prefixes
     */
    public function destroy(DB_Base $db, $prefixes)
    {
        foreach ((array) $prefixes as $prefix) {
            $db->delete_query(self::$table, "`name` LIKE '{$prefix}_%'");
        }
    }
}
