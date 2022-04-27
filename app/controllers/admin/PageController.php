<?php


namespace app\controllers\admin;


use app\models\admin\Page;
use RedBeanPHP\R;
use wfm\App;
use wfm\Pagination;

/** @property Page $model */
class PageController extends AppController
{

    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $page = get('page');
        $perpage = 20;
        $total = R::count('page');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $pages = $this->model->get_pages($lang, $start, $perpage);
        $title = 'Список сторінок';
        $this->setMeta("Адмінка :: {$title}");
        $this->set(compact('title', 'pages', 'pagination', 'total'));
    }

    public function deleteAction()
    {
        $id = get('id');
        if ($this->model->deletePage($id)) {
            $_SESSION['success'] = 'Сторінка видалена';
        } else {
            $_SESSION['errors'] = 'Помилка видалення сторінки';
        }
        redirect();
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if ($this->model->page_validate()) {
                if ($this->model->save_page()) {
                    $_SESSION['success'] = 'Сторінка додана';
                } else {
                    $_SESSION['errors'] = 'Помилка додавання сторінки';
                }
            }
            redirect();
        }

        $title = 'Нова сторінка';
        $this->setMeta("Адмінка :: {$title}");
        $this->set(compact('title'));
    }

    public function editAction()
    {
        $id = get('id');

        if (!empty($_POST)) {
            if ($this->model->page_validate()) {
                if ($this->model->update_page($id)) {
                    $_SESSION['success'] = 'Сторінку збережено';
                } else {
                    $_SESSION['errors'] = 'Помилка поновлення сторінки';
                }
            }
            redirect();
        }

        $page = $this->model->get_page($id);
        if (!$page) {
            throw new \Exception('Not found page', 404);
        }
        $title = 'Редагування сторінки';
        $this->setMeta("Адмінка :: {$title}");
        $this->set(compact('title', 'page'));
    }

}