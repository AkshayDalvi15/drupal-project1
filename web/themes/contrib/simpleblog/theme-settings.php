<?php

/**
 * @file
 * Implementation of hook_form_system_theme_settings_alter()
 */

use Drupal\file\Entity\File;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 */
function simpleblog_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

  $form['simpleblog_settings'] = [
    '#type' => 'fieldset',
    '#title' => t('SimpleBlog Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  ];

  $form['simpleblog_settings']['grid_view'] = [
    '#type' => 'checkbox',
    '#title' => t('Show grid view in the front page'),
    '#default_value' => theme_get_setting('grid_view', 'simpleblog'),
    '#description'   => t("Check this option to show grid view in the home page."),
  ];

  $form['simpleblog_settings']['banner'] = [
    '#type' => 'fieldset',
    '#title' => t('Banner'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  ];

  $form['simpleblog_settings']['banner']['show'] = [
    '#type' => 'checkbox',
    '#title' => t('Show banner in the home page'),
    '#default_value' => theme_get_setting('show', 'simpleblog'),
    '#description'   => t("Check this option to show banner in the home page. Uncheck to hide."),
  ];

  $form['simpleblog_settings']['banner']['image'] = [
    '#type' => 'managed_file',
    '#title' => t('Image'),
    '#default_value' => theme_get_setting('image', 'simpleblog'),
    '#upload_location' => 'public://',
  ];

  $form['simpleblog_settings']['copy'] = [
    '#type' => 'fieldset',
    '#title' => t('Copyright'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  ];

  $form['simpleblog_settings']['copy']['copyright'] = [
    '#type' => 'textfield',
    '#title' => t('Copyright Text'),
    '#default_value' => theme_get_setting('copyright', 'simpleblog'),
  ];

  $form['simpleblog_settings']['social'] = [
    '#type' => 'fieldset',
    '#title' => t('Social Links'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  ];

  $form['simpleblog_settings']['social']['drupal'] = [
    '#type' => 'textfield',
    '#title' => t('Drupal Link'),
    '#default_value' => theme_get_setting('drupal', 'simpleblog'),
  ];

  $form['simpleblog_settings']['social']['facebook'] = [
    '#type' => 'textfield',
    '#title' => t('Facebook Link'),
    '#default_value' => theme_get_setting('facebook', 'simpleblog'),
  ];

  $form['simpleblog_settings']['social']['instagram'] = [
    '#type' => 'textfield',
    '#title' => t('Instagram Link'),
    '#default_value' => theme_get_setting('instagram', 'simpleblog'),
  ];

  $form['simpleblog_settings']['social']['twitter'] = [
    '#type' => 'textfield',
    '#title' => t('Twitter Link'),
    '#default_value' => theme_get_setting('twitter', 'simpleblog'),
  ];

  $form['simpleblog_settings']['social']['googleplus'] = [
    '#type' => 'textfield',
    '#title' => t('Google+ Link'),
    '#default_value' => theme_get_setting('googleplus', 'simpleblog'),
  ];

  $form['#submit'][] = 'simpleblog_settings_form_submit';
  $theme = \Drupal::theme()->getActiveTheme()->getName();
  $theme_file = drupal_get_path('theme', $theme) . '/theme-settings.php';
  $build_info = $form_state->getBuildInfo();
  if (!in_array($theme_file, $build_info['files'])) {
    $build_info['files'][] = $theme_file;
  }
  $form_state->setBuildInfo($build_info);
}

/**
 *
 */
function simpleblog_settings_form_submit(&$form, FormStateInterface $form_state) {
  $account = \Drupal::currentUser();
  $values = $form_state->getValues();

  if (isset($values["image"]) && !empty($values["image"])) {
    // Load the file via file.fid.
    if ($file = File::load($values["image"][0])) {
      // Change status to permanent.
      $file->setPermanent();
      $file->save();
      $file_usage = \Drupal::service('file.usage');
      $file_usage->add($file, 'user', 'user', $account->id());
    }
  }

}
