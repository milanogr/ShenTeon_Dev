<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ArchivioController extends Controller
{

    public function indexAction()
    {
        $sections = $this->getDoctrine()->getRepository("GdrGameBundle:LibrarySection")->findSortedSectionsArchivio();

        return $this->render(
            'GdrGameBundle:Archivio:index.html.twig',
            array(
                "sections" => $sections
            )
        );
    }

    public function showAction($id)
    {
        $section = $this->getDoctrine()->getRepository("GdrGameBundle:LibrarySection")->findOneBy(
            array(
                "id" => $id
            )
        );

        if (null === $section){
            throw new EntityNotFoundException();
        }

        $books = $this->getDoctrine()->getRepository("GdrGameBundle:LibraryBook")->findSortedBooksBySection($section);

        return $this->render(
            'GdrGameBundle:Archivio:show.html.twig',
            array(
                "section" => $section,
                "books" => $books
            )
        );
    }

    public function showBookAction($id)
    {
        $book = $this->getDoctrine()->getRepository("GdrGameBundle:LibraryBook")
        ->find($id);

        if (null === $book){
            throw new EntityNotFoundException();
        }

        return $this->render(
            'GdrGameBundle:Archivio:showItem.html.twig',
            array(
                "book" => $book
            )
        );
    }
}