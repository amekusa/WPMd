<?php namespace amekusa\wpmd;

use amekusa\wpelib\Plugin;
use amekusa\wpelib\Action;
use amekusa\wpelib\Filter;
use amekusa\wpelib\Type;
use amekusa\wpelib\Post;
use amekusa\wpelib\AjaxAction;
use amekusa\plz\arr;
use amekusa\plz\constant;

/**
 * The application main class
 * @author amekusa <hello@amekusa.com>
 */
class App extends Plugin {

	const // Menus
		MENU_MAIN = 'wpmd-menu-main',
		MENU_OPTIONS = 'wpmd-menu-opt';
	
	protected $parser;

	protected function __construct() {
		$this->parser = new \Parsedown();
		
		Action::create('init', function () {
			Filter::create('the_content', array ($this, 'parse'))->setPriority(9)->register();
		})->register();
	}
	
	public function parse($Markdown) {
		return $this->parser->text($Markdown);
	}
}
