<?php

namespace App\Tests;

use App\DataFixtures\AppFixtures;
use App\DataFixtures\ProductFixtures;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;

class SmokeTest extends KernelTestCase
{
    /** @var AbstractDatabaseTool */
    protected $databaseTool;

    use ResetDatabase, Factories;
    use HasBrowser;

    public function setUp(): void
    {
        parent::setUp();

        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->databaseTool);
    }

    #[Test]
    public function canBrowseProduces()
    {
        $this->databaseTool->loadFixtures([
            AppFixtures::class,
            ProductFixtures::class,
        ]);

        $browser = $this->browser()
            ->use(function(\Symfony\Component\BrowserKit\CookieJar $cookieJar) {
                $cookieJar->set(new Cookie('country', 'de'));
            })
            ->visit('/')
            ->assertSuccessful()
            ->assertSee('Our Recommendations')
            ->click('View details')
            ->assertSee('Île Vierge Lighthouse')
            ->click('Add to cart')
            ->assertSee('Your Cart');
    }
}
