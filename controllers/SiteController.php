<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Contact;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name' => "wasilolly"
        ];

        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contactForm = new Contact();

        if ($request->isPost()) {
            $contactForm->loadData($request->getBody());
            if ($contactForm->validate() && $contactForm->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contactForm
        ]);
    }
}
