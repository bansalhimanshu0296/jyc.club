<?php 
/**
 * [NULLED BY DARKGOTH 2014]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-menu.html.php 6937 2013-11-24 18:11:09Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
						{plugin call='core.template_block_template_menu_1'}
						{if Phpfox::getUserBy('profile_page_id') <= 0}
						<ul class="links">
							{plugin call='theme_template_core_menu_list'}	
							{if isset($bForceLogoOnMenu)}
								<li>{logo}</li>
							{/if}
							{if ($iMenuCnt = 0)}{/if}
							{foreach from=$aMainMenus key=iKey item=aMainMenu name=menu}
							{if !isset($aMainMenu.is_force_hidden)}
								{iterate int=$iMenuCnt} 							
							{/if}
								<li rel="menu{$aMainMenu.menu_id}" {if (isset($iTotalHide) && isset($iMenuCnt) && $iMenuCnt > $iTotalHide)} style="display:none;" {/if} {if (($aMainMenu.url == 'apps' && count($aInstalledApps)) || (isset($aMainMenu.children) && count($aMainMenu.children))) || (isset($aMainMenu.is_force_hidden))}class="{if isset($aMainMenu.is_force_hidden) && isset($iTotalHide)}is_force_hidden{else}explore{/if}{if ($aMainMenu.url == 'apps' && count($aInstalledApps))} explore_apps{/if}"{/if}><a {if !isset($aMainMenu.no_link) || $aMainMenu.no_link != true}href="{url link=$aMainMenu.url}" {else} href="#" onclick="return false;" {/if} class="{$aMainMenu.class_name} {if isset($aMainMenu.is_selected) && $aMainMenu.is_selected} menu_is_selected {/if}{if isset($aMainMenu.external) && $aMainMenu.external == true}no_ajax_link {/if}ajax_link">
									<span class="icon"{if (isset($aMainMenu.icon))} style="background-image:url('{$aMainMenu.icon}'); border:0px; background-position:center center;"{/if}></span><span class="phrase">{if ($aMainMenu.module)}{phrase var=$aMainMenu.module'.'$aMainMenu.var_name}{if isset($aMainMenu.suffix)}{$aMainMenu.suffix}{/if}{else}{$aMainMenu.var_name}{/if}</span>
									</a>
									{if isset($aMainMenu.children) && count($aMainMenu.children)}
									<ul>
										{foreach from=$aMainMenu.children item=aChild name=child_menu}
										<li{if $phpfox.iteration.child_menu == 1} class="first"{/if}><a href="{url link=$aChild.url}">{phrase var=$aChild.module'.'$aChild.var_name}</a></li>
										{/foreach}
									</ul>
									{else}								
									{if !isset($bForceLogoOnMenu) && $aMainMenu.url == 'apps' && count($aInstalledApps)}
									<ul>
										{foreach from=$aInstalledApps item=aInstalledApp}
										<li><a href="{permalink module='apps' id=$aInstalledApp.app_id title=$aInstalledApp.app_title}" title="{$aInstalledApp.app_title|clean}">{img server_id=0 path='app.url_image' file=$aInstalledApp.image_path suffix='_square' max_width=16 max_height=16 title=$aInstalledApp.app_title class='v_middle'} {$aInstalledApp.app_title|clean|shorten:22:'...'}</a></li>
										{/foreach}
									</ul>
									{/if}
									{/if}
								</li>
							{/foreach}
						</ul>
						{/if}