<?php

/**
 * @category   Text
 * @package    Text_Wiki
 * @author     Michal Frackowiak
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    $Id$
 * @link       http://pear.php.net/package/Text_Wiki
 */

/**
 * Equation reference.
 *
 * @category   Text
 * @package    Text_Wiki
 * @author     Michal Frackowiak
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Text_Wiki
 */
class Text_Wiki_Render_Xhtml_Equationreference extends Text_Wiki_Render
{

    public $conf = array();

    /**
     *
     * Renders a token into text matching the requested format.
     *
     * @access public
     *
     * @param array $options The "options" portion of the token (second
     * element).
     *
     * @return string The text rendered from the token options.
     *
     */

    function token($options)
    {
        $label = $options['label'];
        $refs = Text_Wiki_Parse_Math::$equationsArray;
        $id = $refs[$label];
        $idPrefix = $this->wiki->getRenderConf('xhtml', 'math', 'id_prefix');
        $out = '<a class="eref" href="javascript:;" onclick="WIKIDOT.page.utils.scrollToReference(\'equation-' . $idPrefix . $id . '\')">' . $id . '</a>';

        return $out;
    }
}
