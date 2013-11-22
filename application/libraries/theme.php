<?php
/**
 * Description of LayoutManager
 *
 * @author Interactiveapp Development Team
 */
class theme {

    private $codeigniterCore = "";
    private $httpBasePath = "";
    private $realBasePath = "";
    
    private $layoutName = "";
    private $pageTitle = "";
    private $pageScript = "";
    private $layoutScript = array();
    private $javaScriptList = array();
    private $styleSheetList = array();
    private $isProtected = false;
    private $isLogged = false;
    private $htmlContent = "";
    private $htmlMenu = "";
    
    private $loggedName = "";
    private $loggedLevel = "";

    public function __construct() {
        session_start();
        $this->codeigniterCore = & get_instance();
        $this->httpBasePath = base_url();
        $this->realBasePath = FCPATH;
    }

    public function usingLayoutName($layoutName = "default") {
        $this->layoutName = $layoutName;
        $this->loadLayoutScript($layoutName);
    }

    public function setPageTitle($pageTitle) {
        $this->pageTitle = $pageTitle;
    }

    private function loadLayoutScript($fileName) {
        $scriptNode = simplexml_load_file($this->realBasePath . "themes/scripts/" . $fileName . ".xml");

        foreach ($scriptNode as $key => $value) {
           $subType = $value->attributes();
           $arrIndex = (string)$subType['type'];
     
            switch ($value->getName()) {
                case "Import" :
                     $this->layoutScript[$arrIndex][] = (string)$value;
                    break;
                default:
                    // do nothing
                    break;
            }
        }
     
    }

    public function usingStyleSheet($styleSheetName) {
        $this->styleSheetList[] = '<link rel="stylesheet" type="text/css" href="' . $this->httpBasePath . 'resources/css/' . $styleSheetName . '" />';
    }

    public function usingJavaScript($javaScriptName) {
        $this->javaScriptList[] = '<script type="text/javascript" src="' . $this->httpBasePath . 'resources/jscript/' . $javaScriptName . '"></script> ';
    }

    public function authenticateSession($boolean) {
        $this->isProtected = true;
        if ($boolean === true) {
            if ($this->codeigniterCore->session->userdata("SYS_GUID")) {
                $this->isLogged = true;
            }else{
//                require_once FCPATH.'exceptions/exception_denied.php';
                redirect("");
                exit();
            }
        }
    }

    public function setContent($htmlContent) {
        $this->htmlContent = $htmlContent;
    }
    
//    public function setHtmlMenu($htmlMenu){
//        $this->htmlMenu = $htmlMenu;
//    }
    
    public function setLoggedText($loggedName,$loggedLevel){
        $this->loggedName = $loggedName;
        $this->loggedLevel = $loggedLevel;
    }

    public function getDisplay() {
        $this->initializeObject();
        
        $layout = array();
        $layout['pageTitle'] = $this->pageTitle;
        $layout['pageScript'] = $this->pageScript;
        $layout['htmlContent'] = $this->htmlContent;
        $layout['htmlMenu'] = "";
        $layout['httpURL'] = $this->httpBasePath;
        $layout['relativeURL'] = $this->realBasePath;
        $layout['loggedName'] = $this->loggedName;
        $layout['loggedLevel'] = $this->loggedLevel;

        if ($this->isProtected) {
            if ($this->isLogged) {
                // case logged
                $layout['htmlMenu'] = $this->codeigniterCore->load->view("global/frmMenuItems",null,true);
                require_once 'themes/forms/' . $this->layoutName . '.php';
               
            } else {
                // require denied.
                require_once 'exceptions/exception_denied.php';
                exit();
            }
        } else {
            // case not need to login.
            $layout['htmlMenu'] = $this->codeigniterCore->load->view("global/frmMenuItems",null,true); // test development mode
            require_once 'themes/forms/' . $this->layoutName . '.php';
        }
    }

    /// PRIVATE FUNCTION FOR THIS CLASS
    private function initializeObject() {
        $tempStyleSheet = "";
        $tempJavaScript = "";
        foreach ($this->layoutScript as $scriptType => $value) {
            foreach ($value as $keyIndex => $scriptPath) {
                if ($scriptType == "stylesheet") {
                    $tempStyleSheet .= '<link rel="stylesheet" type="text/css" href="' . $this->httpBasePath . 'resources/css/' . $scriptPath . '" />' . "\n\t\t";
                } else if ($scriptType == "javascript") {
                    $tempJavaScript .= '<script type="text/javascript" src="' . $this->httpBasePath . 'resources/jscript/' . $scriptPath . '"></script>' . "\n\t\t";
                }
            }
        }

        foreach ($this->styleSheetList as $key => $value) {
            $tempStyleSheet .= $value . "\n\t\t";
        }
        foreach ($this->javaScriptList as $key => $value) {
            $tempJavaScript .= $value . "\n\t\t";
        }

        $this->pageScript .= $tempStyleSheet;
        $this->pageScript .= $tempJavaScript;
        unset($tempJavaScript);
        unset($tempStyleSheet);
    }

}

?>
