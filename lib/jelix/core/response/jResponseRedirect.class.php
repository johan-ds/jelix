<?php
/**
* @package     jelix
* @subpackage  core
* @author      Laurent Jouanneau
* @contributor
* @copyright   2005-2006 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/

/**
* Response To redirect to an action
* @package  jelix
* @subpackage core
* @see jResponse
*/

final class jResponseRedirect extends jResponse {
    /**
    * @var string
    */
    protected $_type = 'redirect';

    /**
     * selector of the action where you want to redirect.
     * jUrl will be used to get the real url
     * @var string
     */
    public $action = '';

    /**
     * parameters for the action/url
     */
    public $params = array();

    public function output(){
       if($this->hasErrors()) return false;

        header ('location: '.jUrl::get($this->action, $this->params));
        return true;
    }

    public function outputErrors(){
         include_once(JELIX_LIB_RESPONSE_PATH.'jResponseHtml.class.php');
         $resp = new jResponseHtml();
         $resp->outputErrors();
    }

}

?>