<?php

/*
 * Ceci sera ajouté dans tous vos fichiers PHP en entête.
 *
 * (c) Zozor <zozor@openclassrooms.com>
 *
 * A adapter et ré-utiliser selon vos besoins!
 */

namespace App\Tests\Smoke;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SmokeTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello!');
    }
}
