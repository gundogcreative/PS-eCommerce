<?php

function pageIt($data, $limit) { 
  
  @$currentPage = (int) $_GET["page"];

  if($currentPage == 0) { $currentPage = 1; }

 // Create a Model paginator, show 10 rows by page starting from $currentPage
 $paginator = new \Phalcon\Paginator\Adapter\Model(
    array(
          "data" => $data,
          "limit"=> $limit,
          "page" => $currentPage
         )
    );

  // Get the paginated results
  return $paginator->getPaginate();
}

function getPageAssets(&$assets) { 
          //Add some local CSS resources
        $assets
            ->addCss('css/foundation.css')
            ->addCss('css/normalize.css')
            ->addCss('css/admin.css')
            ->addCss('css/global.css');

        //and some local javascript resources
        $assets
            ->addJs('js/vendor/modernizr.js')
            ->addJs('js/vendor/jquery.js')
            ->addJs('js/foundation/foundation.min.js')
            ->addJs('js/controlpanel.js');
} 

function getControlPanelHeaderHtml() { 
      $html = '<nav class="top-bar" data-topbar="">';
        $html .= '<ul class="title-area">';
          $html .= '<li class="name">';
            $html .= '<h1><a href="/controlpanel">Cheetah Control Panel</a></h1>';
          $html .= '</li>';
          $html .= '<li class="toggle-topbar menu-icon"><a href=""><span>Menu</span></a></li>';
        $html .= '</ul>';

        $html .= '<section class="top-bar-section">';

        $html .= '<!-- Right Nav Section -->';
          $html .= '<ul class="right show-for-large-up">';
            $html .= '<li class="has-dropdown not-click">';
             $html .= '<a href="controlpanel">Sections</a>';
              $html .= '<ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li>';
              $html .= '<li><a href="/branches">Branches</a></li>';
              $html .= '<li><a href="/drivers">Drivers</a></li>';
              $html .= '<li><a href="/hangs">Hangs</a></li>';
              $html .= '<li><a href="/regions">Regions</a></li>';
              $html .= '<li><a href="/cheetahout">Cheetah Out</a></li>';
              $html .= '<li><a href="/logout">Log Out</a></li>';
            $html .= '</ul>';
          $html .= '</li>';
        $html .= '</ul>';

      $html .= '</section>';
      $html .= '</nav>';
      
      return $html;
}

?>
