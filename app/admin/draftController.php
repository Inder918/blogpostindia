<?php

class draft extends root
{
	protected static $db_table="draft";
	protected static $db_table_filed= array('title','author','body','image_id');
	use param;
	
}

