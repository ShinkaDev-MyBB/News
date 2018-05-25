<?php

class Shinka_Core_Manager_TableManager extends Shinka_Core_Manager_Manager
{
    /**
     * @param DB_Base
     * @param Shinka_Core_Entity_Table|Shinka_Core_Entity_Table[] $tables
     */
    public static function create(DB_Base $db, $tables)
    {
        foreach (self::toArray($tables) as $table) {
            if ($db->table_exists($table->name)) {
                return;
            }

            $definition_strs = implode(', ', $table->definitions);
            $db->write_query(
                'CREATE TABLE ' . TABLE_PREFIX . $table->name .
                "($definition_strs)"
            );
        }
    }

    /**
     * @param DB_Base
     * @param Shinka_Core_Entity_Table|Shinka_Core_Entity_Table[]|string|string[] $table
     */
    public static function drop(DB_Base $db, $tables)
    {
        foreach ((array) $tables as $table) {
            $name = $table instanceof Shinka_Core_Entity_Table ? $table->name : $table;
            $db->drop_table($name);
        }
    }
}
