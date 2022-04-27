<?php


namespace app\controllers\admin;


use app\models\admin\Category;
use RedBeanPHP\R;
use wfm\App;

/** @property Category $model */
class CategoryController extends AppController
{

    public function indexAction()
    {
        $title = 'Категорії';
        $this->setMeta("Адмінка :: {$title}");
        $this->set(compact('title'));
    }

    public function deleteAction()
    {
        $id = get('id');
        $errors = '';
        $children = R::count('category', 'parent_id = ?', [$id]);
        $products = R::count('product', 'category_id = ?', [$id]);
        if ($children) {
            $errors .= 'Помилка! У категорії є вкладені категорії<br>';
        }
        if ($products) {
            $errors .= 'Помилка! У категорії є товари<br>';
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
        } else {
            R::exec("DELETE FROM category WHERE id = ?", [$id]);
            R::exec("DELETE FROM category_description WHERE category_id = ?", [$id]);
            $_SESSION['success'] = 'Категорія видалена';
        }
        redirect();
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if ($this->model->category_validate()) {
                if ($this->model->save_category()) {
                    $_SESSION['success'] = 'Категорія збережена';
                } else {
                    $_SESSION['errors'] = 'Помилка!';
                }
            }
            redirect();
        }
        $title = 'Додавання категорії';
        $this->setMeta("Адмінка :: {$title}");
        $this->set(compact('title'));
    }

    public function editAction()
    {
        $id = get('id');
        if (!empty($_POST)) {
            if ($this->model->category_validate()) {
                if ($this->model->update_category($id)) {
                    $_SESSION['success'] = 'Категорію оновлено';
                } else {
                    $_SESSION['errors'] = 'Помилка!';
                }
            }
            redirect();
        }
        $category = $this->model->get_category($id);
        if (!$category) {
            throw new \Exception('Not found category', 404);
        }
        $lang = App::$app->getProperty('language')['id'];
        App::$app->setProperty('parent_id', $category[$lang]['parent_id']);
        $title = 'Редагування категорії';
        $this->setMeta("Адмінка :: {$title}");
        $this->set(compact('title', 'category'));
    }

}