<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_lb_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_lb', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    // LB scss.
    $LBvariables = file_get_contents($CFG->dirroot . '/theme/lb/scss/lb/_variables.scss');
    $LB = file_get_contents($CFG->dirroot . '/theme/lb/scss/default.scss');

    // Combine them together.
    $allscss = $LBvariables . "\n" . $scss . "\n" . $LB;

    return $allscss;
}

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_lb_get_pre_scss($theme) {
    $scss = '';
    $configurable = [
        // Config key => [variableName, ...].
        'brandcolor' => ['brand-primary'],
        'secondarymenucolor' => 'secondary-menu-color'
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {                                                                             
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;                                     
        if (empty($value)) {                                                                                                        
            continue;                                                                                                               
        }                                                                                                                           
        array_map(function($target) use (&$scss, $value) {                                                                          
            $scss .= '$' . $target . ': ' . $value . ";\n";                                                                         
        }, (array) $targets);                                                                                                       
    }   

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Get compiled css.
 *
 * @return string compiled css
 */
function theme_lb_get_precompiled_css() {
    global $CFG;

    return file_get_contents($CFG->dirroot . '/theme/lb/style/moodle.css');
}