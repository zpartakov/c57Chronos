<?php
namespace Concrete\Package\Chronos\Block\Chronos;
use Package;
use View;
use Loader;
use Page;
use Core;
use \Concrete\Core\Block\BlockController;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController {
    protected $btTable = 'chronologies';
    protected $btInterfaceWidth = "600";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "500";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btIgnorePageThemeGridFrameworkContainer = true;

    public $content = "";

    public function getBlockTypeDescription()
    {
        return t("Chronos / dates historiques du jour sur vos pages");
    }

    public function getBlockTypeName()
    {
        return t("Chronos");
    }
    public function mois_texte($mois) {

  	$mois=preg_replace("/12/","décembre",$mois);
  	$mois=preg_replace("/11/","novembre",$mois);
  	$mois=preg_replace("/10/","octobre",$mois);
  	$mois=preg_replace("/09/","septembre",$mois);
  	$mois=preg_replace("/08/","août",$mois);
  	$mois=preg_replace("/07/","juillet",$mois);
  	$mois=preg_replace("/06/","juin",$mois);
  	$mois=preg_replace("/05/","mai",$mois);
  	$mois=preg_replace("/04/","avril",$mois);
  	$mois=preg_replace("/03/","mars",$mois);
  	$mois=preg_replace("/02/","février",$mois);
  	$mois=preg_replace("/01/","janvier",$mois);
  	return $mois;
  	}
  	public function anniversaire() {
  		//$myString = t('<blink>Hello</blink>');
  		//return $myString;
  		//Database::setDebug(true);
echo "<hr>function anniversaire running!<hr>";

      $db = Loader::db();

  		$blocks = array();

  		$aujourdhui=date("m-d");
  		$sql="SELECT * FROM chronologies WHERE date LIKE '%".$aujourdhui."' ORDER BY Rand() LIMIT 0,1";
  		$blocks = $db->Execute($sql);
  		return $blocks;
  	}

    public function view()
    {
  //    $list = \Concrete\Package\Chronos\Block\Chronos\anniversaire();
      //$list = anniversaire();
      //$this->set('content', $list);
        //$this->set('content', $this->content);
    }
/*
    public function add()
    {
        $this->edit();
    }

    public function edit()
    {
        $this->requireAsset('ace');
    }

    public function getSearchableContent()
    {
        return $this->content;
    }

    public function save($data)
    {
        $args['content'] = isset($data['content']) ? $data['content'] : '';
        parent::save($args);
    }

    public static function xml_highlight($s)
    {
        $s = htmlspecialchars($s);
        $s = preg_replace(
            "#&lt;([/]*?)(.*)([\s]*?)&gt;#sU",
            "<font color=\"#0000FF\">&lt;\\1\\2\\3&gt;</font>",
            $s
        );
        $s = preg_replace(
            "#&lt;([\?])(.*)([\?])&gt;#sU",
            "<font color=\"#800000\">&lt;\\1\\2\\3&gt;</font>",
            $s
        );
        $s = preg_replace(
            "#&lt;([^\s\?/=])(.*)([\[\s/]|&gt;)#iU",
            "&lt;<font color=\"#808000\">\\1\\2</font>\\3",
            $s
        );
        $s = preg_replace(
            "#&lt;([/])([^\s]*?)([\s\]]*?)&gt;#iU",
            "&lt;\\1<font color=\"#808000\">\\2</font>\\3&gt;",
            $s
        );
        $s = preg_replace(
            "#([^\s]*?)\=(&quot;|')(.*)(&quot;|')#isU",
            "<font color=\"#800080\">\\1</font>=<font color=\"#FF00FF\">\\2\\3\\4</font>",
            $s
        );
        $s = preg_replace(
            "#&lt;(.*)(\[)(.*)(\])&gt;#isU",
            "&lt;\\1<font color=\"#800080\">\\2\\3\\4</font>&gt;",
            $s
        );

        return nl2br($s);
    }
    */
}








/*
namespace Concrete\Package\Chronos;

class Controller extends \Package {







	public function view(){
	}





}
*/
?>
