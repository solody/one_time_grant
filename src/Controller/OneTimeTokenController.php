<?php

namespace Drupal\one_time_grant\Controller;

use Drupal\Core\Controller\ControllerBase;
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
        return new RedirectResponse($config->get('redirect_url').'?token='.$user->id());
    }

}
