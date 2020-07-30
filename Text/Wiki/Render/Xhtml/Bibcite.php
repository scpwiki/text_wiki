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
 * Bibliography citation.
 *
 * @category   Text
 * @package    Text_Wiki
 * @author     Michal Frackowiak
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Text_Wiki
 */
class Text_Wiki_Render_Xhtml_Bibcite extends Text_Wiki_Render {

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

    function token($options) {
        $label = $options['label'];
        $id = $this->wiki->vars['bibitemIds'][$label];
        $idPrefix = $this->wiki->getRenderConf('xhtml', 'bibitem', 'id_prefix');
        if ($id === null) {
            return '<span class="error-inline">Bibliography item <em>' . $label . '</em> not found.</span>';
        }
        $out = '<a href="javascript:;" class="bibcite" id="bibcite-' . $id . '"' . ' onclick="Wikijump.page.utils.scrollToReference(\'bibitem-' . $idPrefix . $id . '\')">' . $id . '</a>';
        return $out;
    }
}
