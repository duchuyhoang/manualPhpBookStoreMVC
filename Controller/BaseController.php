<?php
abstract class BaseController
{
  private $url;
  private $view;
  public function __construct()
  {
  }
  public function getUrl()
  {
    return $this->url;
  }


  public abstract function showView();
  protected abstract function handleGet();
  protected abstract function handlePost();
}
