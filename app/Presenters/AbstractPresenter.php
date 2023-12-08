<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


abstract class AbstractPresenter extends Nette\Application\UI\Presenter
{

    public function __construct(
        protected Nette\Database\Explorer $database
    ) {}

    public function startup(): void
    {
        parent::startup();

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }

}