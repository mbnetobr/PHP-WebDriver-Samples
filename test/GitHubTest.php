<?php namespace GH\Tests;


class GitHubTest extends SeleniumBaseTest
{
	
	public $gitSearchPage;
	
	protected function setUp()
	{
		$this->driver = \RemoteWebDriver::create(getenv('HUB_URL'), array(
				\WebDriverCapabilityType::BROWSER_NAME => getenv('BROWSER')
		));
		$this->driver->get(getenv('URL'));
	}
	protected function tearDown()
	{
		$this->driver->quit();
	}
	
	public function testGitSearch(){
		$this->gitSearchPage = new GitSearchPage($this->driver);
		$this->gitSearchPage->typeSearch("php webdriver")->clickButtonSearch();
		$this->assertEquals('facebook/php-webdriver', $this->gitSearchPage->getTextFirstResult());
	}
}