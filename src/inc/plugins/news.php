<?php
/**
 * News
 * Adds user-submitted news feed.
 *
 * @package  Shinka\News
 * @category MyBB Plugins
 * @author   Kalyn Robinson <dev@shinkarpg.com>
 * @license  http://unlicense.org/ Unlicense
 * @version  1.0.0
 * @link     https://github.com/ShinkaDev-MyBB/mybb-news
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!defined('IN_MYBB')) {
    die('You Cannot Access This File Directly. Please Make Sure IN_MYBB Is Defined.');
}

// if (defined('IN_ADMINCP')) {
//     require_once MYBB_ROOT . 'inc/plugins/news/install.php';
//     require_once MYBB_ROOT . 'inc/plugins/news/admin.php';
// } else {
//     require_once MYBB_ROOT . 'inc/plugins/news/forum.php';
// }

defined('MYBBSTUFF_CORE_PATH') or define('MYBBSTUFF_CORE_PATH', MYBB_ROOT . 'inc/plugins/MybbStuff/Core');
defined('SHINKA_CORE_PATH') or define('SHINKA_CORE_PATH', MYBB_ROOT . 'inc/plugins/Shinka/Core');
defined('SHINKA_QUERYBUILDER_PATH') or define('SHINKA_QUERYBUILDER_PATH', MYBB_ROOT . 'inc/plugins/Shinka/QueryBuilder');
define('SHINKA_NEWS_PATH', MYBB_ROOT . 'inc/plugins/Shinka/News');

require_once MYBBSTUFF_CORE_PATH . '/ClassLoader.php';

$classLoader = new MybbStuff_Core_ClassLoader();

$classLoader->registerNamespace(
    'Shinka_News',
    array(SHINKA_NEWS_PATH . '/src')
);

$classLoader->registerNamespace(
    'Shinka_Core',
    array(SHINKA_CORE_PATH . '/src')
);

$classLoader->registerNamespace(
    'Shinka_QueryBuilder',
    array(SHINKA_QUERYBUILDER_PATH . '/src')
);

$classLoader->register();

function news_info()
{
    global $lang;

    if (!$lang->news) {
        $lang->load('news');
    }

    return array(
        'name' => $lang->news,
        'description' => $lang->news_description,
        'website' => 'https://github.com/ShinkaDev-MyBB/mybb-news',
        'author' => 'Shinka',
        'authorsite' => 'https://github.com/ShinkaDev-MyBB',
        "codename" => "news",
        'version' => '1.0.0',
        'compatibility' => '18*',
    );
}

/**
 * @return void
 */
function news_install()
{
    global $db;

    Shinka_News_Service_InstallService::handle($db);
}

/**
 * @return boolean
 */
function news_is_installed()
{
    global $db;

    return $db->table_exists('news');
}

/**
 * @return void
 */
function news_uninstall()
{
    global $db;

    Shinka_News_Service_UninstallService::handle($db);
}

function news_activate()
{}

function news_deactivate()
{}
