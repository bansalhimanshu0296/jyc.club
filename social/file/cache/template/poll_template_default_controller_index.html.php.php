<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: March 18, 2015, 8:55 pm */ ?>
<?php 
/**
 * [NULLED BY DARKGOTH 2014]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Poll
 * @version 		$Id: index.html.php 3342 2011-10-21 12:59:32Z Raymond_Benc $
 */
 
 

 if (! count ( $this->_aVars['aPolls'] )): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('poll.no_polls_found'); ?>
</div>
<?php else:  if (count((array)$this->_aVars['aPolls'])):  $this->_aPhpfoxVars['iteration']['polls'] = 0;  foreach ((array) $this->_aVars['aPolls'] as $this->_aVars['iKey'] => $this->_aVars['aPoll']):  $this->_aPhpfoxVars['iteration']['polls']++; ?>

<article>
	<?php
						Phpfox::getLib('template')->getBuiltFile('poll.block.entry');						
						?>
</article>
<?php endforeach; endif;  if (Phpfox ::getUserParam('poll.poll_can_moderate_polls')):  Phpfox::getBlock('core.moderation');  endif;  if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  endif; ?>
