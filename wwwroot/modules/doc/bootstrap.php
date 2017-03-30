<?php
namespace doc;

use doc\classes\DocRouter;
use wula\cms\CmfModule;
use wulaphp\app\App;
use wulaphp\router\Router;

class DocModule extends CmfModule {
	public function getName() {
		return '模块的名字';
	}

	public function getDescription() {
		return '模块的描述';
	}

	public function getHomePageURL() {
		return '模块的URL';
	}
	public function getVersionList() {
		$v['1.0.0'] = '';

		return $v;
	}

	/**
	 * @bind router\registerDispatcher
	 */
	public static function regRouter(Router $router){
		$router->register(new DocRouter());
	}
}

App::register(new DocModule());