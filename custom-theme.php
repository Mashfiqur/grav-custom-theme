<?php
namespace Grav\Theme;

use Error;
use Grav\Common\Theme;

class CustomTheme extends Theme
{
    public function onThemeInitialized()
    {
        $this->getMostRecentPages();
    }

    protected function getMostRecentPages(): void {
        try{
            // Get the current page URL
            $pageUrl = $this->grav['uri']->url();
                
            // Get the existing session data or initialize an empty array
            $recentPages = $this->grav['session']->recent_pages ?? [];

            // Remove the current page URL from the array, if it exists
            if (($key = array_search($pageUrl, $recentPages)) !== false) {
                unset($recentPages[$key]);
            }

            // Add the current page URL to the beginning of the array
            array_unshift($recentPages, $pageUrl);

            // Limit the array to a certain number of recent pages (e.g., 5)
            $maxRecentPages = 3;
            $recentPages = array_slice($recentPages, 0, $maxRecentPages);

            // Store the updated session data
            $this->grav['session']->recent_pages = $recentPages;

            // Pass the recent pages data to Twig
            $this->grav['twig']->twig_vars['recentPages'] = $recentPages;
        }
        catch(\Exception $e){
            throw new Error($e);
        }
    }
}