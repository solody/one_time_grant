<?php

namespace Drupal\one_time_grant\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class OneTimeTokenController.
 */
class OneTimeTokenController extends ControllerBase
{

    /**
     * Generate.
     *
     * @return string
     *   Return Hello string.
     * @throws \Exception
     */
    public function generate()
    {
        $user = \Drupal::currentUser();

        if (!$user->isAuthenticated()) {
            throw new \Exception('用户没有登录');
        }

        $config = \Drupal::config('one_time_grant.settings');
        $response = new TrustedRedirectResponse($config->get('redirect_url').'?token='.$user->id());

        $response->getCacheableMetadata()->setCacheMaxAge(0);

        return $response;
    }

}
