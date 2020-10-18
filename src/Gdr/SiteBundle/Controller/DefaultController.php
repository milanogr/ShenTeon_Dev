<?php

namespace Gdr\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $moon = $this->getDoctrine()->getRepository("GdrMeteoBundle:MoonStatus")
            ->getMoon();

        $status = $this->getDoctrine()->getRepository("GdrMeteoBundle:MeteoStatus")
            ->getStatus();
        $hour = date("H", time());
        $isDay = $hour >= 6 && $hour <= 19;

        $img = "teon-";

        if ($isDay) {
            $img .= "giorno-";
        } else {
            $img .= "notte-";
        }

        $img .= strtolower($status->getCondition()->getName());

        // Recupero le ultime news
        $news = $this->getDoctrine()->getRepository('GdrAdministrationBundle:News')
            ->getLastNews(5);

        return $this->render(
            'GdrSiteBundle:Default:index.html.twig',
            array(
                'moon' => $moon,
                'meteo' => $status,
                'isDay' => $isDay,
                'immagine' => $img,
                'news' => $news
            )
        );
    }

    /**
     * Pagina di default al posto della home.
     *
     * @return Response
     */
    public function defaultAction()
    {
        $request = new Response();

//        $request->setMaxAge(60 * 15);
//        $request->setPublic();

        return $this->render('GdrSiteBundle:Default:default.html.twig', array(), $request);
    }

    public function showRegolamentiAction()
    {
        $regolamenti = $this->getDoctrine()->getRepository('GdrGameBundle:Manuale')
            ->findSortedSite();

        $request = new Response();
        $request->setMaxAge(60 * 10);
        $request->setPrivate();

        return $this->render(
            'GdrSiteBundle:Default:regolamenti.html.twig',
            array(
                'regolamenti' => $regolamenti
            ),
            $request
        );
    }

    public function showRegolamentoAction($slug)
    {
        $regolamento = $this->getDoctrine()->getRepository('GdrGameBundle:Manuale')
            ->findOneBy(
                array(
                    'slug' => $slug
                )
            );

        if (null === $regolamento) {
            $this->createNotFoundException("Pagina non trovata!");
        }

        $request = new Response();
        $request->setMaxAge(60 * 15);
        $request->setPrivate();

        return $this->render(
            '@GdrSite/Default/regolamento.html.twig',
            array(
                'regolamento' => $regolamento
            ),
            $request
        );
    }

    public function showAmbientazioneAction()
    {
        $ambientazione = $this->getDoctrine()->getRepository('GdrGameBundle:Manuale')
            ->findOneBy(
                array(
                    'title' => 'Ambientazione'
                )
            );

        if (null === $ambientazione) {
            $this->createNotFoundException("Pagina non trovata!");
        }

        $request = new Response();
        $request->setMaxAge(60 * 15);
        $request->setPrivate();

        return $this->render(
            '@GdrSite/Default/ambientazione.html.twig',
            array(
                'ambientazione' => $ambientazione
            ),
            $request
        );
    }

    public function showCreditsAction()
    {
        $request = new Response();
        $request->setMaxAge(60 * 15);
        $request->setPrivate();

        return $this->render(
            '@GdrSite/Default/credits.html.twig',
            array(),
            $request
        );
    }

    public function gdrOnlineAction()
    {
        return new Response("<html><body>Pagina accredito gestore</body></html>");
    }

    public function mailAction()
    {
        $email = \Swift_Message::newInstance()
            ->setSubject('Test')
            ->setFrom('gestione@shenteon.com')
            ->setTo("roberto.b@delex-ws.it")
            ->setBody(
                'Email di test'
            );

//        $this->get('mailer')->send($email);

        return new Response("Mail inviata!");
    }

    public function showPrivacyAction()
    {
        return $this->render('@GdrSite/Default/privacy.html.twig');
    }

    public function showListNewsAction()
    {
        $news = $this->getDoctrine()->getRepository('GdrAdministrationBundle:News')
            ->getAllNews();

        return $this->render(
            '@GdrSite/News/news.html.twig',
            array(
                'news' => $news
            )
        );
    }

    public function showNewsAction($slug)
    {
        $news = $this->getDoctrine()->getRepository('GdrAdministrationBundle:News')
            ->findOneBy(array('slug' => $slug));

        if (null === $news) {
            $this->createNotFoundException("Nessuna news trovata");
        }

        return $this->render('@GdrSite/News/singleNews.html.twig', array("news" => $news));
    }

    public function renderStatsAction(){

        $array = array();
        $onlines = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
            ->countPersonageOnline();

        $array[] = $this->getTeonDate();

        if ($onlines >= 10){
            $array[] = "Ora ci sono <strong>$onlines</strong> cittadini per le strade di Teon.";
        }

        $totalPg = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')->getTotalPersonages();
        $array[] = "Teoniani censiti all'Anagrafe prima del morbo: <strong>1850</strong> - Dopo il morbo: <strong>$totalPg</strong>";

        $output = "<ul>";
        foreach ($array as $a){
            $output .= "<li>$a</li>";
        }
        $output .= "</ul>";

        return new Response($output);
    }

    protected function getTeonDate()
    {
        $yearNumber = date("Y") - 1664;
        $year = "Anno " . $yearNumber  . "° ";
        $mese = "Mese " .date("n") . "° ";
        $giorno = "Giorno " .date("j") . "°";
        $date = $year . $mese . $giorno;

        return $date;
    }
}
