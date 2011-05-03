<?php
class Uploader extends Controller {
	private $tableName;
	private $fileColumnName;
	private $indexColumnName;
	private $index;
	private $fileTypes;
	private $targetFile;
	private $targetPath;
	private $uploadDir;
	private $error = array();
	private $noDatabase = 0;
	public  $noRender = 1;
	private $lastId;
	
	function Uploader()
	{    
		parent::Controller();
	}
	
	function index($bandId = null)
	{

	}
	
	function photos($id) 
	{
		  $this->tableName = 'photos';
		  $this->fileColumnName = 'PhoFile';
		  $this->indexColumnName = 'PhoGalId';
	 	  $this->index = $id;
	 	  $this->fileTypes = "jpg|jpeg|gif|JPG|JPEG|GIF";
	 	  $this->noDatabase = 0;     
	 	  $this->upload();
	 	  
	 	  $data = array(
	 	  	'upload_dir' => $this->targetPath,
	 	  	'filename' =>  $this->targetFile
	 	  );
         
	 	  if (empty($this->error)) {
	 		  $this->thumb->cropImage("sc_", $data, 100, 100);
		  	  $this->thumb->cropImage("fesc_", $data, 220, 100);
              $this->thumb->cropImage("pb_", $data, 440, 100); 
		  }
		  $response = array (
		  					"url" => $this->uploadDir."/sc_".$this->targetFile, 
		  					"file" => $this->targetFile,
		  					"pid" => $this->lastId
		  );
		  
	 	  $this->response($response);
	}
	
	function events()
	{
	 	  $this->fileTypes = "jpg|jpeg|gif|JPG|JPEG|GIF";
	 	  $this->noDatabase = 1;
	 	  $this->upload();
	 	  
	 	  $data = array(
	 	  	'upload_dir' => $this->targetPath,
	 	  	'filename' =>  $this->targetFile
	 	  );
	 	  
	 	  if (empty($this->error)) {
	 		  $this->thumb->cropImage("sc_",$data, 100,100);
		  	  $this->thumb->cropImage("fesc_",$data, 440,100);
              $this->thumb->cropImage("se_",$data, 440);
              $this->thumb->cropImage("pb_", $data, 440, 100); 
          }
		  
		  $response = array ("url" => $this->uploadDir."/sc_".$this->targetFile, "file" => $this->targetFile);
		  $this->response($response);
	}
		
	function upload()
	{
		   	if (!empty($_FILES)) {
					$tempFile = $_FILES['Filedata']['tmp_name'];
					$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
					$this->uploadDir = $_REQUEST['folder']; 
					$this->targetPath = $targetPath;
					$typesArray = explode('|',$this->fileTypes);
					$fileParts  = pathinfo($_FILES['Filedata']['name']);
			        $fileName = md5(uniqid(mt_rand())).".".$fileParts['extension'];
			        $this->targetFile = $fileName; 
			        $targetFile =  str_replace('//','/',$targetPath).$fileName;
			        
					if (in_array($fileParts['extension'],$typesArray)) {
						
						if (move_uploaded_file($tempFile,$targetFile)) {    
							
                            if (!$this->noDatabase) {
								$fileInfo = array (
									$this->fileColumnName => $fileName,
									$this->indexColumnName => $this->index
								);
								$this->db->insert($this->tableName, $fileInfo);
								$this->lastId = $this->db->insert_id();
							}

						}
						
					} else {
						$this->error[] =  'Invalid file type.';
					}
			}
	
	}
	
	private function response($responseArray)
	{
		echo json_encode($responseArray);	
	} 
  
}
?>