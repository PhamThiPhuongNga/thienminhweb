<?php
include_once('FileManager/class/FileManager.php');
?>
<table border="0" style="width:100%; height:100%"><tr>
    <td align="center">
    <?php 
	// Khi chuyển lên website cần chỉnh lại các tham số bên dưới //
    $FileManager = new FileManager();
    $FileManager->tmpFilePath = __dir__.'/FileManager/tmp';
    $FileManager->rootDir = __dir__.'/upload';
    $FileManager->fmWebPath  =  '/FileManager';
	// Phân quyền //
    $FileManager->enableUpload  = true;
	$FileManager->enablePermissions  = false;
	$FileManager->hideDisabledIcons  = true;
	$FileManager->useRightClickMenu  = false;
	$FileManager->enableEdit  = false;
	$FileManager->enableCopy  = false;
	$FileManager->enableSearch  = false;//   
	$FileManager->enableImageRotation  = false;
	$FileManager->enableBulkDownload  = false;
	$FileManager->replSpacesUpload  = true;
	$FileManager->lowerCaseUpload  = true;
	
	$FileManager->language  = 'vi';
	
	if(isset($_SESSION["user"]) && $_SESSION["xkt_timesession"] > 0 ){
		$FileManager->loginPassword  = false;
	}else{
		$FileManager->loginPassword  = true;
	}
	// In ra content
    print $FileManager->create();    
    ?>
    </td>
    </tr>
</table>
<script>
    function getUrlParam(paramName)
    {
        var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i');
        var match = window.location.search.match(reParam);
        return (match && match.length > 1) ? match[1] : '';
    }    
    var mediaUrl= '/upload';
</script>