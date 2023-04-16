<?php
function gotoPage($name)
{
  return include('./pages/' . $name . '.php');
}
