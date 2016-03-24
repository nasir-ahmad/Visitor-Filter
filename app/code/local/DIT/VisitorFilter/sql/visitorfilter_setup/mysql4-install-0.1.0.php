<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table if not exists visitorfilter_filter(
id int not null auto_increment, 
message_id int(10),
name varchar(100) not null, 
ip_addresses varchar(20), 
referers varchar(255),
country_ids varchar(255),
cms_page_ids text,
product_ids text,
category_ids text,
block_at datetime,
unblock_at datetime,
status tinyint(1),
primary key(id)
);


create table if not exists visitorfilter_message(
id int not null auto_increment, 
title varchar(255) not null, 
body text not null,
created_at datetime,
updated_at datetime,
status tinyint(1),
primary key(id)
);

SQLTEXT;

$installer->run($sql);

$installer->endSetup();
	 