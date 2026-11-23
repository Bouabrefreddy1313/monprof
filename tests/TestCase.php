<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * ATTENTION — base de données des tests
 * -------------------------------------
 * Ce projet n'a PAS de base de test dédiée (phpunit.xml ne définit ni SQLite
 * en mémoire ni DB_DATABASE de test) : les tests s'exécutent sur la base de
 * développement configurée dans .env (DB_DATABASE=mon).
 *
 * Il est donc INTERDIT d'utiliser le trait RefreshDatabase dans les tests :
 * il exécuterait un `migrate:fresh` et effacerait toutes les données réelles
 * (cours, formations, leads, comptes admin…).
 *
 * Utilisez `Illuminate\Foundation\Testing\DatabaseTransactions` : chaque test
 * est isolé dans une transaction automatiquement annulée.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
