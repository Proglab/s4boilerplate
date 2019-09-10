<?php

/*
 * Ceci sera ajouté dans tous vos fichiers PHP en entête.
 *
 * (c) Zozor <zozor@openclassrooms.com>
 *
 * A adapter et ré-utiliser selon vos besoins!
 */

namespace App\Tests;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function connectionWithLoginPassFailed(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'davert');
        $I->fillField('password', 'qwerty');
        $I->click('login');
        $I->seeElement('.alert-danger');
    }

    public function connectionWithEmailPassFailed(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'test@test.com');
        $I->fillField('password', 'tes');
        $I->click('login');
        $I->seeElement('.alert-danger');
    }

    public function connectionWithEmailPassSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'test@test.com');
        $I->fillField('password', 'test');
        $I->click('login');
        $I->seeCurrentUrlEquals('/');
    }
}
