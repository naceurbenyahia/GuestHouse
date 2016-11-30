<?php

namespace MyApp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@MyAppUser/layout.html.twig');
    }

    public function notfndAction()
    {
        return $this->render('@MyAppUser/template/404.html.twig');
    }

    public function blogarchiveAction()
    {
        return $this->render('@MyAppUser/template/blog-archive.html.twig');
    }

    public function blogsingleAction()
    {
        return $this->render('@MyAppUser/template/blog-single.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@MyAppUser/template/contact.html.twig');
    }

    public function galleryAction()
    {
        return $this->render('@MyAppUser/template/gallery.html.twig');
    }

    public function propertiesAction()
    {
        return $this->render('@MyAppUser/template/properties.html.twig');
    }

    public function propertiesdetailAction()
    {
        return $this->render('@MyAppUser/template/properties-detail.html.twig');
    }

    public function registerAction()
    {
        return $this->render('@MyAppUser/template/register.html.twig');
    }

    public function signinAction()
    {
        return $this->render('@MyAppUser/template/signin.html.twig');
    }

}
