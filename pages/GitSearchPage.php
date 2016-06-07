<?php namespace GH\Tests;

use WebDriverExpectedCondition;
use WebDriverBy;
use RemoteWebDriver;

class GitSearchPage
{
    private $driver;
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
    
    public function typeSearch($search){
    	$this->driver->wait(10, 500)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::name("q")));
    	$this->driver->findElement(WebDriverBy::name("q"))->sendKeys($search);
    	return $this;
    }
    
    public function clickButtonSearch(){
    	$this->driver->wait(10, 500)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector("button.btn")));
    	$this->driver->findElement(WebDriverBy::cssSelector("button.btn"))->click();
    	return $this;
    }
    
    public function getTextFirstResult(){
    	return $this->driver->findElement(WebDriverBy::linkText("facebook/php-webdriver"))->getText();
		return $this;
    }
}