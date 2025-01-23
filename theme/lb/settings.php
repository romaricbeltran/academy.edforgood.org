<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
                                                                                                                                    
// This is used for performance, we don't need to know about these settings on every page in Moodle, only when                      
// we are looking at the admin settings pages.                                                                                      
if ($ADMIN->fulltree) {
    
    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.                         
    $settings = new theme_boost_admin_settingspage_tabs('themesettinglb', get_string('configtitle', 'theme_lb'));             
                                                                                                                                    
    // Each page is a tab - the first is the "General" tab.                                                                         
    $page = new admin_settingpage('theme_lb_general', get_string('generalsettings', 'theme_lb'));                             

    // Logo file setting.
    $name = 'theme_lb/logo';
    $title = get_string('logo', 'theme_lb');
    $description = get_string('logodesc', 'theme_lb');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo', 0, $opts);
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_lb/favicon';
    $title = get_string('favicon', 'theme_lb');
    $description = get_string('favicondesc', 'theme_lb');
    $opts = array('accepted_types' => array('.ico'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
    $page->add($setting);                                                                                               
    
    // Variable $background.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_lb/backgroundcolor';                                                                                               
    $title = get_string('background-color', 'theme_lb');                                                                               
    $description = get_string('background-color_desc', 'theme_lb');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $backgroundheader.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_cestmavie/backgroundheadercolor';                                                                                               
    $title = get_string('background-header-color', 'theme_cestmavie');                                                                               
    $description = get_string('background-header-color_desc', 'theme_cestmavie');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $blockbackgroundcolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_lb/blockbackgroundcolor';                                                                                               
    $title = get_string('block-background-color', 'theme_lb');                                                                               
    $description = get_string('block-background-color_desc', 'theme_lb');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);
    
    // Variable $buttoncolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_lb/buttoncolor';                                                                                               
    $title = get_string('button-color', 'theme_lb');                                                                               
    $description = get_string('button-color_desc', 'theme_lb');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $linkcolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_lb/linkcolor';                                                                                               
    $title = get_string('link-color', 'theme_lb');                                                                               
    $description = get_string('link-color_desc', 'theme_lb');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $maintitlecolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_lb/maintitlecolor';                                                                                               
    $title = get_string('main-title-color', 'theme_lb');                                                                               
    $description = get_string('main-title-color_desc', 'theme_lb');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $secondarytitlecolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_lb/secondarytitlecolor';                                                                                               
    $title = get_string('secondary-title-color', 'theme_lb');                                                                               
    $description = get_string('secondary-title-color_desc', 'theme_lb');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Must add the page after definiting all the settings!                                                                         
    $settings->add($page);                                                                                                          
                                                                                                                                    
    // Advanced settings.                                                                                                           
    $page = new admin_settingpage('theme_lb_advanced', get_string('advancedsettings', 'theme_lb'));                           
                                                                                                                                    
    // Raw SCSS to include before the content.                                                                                      
    $setting = new admin_setting_configtextarea('theme_lb/scsspre',                                                              
        get_string('rawscsspre', 'theme_lb'), get_string('rawscsspre_desc', 'theme_lb'), '', PARAM_RAW);                      
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // Raw SCSS to include after the content.                                                                                       
    $setting = new admin_setting_configtextarea('theme_lb/scss', get_string('rawscss', 'theme_lb'),                           
        get_string('rawscss_desc', 'theme_lb'), '', PARAM_RAW);                                                                  
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // // Google analytics block.
    // $name = 'theme_lb/googleanalytics';
    // $title = get_string('googleanalytics', 'theme_lb');
    // $description = get_string('googleanalyticsdesc', 'theme_lb');
    // $setting = new admin_setting_configtext($name, $title, $description, '');
    // $setting->set_updatedcallback('theme_reset_all_caches');
    // $page->add($setting);

    $settings->add($page);                                                                                                         
}