<?php

namespace Controllers\Adm;

use \Session;
use \View;
use \Models\Mship\Account\Account;
use \Request;
class AdmController extends \Controllers\BaseController {

    protected $_current_account = NULL;
    protected $_pageTitle = NULL;
    protected $_pageSubTitle = NULL;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

        public function __controller(){
            parent::__controller();
            $this->_current_account = Account::find(Session::get("auth_adm_account", 0));
        }

        public static function currentAccount(){
            return Account::find(Session::get("auth_adm_account", 0));
        }

        public function viewMake($view){
            $view = View::make($view);

            if(Session::get("auth_adm_true", false)){
                $view->with("_user", Account::find(Session::get("auth_adm_account")));
            }

            // Let's also display the breadcrumb
            $breadcrumb = array();
            $uri = "/adm";
            $bcBase = explode("\\", str_replace("Controllers\\Adm\\", "", get_called_class()));
            /*for($i=2; $i<=10; $i++){
                if(Request::segment($i) != NULL){
                    $uri.= Request::segment($i);
                    $b = [Request::segment($i)];
                    $b[1] = rtrim($uri, "/");
                    $breadcrumb[] = $b;
                }
            }*/
            foreach($bcBase as $bc){
                $uri.= "/".strtolower($bc);
                $breadcrumb[] = [strtolower($bc), $uri];
            }
            $view->with("_breadcrumb", $breadcrumb);

            // Page titles
            if($this->_pageTitle == NULL){
                $this->_pageTitle = last($breadcrumb)[0];
            }
            $view->with("_pageTitle", ucfirst($this->_pageTitle));
            if($this->_pageSubTitle == NULL){
                $this->_pageSubTitle = head($breadcrumb)[0];
            }
            if($this->_pageSubTitle == $this->_pageTitle){
                $this->_pageSubTitle = NULL;
            }
            $view->with("_pageSubTitle", $this->_pageSubTitle);

            return $view;
        }

}