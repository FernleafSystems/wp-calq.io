<?php
$sBaseDirName = dirname(__FILE__).ICWP_DS;
include_once( $sBaseDirName.'icwp_options_helper.php' );
include_once( $sBaseDirName.'widgets'.ICWP_DS.'icwp_widgets.php' );

$sPluginName = _calqio__( 'Calq.io For WordPress' );
$sOn = _calqio__( 'On' );
$sOff = _calqio__( 'Off' );
?>

<div class="wrap">
	<div class="bootstrap-wpadmin <?php echo isset($icwp_sFeatureSlug) ? $icwp_sFeatureSlug : ''; ?>">
		<div class="row">
			<div class="span12">
				<?php include_once( $sBaseDirName . 'snippets' . ICWP_DS . 'state_summary.php' ); ?>
			</div>
		</div>
<?php
printOptionsPageHeader( $icwp_sFeatureName );
