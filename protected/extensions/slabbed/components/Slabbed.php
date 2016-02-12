<?php
/**
 * Bootstrap class file
 * @author Enrique Salazar <esalazarmigueles@yahoo.com>
 * @licence http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

class Slabbed extends CApplicationComponent
{
    public $coreCss = true;
    public $enableJS = true;

    protected $_assetsUrl;

    public function init( )
    {
        if( !Yii::getPathOfAlias( 'slabbed' ) )
            Yii::setPathOfAlias( 'slabbed', realpath( dirname( __FILE__ ).'/..' ) );

        if( $this->coreCss ) {
            $this->registerCss( );
        }

        if( $this->enableJS ) {
            $this->registerJs( );
        }
    }

    public function registerCss( ) {
	    Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/slabbed.css' );
//        Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/slabbed-bootstrap.css' );
    }

    public function registerJs( ) {
        Yii::app( )->clientScript->registerCoreScript( 'jquery' );
	    $this->registerScriptFile( 'slabbed.min.js' );
    }

    public function registerScriptFile( $fileName, $position = CClientScript::POS_END ) {
        Yii::app( )->clientScript->registerScriptFile( $this->getAssetsUrl( ).'/js/'.$fileName, $position );
    }

    public function registerCssFile( $fileName, $position = CClientScript::POS_END ) {
        Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/'.$fileName );
    }

    protected function getAssetsUrl( ) {
        if( $this->_assetsUrl == null ) {
            $assetsPath = Yii::getPathOfAlias( 'slabbed.lib.slabbed-menu' );
            $this->_assetsUrl = Yii::app( )->assetManager->publish( $assetsPath, false, -1, YII_DEBUG );
        }
        return $this->_assetsUrl;
    }
}
