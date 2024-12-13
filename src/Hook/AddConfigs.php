<?php

namespace BlueSpice\InsertLink\Hook;

use MediaWiki\Config\ConfigFactory;
use MediaWiki\Hook\BeforePageDisplayHook;

class AddConfigs implements BeforePageDisplayHook {

	/**
	 * @var ConfigFactory
	 */
	protected $configFactory;

	/**
	 * @param ConfigFactory $configFactory
	 */
	public function __construct( ConfigFactory $configFactory ) {
		$this->configFactory = $configFactory;
	}

	/**
	 * @inheritDoc
	 */
	public function onBeforePageDisplay( $out, $skin ): void {
		$config = $this->configFactory->makeConfig( 'bsg' );
		$out->addJsConfigVars(
			'bsInsertLinkAllowUnMapped',
			$config->get( "InsertLinkAllowUnMapped" )
		);
		$out->addJsConfigVars(
			'bsInsertLinkFilesystemMap',
			$config->get( "InsertLinkFilesystemMap" )
		);
	}
}
