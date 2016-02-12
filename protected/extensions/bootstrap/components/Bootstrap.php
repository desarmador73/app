<?php
/**
 * Bootstrap class file
 * @author Enrique Salazar <esalazarmigueles@yahoo.com>
 * @licence http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

class Bootstrap extends CApplicationComponent
{
    public $coreCss = true;
    public $enableJS = true;

    protected $_assetsUrl;

    public function init( )
    {
        if( !Yii::getPathOfAlias( 'bootstrap' ) )
            Yii::setPathOfAlias( 'bootstrap', realpath( dirname( __FILE__ ).'/..' ) );

        if( $this->coreCss ) {
            $this->registerCss( );
        }

        if( $this->enableJS ) {
            $this->registerJs( );
        }
    }

    public function registerCss( ) {
	    Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/bootstrap.min.css' );
        Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/bootstrap-theme.min.css' );
        Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/docs.min.css' );
        Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/ie10-viewport-bug-workaround.css' );
    }

    public function registerJs( ) {
        Yii::app( )->clientScript->registerCoreScript( 'jquery' );
	    $this->registerScriptFile( 'bootstrap.min.js' );
    }

    public function registerScriptFile( $fileName, $position = CClientScript::POS_END ) {
        Yii::app( )->clientScript->registerScriptFile( $this->getAssetsUrl( ).'/js/'.$fileName, $position );
    }

    public function registerCssFile( $fileName, $position = CClientScript::POS_END ) {
        Yii::app( )->clientScript->registerCssFile( $this->getAssetsUrl( ).'/css/'.$fileName );
    }

    protected function getAssetsUrl( ) {
        if( $this->_assetsUrl == null ) {
            $assetsPath = Yii::getPathOfAlias( 'bootstrap.lib.bootstrap-336' );
            $this->_assetsUrl = Yii::app( )->assetManager->publish( $assetsPath, false, -1, YII_DEBUG );
        }
        return $this->_assetsUrl;
    }
}
