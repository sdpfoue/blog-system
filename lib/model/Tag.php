<?php

class Tag extends BaseTag
{
  function __toString()
  {
    return $this->getName();
  }
  function getNameSlug()
  {
    return str_replace(' ', '-', $this->getName());
  }
}
