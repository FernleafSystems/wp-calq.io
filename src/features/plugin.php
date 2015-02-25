<?php
/**
 * Copyright (c) 2015 iControlWP <support@icontrolwp.com>
 * All rights reserved.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

if ( !class_exists( 'ICWP_CALQIO_FeatureHandler_Plugin', false ) ):

	require_once( dirname(__FILE__).ICWP_DS.'base.php' );

	class ICWP_CALQIO_FeatureHandler_Plugin extends ICWP_CALQIO_FeatureHandler_Base {
		/**
		 * @return string
		 */
		protected function getProcessorClassName() {
			return 'ICWP_CALQIO_Processor_Plugin';
		}

		/**
		 */
		public function doClearAdminFeedback() {
			$this->setOpt( 'feedback_admin_notice', array() );
		}

		/**
		 * @param string $sMessage
		 */
		public function doAddAdminFeedback( $sMessage ) {
			$aFeedback = $this->getOpt( 'feedback_admin_notice', array() );
			$aFeedback[] = $sMessage;
			$this->setOpt( 'feedback_admin_notice', $aFeedback );
		}

		public function doExtraSubmitProcessing() {
			$this->doAddAdminFeedback( sprintf( ( '%s Plugin options updated successfully.' ), $this->getController()->getHumanName() ) );
		}

		/**
		 * @return array
		 */
		public function getActivePluginFeatures() {
			$aActiveFeatures = $this->getOptionsVo()->getRawData_SingleOption( 'active_plugin_features' );
			$aPluginFeatures = array();
			if ( empty( $aActiveFeatures['value'] ) || !is_array( $aActiveFeatures['value'] ) ) {
				return $aPluginFeatures;
			}

			foreach( $aActiveFeatures['value'] as $nPosition => $aFeature ) {
				if ( isset( $aFeature['hidden'] ) && $aFeature['hidden'] ) {
					continue;
				}
				$aPluginFeatures[ $aFeature['slug'] ] = $aFeature;
			}
			return $aPluginFeatures;
		}

		/**
		 * @param array $aSummaryData
		 * @return array
		 */
		public function filter_getFeatureSummaryData( $aSummaryData ) {
			return $aSummaryData;
		}

		/**
		 * This is the point where you would want to do any options verification
		 */
		protected function doPrePluginOptionsSave() {
			$oDp = $this->loadDataProcessor();

			if ( $this->getOpt( 'activated_at', 0 ) <= 0 ) {
				$this->setOpt( 'activated_at', $oDp->time() );
			}
			if (  $this->getOpt( 'installation_time', 0 ) <= 0 ) {
				$this->setOpt( 'installation_time', $oDp->time() );
			}

			$this->setOpt( 'installed_version', $this->getController()->getVersion() );
		}
	}

endif;