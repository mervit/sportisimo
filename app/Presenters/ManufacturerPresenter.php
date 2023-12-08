<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class ManufacturerPresenter extends AbstractPresenter
{

    public function addItem(Form $form): void {

        $values = $form->getValues();

        $this->database->table('manufacturer')->insert([
            'name' => $values->name,
            'deleted' => 0
        ]);

        $this->flashMessage('Značka vložena', 'success');

        $this->redirect('default');

    }

    public function editItem(Form $form): void {

        $values = $form->getValues();

        $manufacturer = $this->database->table('manufacturer')->get($values->id);
        if(!$manufacturer){
            $this->flashMessage('Značka neexistuje!', 'error');
            return;
        }

        $this->database->table('manufacturer')->get($values->id)->update([
            'name' => $values->name
        ]);

        $this->flashMessage('Značka ' . $values->name . 'upravena', 'success');

        $this->redirect('default');

    }

    public function createComponentManufacturerEditForm(): Form {

        $form = new Form();

        $form->addText('name', 'Název')
            ->addRule($form::MaxLength, 'Název může mít maximálně %d znaků', 80)
            ->setRequired('Vyplňte název')
            ->setDefaultValue(' ');

        $form->addHidden('id');

        $form->addSubmit('send', 'Odeslat');

        $form->onSuccess[] = [$this, 'editItem'];

        return $form;

    }

    public function createComponentManufacturerAddForm(): Form {

        $form = new Form();

        $form->addText('name', 'Název')
            ->addRule($form::MaxLength, 'Název může mít maximálně %d znaků', 80)
            ->setRequired('Vyplňte název');

        $form->addSubmit('send', 'Odeslat');

        $form->onSuccess[] = [$this, 'addItem'];

        return $form;

    }

    public function handleDelete($id){

        $manufacturer = $this->database->table('manufacturer')->get($id);
        if(!$manufacturer){
            $this->flashMessage('Značka neexistuje!', 'error');
            return;
        }

        $this->database->table('manufacturer')->get($id)->update(['deleted' => 1]);
        $this->flashMessage('Značka ' . $manufacturer->name . ' smazána!');

    }

    public function renderDefault(){

        $orderBy = 'id';
        $orderDirection = 'DESC';
        $orderableColomns = ['id', 'name'];
        $availableOnPage = [3, 10, 20, 30];
        $conditions = ['deleted' => 0];
        $onPage = 3;
        $page = 1;

        $maxRows = $this->database->table('manufacturer')->where($conditions)->count();

        $paginator = new \Nette\Utils\Paginator;
        $paginator->setItemCount($maxRows);

        if($this->request->getParameter('orderBy') && in_array($this->request->getParameter('orderBy'), $orderableColomns)){
            $orderBy = $this->request->getParameter('orderBy');
        }

        if($this->request->getParameter('orderDirection') && in_array($this->request->getParameter('orderDirection'), ['ASC', 'DESC'])){
            $orderDirection = $this->request->getParameter('orderDirection');
        }

        if($this->request->getParameter('onPage') && in_array( (int) $this->request->getParameter('onPage'), $availableOnPage)){
            $onPage = (int) $this->request->getParameter('onPage');
        }
        $paginator->setItemsPerPage($onPage);

        if($this->request->getParameter('page') && is_numeric($page) && (int) $page > 0 && (int) $page <= $paginator->getPageCount()){
            $page = (int) $this->request->getParameter('page');
        }
        $paginator->setPage($page);

        $manufacturers = $this->database->table('manufacturer')
            ->where($conditions)
            ->order($orderBy . ' ' . $orderDirection)
            ->limit($paginator->getLength(), $paginator->getOffset())
            ;

        $this->template->manufacturers = [];

        foreach ($manufacturers as $manufacturer) {
            $this->template->manufacturers[] = (object) [
                'id' => $manufacturer->id,
                'name' => $manufacturer->name
            ];
        }
        $this->template->paginator = $paginator;
        $this->template->orderBy = $orderBy;
        $this->template->orderDirection = $orderDirection;
        $this->template->availableOnPage = $availableOnPage;

    }

}