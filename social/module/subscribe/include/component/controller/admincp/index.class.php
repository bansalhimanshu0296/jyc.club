<?php
/**
 * [NULLED BY DARKGOTH 2014]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: controller.class.php 103 2009-01-27 11:32:36Z Raymond_Benc $
 */
class Subscribe_Component_Controller_Admincp_Index extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		if (($iDeleteId = $this->request()->getInt('delete')))
		{
			if (Phpfox::getService('subscribe.process')->delete($iDeleteId))
			{
				$this->url()->send('admincp.subscribe', null, Phpfox::getPhrase('subscribe.package_successfully_deleted'));
			}
		}				
		
		$this->template()->setTitle(Phpfox::getPhrase('subscribe.subscription_packages'))
			->setBreadCrumb('Modules', '#modules')
			->setBreadcrumb('Subscriptions', $this->url()->makeUrl('admincp.subscribe.list'))
			->setBreadcrumb('Packages', $this->url()->makeUrl('admincp.subscribe'), true)
			->setHeader(array(
					'drag.js' => 'static_script',
					'<script type="text/javascript">$Behavior.coreDragInit = function() { Core_drag.init({table: \'#js_drag_drop\', ajax: \'subscribe.ordering\'}); }</script>'
				)
			)
			->assign(array(
					'aPackages' => Phpfox::getService('subscribe')->getForAdmin()
				)
			);		
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('subscribe.component_controller_admincp_index_clean')) ? eval($sPlugin) : false);
	}
}

?>