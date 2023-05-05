<?php
function gotoPage($name, $role = '/admin')
{
  return include_once urlFor(VIEWS.$role, $name . '.php');
}