<?php

namespace Orvital\Core\Database\Migrations;

use Illuminate\Database\Migrations\MigrationCreator as BaseMigrationCreator;

class MigrationCreator extends BaseMigrationCreator
{
    protected function getDatePrefix()
    {
        return date('Y_m_d_v');
    }
}
