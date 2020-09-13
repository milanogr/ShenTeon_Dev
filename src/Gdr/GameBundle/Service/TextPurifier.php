<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 19/12/14
 * Time: 12:26
 */

namespace Gdr\GameBundle\Service;


class TextPurifier
{

    /**
     * @var \HTMLPurifier
     */
    private $purifier;

    /**
     * @var \simple_html_dom
     */
    private $htmlDom;

    /**
     * @param \HTMLPurifier $purifier
     */
    public function __construct(\HTMLPurifier $purifier, \simple_html_dom $htmlDom)
    {
        $this->purifier = $purifier;
        $this->htmlDom = $htmlDom;
    }

    public function purify($text)
    {
        $body = $this->purifier->purify($text);

        $this->htmlDom->load($body);

        $imgs = $this->htmlDom->find('img');
        $pattern = "#http://www.shenteon.com[^>]+#i";

        foreach ($imgs as $img) {
            $src = $img->src;

            if (!preg_match($pattern, $src)) {

                // Rimpiazzo l'elemento con un link
                $img->outertext = '<span class="gdrtooltip" title="Attenzione, questo url è esterno a Shenteon">' . $src . '</span>';
            }
        }

        return $this->htmlDom->root->innertext();
    }

}