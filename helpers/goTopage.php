<?php
function gotoPage($name)
{
  return include urlFor(VIEWS, $name . '.php');
}