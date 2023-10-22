<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
                                                                                                                                    
// This is used for performance, we don't need to know about these settings on every page in Moodle, only when                      
// we are looking at the admin settings pages.                                                                                      
if ($ADMIN->fulltree) {
    
    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.                         
    $settings = new theme_boost_admin_settingspage_tabs('themesettingcestmavie', get_string('configtitle', 'theme_cestmavie'));             
                                                                                                                                    
    // Each page is a tab - the first is the "General" tab.                                                                         
    $page = new admin_settingpage('theme_cestmavie_general', get_string('generalsettings', 'theme_cestmavie'));                             

    // Logo file setting.
    $name = 'theme_cestmavie/logo';
    $title = get_string('logo', 'theme_cestmavie');
    $description = get_string('logodesc', 'theme_cestmavie');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo', 0, $opts);
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_cestmavie/favicon';
    $title = get_string('favicon', 'theme_cestmavie');
    $description = get_string('favicondesc', 'theme_cestmavie');
    $opts = array('accepted_types' => array('.ico'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
    $page->add($setting);                                                                                               
    
    // Variable $background.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_cestmavie/backgroundcolor';                                                                                               
    $title = get_string('background-color', 'theme_cestmavie');                                                                               
    $description = get_string('background-color_desc', 'theme_cestmavie');                                                                    
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
    $name = 'theme_cestmavie/blockbackgroundcolor';                                                                                               
    $title = get_string('block-background-color', 'theme_cestmavie');                                                                               
    $description = get_string('block-background-color_desc', 'theme_cestmavie');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);
    
    // Variable $buttoncolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_cestmavie/buttoncolor';                                                                                               
    $title = get_string('button-color', 'theme_cestmavie');                                                                               
    $description = get_string('button-color_desc', 'theme_cestmavie');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $linkcolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_cestmavie/linkcolor';                                                                                               
    $title = get_string('link-color', 'theme_cestmavie');                                                                               
    $description = get_string('link-color_desc', 'theme_cestmavie');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $maintitlecolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_cestmavie/maintitlecolor';                                                                                               
    $title = get_string('main-title-color', 'theme_cestmavie');                                                                               
    $description = get_string('main-title-color_desc', 'theme_cestmavie');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Variable $secondarytitlecolor.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_cestmavie/secondarytitlecolor';                                                                                               
    $title = get_string('secondary-title-color', 'theme_cestmavie');                                                                               
    $description = get_string('secondary-title-color_desc', 'theme_cestmavie');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);

    // Must add the page after definiting all the settings!                                                                         
    $settings->add($page);                                                                                                          
                                                                                                                                    
    // Advanced settings.                                                                                                           
    $page = new admin_settingpage('theme_cestmavie_advanced', get_string('advancedsettings', 'theme_cestmavie'));                           
                                                                                                                                    
    // Raw SCSS to include before the content.                                                                                      
    $setting = new admin_setting_configtextarea('theme_cestmavie/scsspre',                                                              
        get_string('rawscsspre', 'theme_cestmavie'), get_string('rawscsspre_desc', 'theme_cestmavie'), '', PARAM_RAW);                      
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // Raw SCSS to include after the content.                                                                                       
    $setting = new admin_setting_configtextarea('theme_cestmavie/scss', get_string('rawscss', 'theme_cestmavie'),                           
        get_string('rawscss_desc', 'theme_cestmavie'), '', PARAM_RAW);                                                                  
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // // Google analytics block.
    // $name = 'theme_cestmavie/googleanalytics';
    // $title = get_string('googleanalytics', 'theme_cestmavie');
    // $description = get_string('googleanalyticsdesc', 'theme_cestmavie');
    // $setting = new admin_setting_configtext($name, $title, $description, '');
    // $setting->set_updatedcallback('theme_reset_all_caches');
    // $page->add($setting);

    $settings->add($page);                                                                                                         
}