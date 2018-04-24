<?php

namespace Drupal\one_time_grant\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'one_time_grant.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'one_time_grant_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('one_time_grant.settings');
    $form['redirect_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('跳转地址'),
      '#description' => $this->t('跳转路由可以为当前登录用户生成one_time_token，并通过跳转地址的方式传给外部应用。填写的url不能带参数。'),
      '#maxlength' => 255,
      '#size' => 64,
      '#default_value' => $config->get('redirect_url'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('one_time_grant.settings')
      ->set('redirect_url', $form_state->getValue('redirect_url'))
      ->save();
  }

}
