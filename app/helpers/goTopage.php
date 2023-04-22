<?php
function gotoPage($name)
{
  // echo urlFor(VIEWS, $name . '.php');
  return include urlFor(VIEWS, $name . '.php');
}