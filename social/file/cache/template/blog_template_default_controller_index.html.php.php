<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: March 18, 2015, 8:59 pm */ ?>
<?php 
/**
 * [NULLED BY DARKGOTH 2014]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: index.html.php 7290 2014-04-30 19:14:20Z Fern $
 */
 
 

 if (isset ( $this->_aVars['bSpecialMenu'] ) && $this->_aVars['bSpecialMenu'] == true): ?>
    <?php
						Phpfox::getLib('template')->getBuiltFile('blog.block.specialmenu');						
						 endif;  if (! count ( $this->_aVars['aItems'] )): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('blog.no_blogs_found'); ?>
</div>
<?php else:  if (count((array)$this->_aVars['aItems'])):  $this->_aPhpfoxVars['iteration']['blog'] = 0;  foreach ((array) $this->_aVars['aItems'] as $this->_aVars['aItem']):  $this->_aPhpfoxVars['iteration']['blog']++; ?>

	<article itemscope itemtype="http://schema.org/BlogPosting">
		<?php
						Phpfox::getLib('template')->getBuiltFile('blog.block.entry');						
						?>
	</article>
<?php endforeach; endif;  if (Phpfox ::getUserParam('blog.can_approve_blogs') || Phpfox ::getUserParam('blog.delete_user_blog')):  Phpfox::getBlock('core.moderation');  endif;  unset($this->_aVars['aItems']);  if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  endif; ?>

