<?php

/**
*
* @package phpBB3 Ideas
* @author Callum Macrae (callumacrae) <callum@lynxphp.com>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @ignore
*/
if (!defined('IN_IDEAS'))
{
	exit;
}

/**
 * Returns a link to the users profile, complete with colour.
 *
 * Is there a function that already does this? This seems fairly database heavy.
 *
 * @param int $id The ID of the user.
 * @return string An HTML link to the users profile.
 */
function get_user_link($id)
{
	global $db;
	$sql = 'SELECT username, user_colour
		FROM ' . USERS_TABLE . '
		WHERE user_id = ' . $id;
	$result = $db->sql_query_limit($sql, 1);
	$author = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	return get_username_string('full', $id, $author['username'], $author['user_colour']);
}
