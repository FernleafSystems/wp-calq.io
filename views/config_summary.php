<h2><?php _calqio_e( 'Plugin Configuration Summary'); ?></h2>
<div class="span6" id="tbs_docs_shortcodes">
	<div class="well">
		<h4 style="margin-top:20px;">
			<?php printf( _calqio__('Firewall is %s'), $fFirewallOn ? $sOn : $sOff ); ?>
			[ <a href="admin.php?page=icwp-calqio-firewall"><?php _calqio_e('Configure Now'); ?></a> ]</h4>
		<?php if ( $fFirewallOn ) : ?>
			<ul>
				<li><?php printf( _calqio__('Firewall logging is %s'), ($icwp_aFirewallOptions['enable_firewall_log'] == 'Y') ? $sOn : $sOff ); ?></li>
				<li><?php _calqio_e( 'When the firewall blocks a visit, it will:'); ?>
					<?php
					if( $icwp_aFirewallOptions['block_response'] == 'redirect_die' ) {
						_calqio_e( 'Die' );
					}
					else if ( $icwp_aFirewallOptions['block_response'] == 'redirect_die_message' ) {
						_calqio_e( 'Die with a message' );
					}
					else if ( $icwp_aFirewallOptions['block_response'] == 'redirect_home' ) {
						_calqio_e( 'Redirect to home page' );
					}
					else if ( $icwp_aFirewallOptions['block_response'] == 'redirect_404' ) {
						_calqio_e( 'Redirect to 404 page' );
					}
					else {
						_calqio_e( 'Unknown' );
					}
					?>
				</li>
				<?php if ( isset($icwp_aFirewallOptions['ips_whitelist']['ips']) ) : ?>
					<li>
						<?php printf( _calqio__('You have %s whitelisted IP addresses'), count( $icwp_aFirewallOptions['ips_whitelist']['ips'] ) ); ?>
						<?php foreach( $icwp_aFirewallOptions['ips_whitelist']['ips'] as $sIp ) : ?>
							<br />
							<?php printf( _calqio__('%s labelled as %s'), long2ip($sIp), $icwp_aFirewallOptions['ips_whitelist']['meta'][md5( $sIp )] ); ?>
						<?php endforeach; ?>
					</li>
				<?php endif; ?>

				<?php if ( isset($icwp_aFirewallOptions['ips_blacklist']['ips']) ) : ?>
					<li>
						<?php printf( _calqio__('You have %s blacklisted IP addresses'), count( $icwp_aFirewallOptions['ips_blacklist']['ips'] ) ); ?>
						<?php foreach( $icwp_aFirewallOptions['ips_blacklist']['ips'] as $sIp ) : ?>
							<br />
							<?php printf( _calqio__('%s labelled as %s'), long2ip($sIp), $icwp_aFirewallOptions['ips_blacklist']['meta'][md5( $sIp )] ); ?>
						<?php endforeach; ?>
					</li>
				<?php endif; ?>

				<li><?php printf( _calqio__('Firewall blocks Directory Traversals: %s'), ($icwp_aFirewallOptions['block_dir_traversal'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall blocks SQL Queries: %s'), ($icwp_aFirewallOptions['block_sql_queries'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall blocks WordPress Specific Terms: %s'), ($icwp_aFirewallOptions['block_wordpress_terms'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall blocks Field Truncation Attacks: %s'), ($icwp_aFirewallOptions['block_field_truncation'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall blocks Directory Traversals: %s'), ($icwp_aFirewallOptions['block_dir_traversal'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall blocks Executable File Uploads: %s'), ($icwp_aFirewallOptions['block_exe_file_uploads'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall blocks Leading Schemas (HTTPS / HTTP): %s'), ($icwp_aFirewallOptions['block_leading_schema'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Firewall Logging is %s'), ($icwp_aFirewallOptions['enable_firewall_log'] == 'Y')? $sOn : $sOff ); ?></li>
			</ul>
		<?php endif; ?>
		<hr/>
		<h4 style="margin-top:20px;">
			<?php printf( _calqio__('Login Protection is %s'), $fLoginProtectOn ? $sOn : $sOff ); ?>
			[ <a href="admin.php?page=icwp-calqio-login_protect"><?php _calqio_e('Configure Now'); ?></a> ]</h4>
		<?php if ( $fLoginProtectOn ) : ?>
			<ul>
				<?php if ( isset($icwp_aLoginProtectOptions['ips_whitelist']['ips']) ) : ?>
					<li>
						<?php printf( _calqio__('You have %s whitelisted IP addresses'), count( $icwp_aLoginProtectOptions['ips_whitelist']['ips'] ) ); ?>
						<?php foreach( $icwp_aLoginProtectOptions['ips_whitelist']['ips'] as $sIp ) : ?>
							<br />
							<?php printf( _calqio__('%s labelled as %s'), long2ip($sIp), $icwp_aLoginProtectOptions['ips_whitelist']['meta'][md5( $sIp )] ); ?>
						<?php endforeach; ?>
					</li>
				<?php endif; ?>
				<li><?php printf( _calqio__('Two Factor Login Authentication: %s'), ($icwp_aLoginProtectOptions['enable_two_factor_auth_by_ip'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Two Factor Login By Pass: %s'), ($icwp_aLoginProtectOptions['enable_two_factor_bypass_on_email_fail'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Login Cooldown Interval: %s'), ($icwp_aLoginProtectOptions['login_limit_interval'] == '0')? $sOff : sprintf( _calqio__('%s seconds'), $icwp_aLoginProtectOptions['login_limit_interval'] ) ); ?></li>
				<li><?php printf( _calqio__('Login Form GASP Protection: %s'), ($icwp_aLoginProtectOptions['enable_login_gasp_check'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Login Protect Logging: %s'), ($icwp_aLoginProtectOptions['enable_login_protect_log'] == 'Y')? $sOn : $sOff ); ?></li>
			</ul>
		<?php endif; ?>
		<hr/>
		<h4 style="margin-top:20px;">
			<?php printf( _calqio__('Comments Filtering is %s'), $fCommentsFilteringOn ? $sOn : $sOff ); ?>
			[ <a href="admin.php?page=icwp-calqio-comments_filter"><?php _calqio_e('Configure Now'); ?></a> ]</h4>
		<?php if ( $fCommentsFilteringOn ) : ?>
			<ul>
				<li><?php printf( _calqio__('Enchanced GASP Protection: %s'), ($icwp_aCommentsFilterOptions['enable_comments_gasp_protection'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Comments Cooldown Interval: %s'), ($icwp_aCommentsFilterOptions['comments_cooldown_interval'] == '0')? $sOff : sprintf( _calqio__('%s seconds'), $icwp_aCommentsFilterOptions['comments_cooldown_interval'] ) ); ?></li>
				<li><?php printf( _calqio__('Comments Token Expire: %s'), ($icwp_aCommentsFilterOptions['comments_token_expire_interval'] == '0')? $sOff : sprintf( _calqio__('%s seconds'), $icwp_aCommentsFilterOptions['comments_token_expire_interval'] ) ); ?></li>
			</ul>
		<?php endif; ?>
		<hr/>
		<h4 style="margin-top:20px;">
			<?php printf( _calqio__('WordPress Lockdown is %s'), $fLockdownOn ? $sOn : $sOff ); ?>
			[ <a href="admin.php?page=icwp-calqio-lockdown"><?php _calqio_e('Configure Now'); ?></a> ]</h4>
		<?php if ( $fLockdownOn ) : ?>
			<ul>
				<li><?php printf( _calqio__('Disable File Editing: %s'), ($icwp_aLockdownOptions['disable_file_editing'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Mask WordPress Version: %s'), empty($icwp_aLockdownOptions['mask_wordpress_version'])? $sOff : $icwp_aLockdownOptions['mask_wordpress_version'] ); ?></li>
			</ul>
		<?php endif; ?>
		<hr/>
		<h4 style="margin-top:20px;">
			<?php printf( _calqio__('Auto Updates is %s'), $fAutoupdatesOn ? $sOn : $sOff ); ?>
			[ <a href="admin.php?page=icwp-calqio-autoupdates"><?php _calqio_e('Configure Now'); ?></a> ]</h4>
		<?php if ( $fAutoupdatesOn ) :

			if ( $icwp_aAutoupdatesOptions['autoupdate_core'] == 'core_never' ) {
				$sAutoCoreUpdateOption = $sOff;
			}
			else if ( $icwp_aAutoupdatesOptions['autoupdate_core'] == 'core_minor' )  {
				$sAutoCoreUpdateOption = _calqio__('Minor Versions Only');
			}
			else {
				$sAutoCoreUpdateOption = _calqio__('Major and Minor Versions');
			}
			?>
			<ul>
				<li><?php printf( _calqio__('Automatically Update WordPress Simple Firewall Plugin: %s'), ($icwp_aAutoupdatesOptions['autoupdate_plugin_self'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Automatically Update WordPress Core: %s'), $sAutoCoreUpdateOption ); ?></li>
				<li><?php printf( _calqio__('Automatically Update Plugins: %s'), ($icwp_aAutoupdatesOptions['enable_autoupdate_plugins'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Automatically Update Themes: %s'), ($icwp_aAutoupdatesOptions['enable_autoupdate_themes'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Automatically Update Translations: %s'), ($icwp_aAutoupdatesOptions['enable_autoupdate_translations'] == 'Y')? $sOn : $sOff ); ?></li>
				<li><?php printf( _calqio__('Ignore Version Control Systems: %s'), ($icwp_aAutoupdatesOptions['enable_autoupdate_ignore_vcs'] == 'Y')? $sOn : $sOff ); ?></li>
			</ul>
		<?php endif; ?>
	</div>
</div><!-- / span6 -->