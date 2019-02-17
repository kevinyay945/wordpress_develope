<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2019/2/4
 * Time: 下午 10:49
 */?>
<form role="search" method="get" action="<?php echo home_url('/'); ?>">
	<input type="search" placeholder="Search..." value="<?php echo get_search_query();?>" name="s" title="Search" class="form-control"/>
</form>
