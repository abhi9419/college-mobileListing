<?php

//database name 
 define("DB_NAME","mobiles");
//database password
 define("DB_PASS","abc1234");
//server name
 define("DB_SERVER","localhost");
//username
 define("DB_USERNAME","alok");

if(!mysql_connect(DB_SERVER,DB_USERNAME,DB_PASS))
{
  die("Could not connect");
}

if(!mysql_select_db(DB_NAME))
{
  die("Could not connect");
}

