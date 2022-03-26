<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    OSSN Core Team <info@openteknik.com>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
 $placeh = 'Username1
Username2
Username3';
$component = new OssnComponents();
$list = $component->getSettings('RestrictUsernames');
$settings = '';
if($list && isset($list->list)){
	$settings	= $list->list;
}
?>
<div>
	<label><?php echo ossn_print('restrictusernames:title'); ?></label>
    <textarea style="min-height:200px;" placeholder="<?php echo $placeh;?>" name="usernames"><?php echo $settings;?></textarea>
</div> 
<div>
	<input type="submit" value="<?php echo ossn_print('save');?>" class="btn btn-success btn-sm" />
</div>