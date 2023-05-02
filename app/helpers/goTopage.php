<?php
function gotoPage($name)
{
  // echo urlFor(VIEWS, $name . '.php');
  return include_once urlFor(VIEWS, $name . '.php');
}