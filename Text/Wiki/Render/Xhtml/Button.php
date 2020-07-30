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
 * Button.
 *
 * @category   Text
 * @package    Text_Wiki
 * @author     Michal Frackowiak
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Text_Wiki
 */
class Text_Wiki_Render_Xhtml_Button extends Text_Wiki_Render {

    public $conf = array();

	function token($options){

    	$type = $options['type'];
    	$text = $options['text'];
    	$style = $options['style'];
    	$class = $options['class'];

    	$allowedTypes = array(
    		'edit',
    		'edit-append',
    		'edit-sections',
    		'history',
    		'print',
    		'files',
    		'tags',
    		'source',
    		'talk',
    		'backlinks'

    	);

    	$defaultText = array(
    		'edit' => _('edit'),
    		'edit-append' => _('append'),
    		'edit-sections' => _('edit sections'),
    		'history' => _('history'),
    		'print' => _('print'),
    		'files' => _('files'),
    		'tags' => _('tags'),
    		'source' => _('view source'),
    		'talk' => _('talk'),
    		'backlinks' => _('backlinks')

    	);

    	$jsOnclick = array(
    		'edit' => 'Wikijump.page.listeners.editClick(event)',
    		'edit-append' => 'Wikijump.page.listeners.append(event)',
    		'edit-sections' => 'Wikijump.page.listeners.toggleEditSections(event)',
    		'history' => ' Wikijump.page.listeners.historyClick(event)',
    		'print' => 'Wikijump.page.listeners.printClick(event)',
    		'files' => 'Wikijump.page.listeners.filesClick(event)',
    		'tags' => 'Wikijump.page.listeners.editTags(event)',
    		'source' => 'Wikijump.page.listeners.viewSourceClick(event)',
    		'talk' => "window.location.href='/talk:'+WIKIREQUEST.info.pageUnixName",
    		'backlinks' => 'Wikijump.page.listeners.backlinksClick(event)'

    	);

    	//$jsOnload = array(
    	//	'talk' => "this.href='/talk:'+WIKIREQUEST.info.pageUnixName; alert(this.href);"

    	$hrefs = array();

    	if(!in_array($type, $allowedTypes)){
    		return '<div class="error-block">'._('The button type is not recognized').'</div>';
    	}

    	// ok, fine

    	if(!$class){
    		$class = "wiki-standalone-button";
    	}

    	if(!$text){
    		$text = $defaultText[$type];
    	}

    	$out = '<a class="'.htmlspecialchars($class).'" ';
    	if($style){
    		$out .= 'style="'.htmlspecialchars($style).'" ';
    	}
    	$out .= 'href="'.($hrefs[$type]?$hrefs[$type]:'javascript:;').'" ';
    	$out .= ($jsOnclick[$type]?'onclick="'.$jsOnclick[$type].'" ':' ');

    	$out .= '>';
    	$out .= htmlspecialchars($text);
    	$out .= '</a>';

    	return $out;

    }
}
