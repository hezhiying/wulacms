<?php
namespace doc\classes;

use Michelf\Markdown;
use Michelf\MarkdownExtra;
use wulaphp\mvc\view\HtmlView;
use wulaphp\mvc\view\SimpleView;
use wulaphp\mvc\view\View;
use wulaphp\router\IURLDispatcher;
use wulaphp\router\Router;
use wulaphp\router\UrlParsedInfo;

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/3/24
 * Time: 下午6:22
 */
class DocRouter implements IURLDispatcher {
	const DOC_ROOT = 'vendor/';

	function dispatch($url, $router, $parsedInfo) {
		if (preg_match('/\.md$/i', $url)) {
			return new MdView($this->loadMD($url)) ;
		}

		return null;
	}

	private function loadMD($mdFile) {
		$content = file_get_contents(WWWROOT . self::DOC_ROOT . $mdFile);
		return MarkdownExtra::defaultTransform($content);
	}

}

class MdView extends SimpleView{
	public function setHeader() {
		@header('Content-type: text/html; charset=utf-8', true);
	}

}