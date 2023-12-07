<?php
namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class SignPresenter extends Nette\Application\UI\Presenter
{

    public function signInFormSucceeded(Form $form, \stdClass $data): void
    {
        try {
            $this->getUser()->login($data->username, $data->password);
            $this->redirect('Home:');

        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Nesprávné jméno nebo heslo.');
        }
    }

    protected function createComponentSignInForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Uživatelské jméno:')
            ->setRequired('Zadejte prosím vaše už. jméno.');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Zadejte prosím vaše heslo..');

        $form->addSubmit('send', 'Přihlásit se');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }

    public function renderIn(){

        $this->setLayout(false);

    }

    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení bylo úspěšné.');
        $this->redirect('in');
    }


}