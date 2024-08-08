<?php

namespace EvolutionCMS\Authforms\Console\Commands;

use Illuminate\Console\Command;

class CreateAuthformsRedirectDocument extends Command
{
    protected $signature   = 'authforms:redirect-doc';
    protected $description = 'Create doc for redirects';

    public function handle()
    {
        $documentData = [
            'pagetitle' => '✅ AuthForms Reset Password',
            'alias' => 'reset_password',
            'content' => 'http://',
            'template' => '0',
            'searchable' => '0',
            'hidemenu' => '1',
            'type' => 'reference',
            'published' => '1',
            'menutitle' => '0',
            'menuindex' => '999999999'
        ];
        $doc =  \DocumentManager::create($documentData);
        dump($doc);
    }
}
