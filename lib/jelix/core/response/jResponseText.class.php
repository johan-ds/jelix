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
* plain Text response
* @package  jelix
* @subpackage core
*/
class jResponseText extends jResponse {
    /**
    * @var string
    */
    protected $_type = 'text';

    /**
     * text content
     * @var string
     */
    public $content = '';

    /**
     * output the content with the text/plain mime type
     * @return boolean    true si it's ok
     */
    public function output(){
        global $gJConfig;
        $this->_httpHeaders['Content-Type']='text/plain;charset='.$gJConfig->defaultCharset;
        $this->_httpHeaders['Content-length']=strlen($this->content);
        $this->sendHttpHeaders();
        echo $this->content;
        return true;
    }

    public function outputErrors(){
        global $gJConfig;
        header('Content-Type: text/plain;charset='.$gJConfig->defaultCharset);
        if($this->hasErrors()){
            foreach( $GLOBALS['gJCoord']->errorMessages  as $e){
               echo '['.$e[0].' '.$e[1].'] '.$e[2]." \t".$e[3]." \t".$e[4]."\n";
            }
        }else{
            echo "[unknow error]\n";
        }
    }
}
?>