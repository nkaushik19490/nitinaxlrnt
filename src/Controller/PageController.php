<?php
/**
@file
Contains \Drupal\nitinaxlrnt\Controller\PageController.
 */
namespace Drupal\nitinaxlrnt\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use \Symfony\Component\HttpFoundation\JsonResponse;

class PageController extends ControllerBase
{
    public function getnodedetails($apikey, $nid)
    {

        $siteapikey = \Drupal::config('nitinaxlrnt.settings')->get('siteapikey');

        if ($apikey == $siteapikey) {
            $query = \Drupal::entityQuery('node')
                ->condition('nid', $nid)
                ->condition('type', 'page', '=')
                ->execute();

            if (empty($query)) {
                return new JsonResponse(array('error' => 'Invalid Node ID access denied'));
            } else {
                $node = Node::load($nid);
                $title = $node->getTitle();
                $body = $node->get('body')->getValue()[0]['value'];
                $response['title'] = $title;
                $response['body'] = $body;
                return new JsonResponse($response);
            }

        } else {
            return new JsonResponse(array('error' => 'Invalid Site API Key access denied'));
        }

    }
}
